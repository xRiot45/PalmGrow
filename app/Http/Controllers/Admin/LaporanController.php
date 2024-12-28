<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaporanRequest;
use App\Models\Kebun;
use App\Models\Laporan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LaporanController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
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

    public function index(Request $request): View
    {
        $perPage = request()->input('perPage', 10);
        $query = Laporan::query()->orderByDesc('created_at');

        $this->applyFilters($query, request());

        $laporan = $query->paginate($perPage)->appends($request->except('page'));
        $lokasi_kebun = Kebun::pluck('lokasi')->all();
        return view('pages.admin.laporan.index', [
            'data' => $laporan->items(),
            'pagination' => $laporan,
            'lokasi_kebun' => $lokasi_kebun,
            'perPage' => $perPage,
        ]);
    }

    public function create(): View
    {
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();
        return view('pages.admin.laporan.create', [
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    public function store(LaporanRequest $request): RedirectResponse
    {
        if ($request->hasFile('file_path') && $request->file('file_path')->isValid()) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $filename);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid');
        }

        $tambah_data = Laporan::create([
            'kebun_id' => $request->kebun_id,
            'file_type' => $filename,
            'file_path' =>  $filename,
            'tanggal_laporan' => $request->tanggal_laporan,
        ]);

        if ($tambah_data) {
            return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil ditambahkan');
        }

        return redirect()->route('admin.laporan.index')->with('error', 'Laporan gagal ditambahkan');
    }

    public function edit(int $id): View
    {
        $laporan = Laporan::find($id);
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();

        return view('pages.admin.laporan.edit', [
            'data' => $laporan,
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    public function update(LaporanRequest $request, $id): RedirectResponse
    {
        $data = Laporan::findOrFail($id);
        if ($request->hasFile('file_path')) {
            if ($data->file_path && Storage::exists('public/' . basename($data->file_path))) {
                Storage::delete('public/' . basename($data->file_path));
            }

            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public', $filename);

            $data->file_path = $filePath;
        }

        $update_data = $data->update($request->except('file_path'));

        if ($update_data) {
            return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil diperbarui');
        }

        return redirect()->route('admin.laporan.index')->with('error', 'Laporan gagal diperbarui');
    }

    public function destroy(int $id): RedirectResponse
    {
        $laporan = Laporan::find($id);
        if (!$laporan) {
            return redirect()->route('admin.laporan.index')->with('error', 'Laporan tidak ditemukan');
        }

        $file_laporan = 'public/' . $laporan->file_path;
        if (Storage::exists($file_laporan)) {
            Storage::delete($file_laporan);
        }

        if ($laporan->delete()) {
            return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil dihapus');
        }

        return redirect()->route('admin.Laporan.index')->with('error', 'Laporan gagal dihapus');
    }

    public function view_pdf($id): View
    {
        $bukti_laporan = Laporan::find($id);
        if (!$bukti_laporan) {
            abort(404, 'Laporan tidak ditemukan');
        }

        $pdfPath = 'storage/' . $bukti_laporan->file_path;
        if (!file_exists(public_path($pdfPath))) {
            abort(404, 'File PDF tidak ditemukan');
        }

        return view('pages.admin.laporan.view-pdf', [
            'data' => $bukti_laporan,
            'pdfPath' => $pdfPath,
        ]);
    }

    public function download_pdf($id): BinaryFileResponse
    {
        $laporan = Laporan::find($id);
        $pdfPath = 'storage/' . $laporan->file_path;

        if (!file_exists(public_path($pdfPath))) {
            abort(404, 'File PDF tidak ditemukan');
        }

        return response()->download($pdfPath);
    }
}
