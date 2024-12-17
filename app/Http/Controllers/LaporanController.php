<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\Laporan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Spatie\LaravelPdf\Facades\Pdf;

class LaporanController extends Controller
{
    private function applyFilters(Builder $query, Request $request)
    {
        $filters = $request->only(['lokasi_kebun', 'tanggal_laporan_mulai', 'tanggal_laporan_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'lokasi_kebun' => $query->whereHas('kebun', function ($q) use ($filterValue) {
                        $q->where('lokasi', 'like', '%' . $filterValue . '%');
                    }),
                    'tanggal_laporan_mulai' => $query->where('tanggal_laporan', '>=', $filterValue),
                    'tanggal_laporan_selesai' => $query->where('tanggal_laporan', '<=', $filterValue),
                };
            }
        }
    }

    /**
     * Fungsi untuk menampilkan daftar laporan dan menerapkan fitur filter
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $per_page = request()->input('per_page', 10);
        $query = Laporan::query()->orderBy('created_at', 'desc');

        $this->applyFilters($query, request());

        $laporan = $query->paginate($per_page)->withQueryString();
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();
        return view('pages.admin.laporan.index', [
            'data' => $laporan->items(),
            'pagination' => $laporan,
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    /**
     * Fungsi untuk menampilkan form tambah laporan dan mengirimkan data lokasi kebun
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();
        return view('pages.admin.laporan.create', [
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    /**
     * Fungsi untuk menambahkan laporan
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'kebun_id' => 'required',
                'file_path' => 'required|mimes:pdf|max:2048',
                'tanggal_laporan' => 'required',
            ],
            [
                'kebun_id.required' => 'Kebun Harus Dipilih',
                'file_path.required' => 'File harus diisi',
                'file_path.mimes' => 'File harus berupa pdf',
                'file_path.max' => 'File tidak boleh lebih dari 2MB',
                'tanggal_laporan.required' => 'Tanggal laporan harus diisi',
            ],
        );

        if ($request->hasFile('file_path') && $request->file('file_path')->isValid()) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/laporan', $filename);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid');
        }

        Laporan::create([
            'kebun_id' => $request->kebun_id,
            'file_type' => $filename,
            'file_path' => 'public/laporan/' . $filename,
            'tanggal_laporan' => $request->tanggal_laporan,
        ]);

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil ditambahkan');
    }

    /**
     * Fungsi untuk menampilkan form edit laporan dan mengirimkan data lokasi kebun
     * @param mixed $id
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $laporan = Laporan::find($id);
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();

        return view('pages.admin.laporan.edit', [
            'data' => $laporan,
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    /**
     * Fungsi untuk mengupdate laporan
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = Laporan::findOrFail($id);
        $request->validate(
            [
                'kebun_id' => 'required',
                'file_path' => 'required|mimes:pdf|max:2048',
                'tanggal_laporan' => 'required',
            ],
            [
                'kebun_id.required' => 'Kebun Harus Dipilih',
                'file_path.required' => 'File harus diisi',
                'file_path.mimes' => 'File harus berupa pdf',
                'file_path.max' => 'File tidak boleh lebih dari 2MB',
                'tanggal_laporan.required' => 'Tanggal laporan harus diisi',
            ],
        );

        if ($request->hasFile('file_path')) {
            if ($data->file_path && Storage::exists('public/laporan/' . basename($data->file_path))) {
                Storage::delete('public/laporan/' . basename($data->file_path));
            }

            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/laporan', $filename);

            $data->file_path = $filePath;
        }

        $data->update($request->except('file_path'));
        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil diperbarui');
    }

    /**
     * Fungsi untuk menghapus data laporan dan file laporan
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $laporan = Laporan::find($id);
        if ($laporan) {
            $file_path = $laporan->file_path;

            if (Storage::exists($file_path)) {
                Storage::delete($file_path);
            }

            $laporan->delete();

            return redirect()->route('admin.laporan.index')->with('success', 'Laporan beserta file berhasil dihapus');
        }

        return redirect()->route('admin.laporan.index')->with('error', 'Laporan tidak ditemukan');
    }

    /**
     * Fungsi untuk melihat file pdf bukti laporan
     * @param mixed $id
     * @return \Illuminate\View\View
     */
    public function view_pdf($id): View
    {
        $bukti_laporan = Laporan::find($id);
        if (!$bukti_laporan) {
            abort(404, 'Laporan tidak ditemukan');
        }

        $pdfPath = storage_path('app/' . $bukti_laporan->file_path);
        if (!file_exists($pdfPath)) {
            abort(404, 'File PDF tidak ditemukan');
        }

        return view('pages.admin.laporan.view-pdf', [
            'data' => $bukti_laporan,
            'pdfPath' => $pdfPath,
        ]);
    }

    /**
     * Fungsi untuk mengunduh file pdf bukti laporan
     * @param mixed $id
     * @return mixed|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download_pdf($id)
    {
        $laporan = Laporan::find($id);
        $pdfPath = storage_path('app/' . $laporan->file_path);
        return response()->download($pdfPath);
    }
}
