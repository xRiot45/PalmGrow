<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Pembayaran;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PembayaranController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['lokasi_produksi_kebun', 'jumlah_pembayaran_mulai', 'jumlah_pembayaran_selesai', 'metode_pembayaran', 'tanggal_pembayaran_mulai', 'tanggal_pembayaran_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'lokasi_produksi_kebun' => $query->whereHas('produksi', function ($q) use ($filterValue) {
                        $q->whereHas('kebun', function ($q) use ($filterValue) {
                            $q->where('lokasi', 'like', '%' . $filterValue . '%');
                        });
                    }),
                    'jumlah_pembayaran_mulai' => $query->where('jumlah_pembayaran', '>=', $filterValue),
                    'jumlah_pembayaran_selesai' => $query->where('jumlah_pembayaran', '<=', $filterValue),
                    'metode_pembayaran' => $query->where('metode_pembayaran', 'like', '%' . $filterValue . '%'),
                    'tanggal_pembayaran_mulai' => $query->where('tanggal_pembayaran', '>=', $filterValue),
                    'tanggal_pembayaran_selesai' => $query->where('tanggal_pembayaran', '<=', $filterValue),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = request()->input('perPage', 10);
        $query = Pembayaran::query()->orderByDesc('created_at');

        $this->applyFilters($query, request());

        $pembayaran = $query->paginate($perPage)->appends($request->except('page'));
        $lokasi_produksi_kebun = Produksi::select('id', 'kebun_id')->get();
        return view('pages.admin.pembayaran.index', [
            'data' => $pembayaran->items(),
            'pagination' => $pembayaran,
            'lokasi_produksi_kebun' => $lokasi_produksi_kebun,
            'perPage' => $perPage,
        ]);
    }

    public function create(): View
    {
        $produksi = Produksi::select('id', 'kebun_id')->get();
        return view('pages.admin.pembayaran.create', [
            'produksi' => $produksi,
        ]);
    }

    public function store(PembayaranRequest $request): RedirectResponse
    {
        if ($request->hasFile('bukti_pembayaran') && $request->file('bukti_pembayaran')->isValid()) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/pembayaran', $filename);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid');
        }

        $buat_pembayaran = Pembayaran::create([
            'produksi_id' => $request->produksi_id,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => 'public/pembayaran/' . $filename,
        ]);

        if ($buat_pembayaran) {
            return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan');
        }

        return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran gagal ditambahkan');
    }

    public function edit(int $id): View
    {
        $pembayaran = Pembayaran::find($id);
        $produksi = Produksi::select('id', 'kebun_id')->get();
        return view('pages.admin.pembayaran.edit', [
            'data' => $pembayaran,
            'produksi' => $produksi,
        ]);
    }

    public function update(PembayaranRequest $request, int $id): RedirectResponse
    {
        $data = Pembayaran::findOrFail($id);
        if ($request->hasFile('bukti_pembayaran')) {
            if ($data->bukti_pembayaran && Storage::exists('public/pembayaran/' . basename($data->bukti_pembayaran))) {
                Storage::delete('public/pembayaran/' . basename($data->bukti_pembayaran));
            }

            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $buktiPembayaran = $file->storeAs('public/pembayaran', $filename);

            $data->bukti_pembayaran = $buktiPembayaran;
        }

        $update_pembayaran = $data->update($request->except('bukti_pembayaran'));
        if ($update_pembayaran) {
            return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil diupdate');
        }

        return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran gagal diupdate');
    }

    public function destroy(int $id): RedirectResponse
    {
        $pembayaran = Pembayaran::find($id);
        if ($pembayaran) {
            $bukti_pembayaran = $pembayaran->bukti_pembayaran;

            if (Storage::exists($bukti_pembayaran)) {
                Storage::delete($bukti_pembayaran);
            }

            $hapus_pembayaran = $pembayaran->delete();
            if ($hapus_pembayaran) {
                return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
            }

            return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran gagal dihapus');
        }

        return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran tidak ditemukan');
    }


    public function download_file(int $id): BinaryFileResponse
    {
        $pembayaran = Pembayaran::find($id);
        $bukti_pembayaran = storage_path('app/' . $pembayaran->bukti_pembayaran);
        return response()->download($bukti_pembayaran);
    }
}
