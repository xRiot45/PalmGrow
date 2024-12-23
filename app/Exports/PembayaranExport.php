<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PembayaranExport implements FromCollection, WithHeadings, WithMapping
{
    private Builder $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function collection(): Collection
    {
        return $this->query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Lokasi Produksi',
            'Jumlah Pembayaran',
            'Tgl. Pembayaran',
            'Jumlah Tandan',
            'Berat Total',
            'Metode Pembayaran',
            'Bukti Pembayaran',
            'Didaftarkan Pada'
        ];
    }

    public function map($pembayaran): array
    {
        static $no = 1;

        $buktiPembayaranUrl = $pembayaran->bukti_pembayaran
            ? asset('storage/pembayaran/' . basename($pembayaran->bukti_pembayaran))
            : asset('images/404-error.png');

        return [
            $no++,
            $pembayaran->produksi->kebun->lokasi,
            'Rp ' . number_format(
                $pembayaran->jumlah_pembayaran,
                0,
                ',',
                '.'
            ),
            $pembayaran->tanggal_pembayaran->format('Y-m-d'),
            $pembayaran->produksi->jumlah_tandan . ' Tandan',
            $pembayaran->produksi->berat_total . ' Kg',
            $pembayaran->metode_pembayaran,
            $pembayaran->bukti_pembayaran
                ? '=HYPERLINK("' . $buktiPembayaranUrl . '", "Lihat Bukti")'
                : 'Lihat Bukti Tidak Tersedia',
            $pembayaran->created_at->format('Y-m-d'),
        ];
    }
}
