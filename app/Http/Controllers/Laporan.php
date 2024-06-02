<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Tables\Laporans;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;

class Laporan extends Controller
{
    public function laporan()
    {
        // $pesanan = Kasir::all();
        return view('laporan.index', ['pesanan' => Laporans::class]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Tanggal' => 'required',
        ]);

        //    dd($request);

        // Parsing rentang tanggal
        $tanggal = explode(' to ', $request->input('Tanggal'));
        $tanggalMulai = date('Y-m-d', strtotime($tanggal[0]));
        $tanggalAkhir = date('Y-m-d', strtotime($tanggal[1]));

        // Ambil data dari model Kasir berdasarkan rentang tanggal
        $laporan = Kasir::with('meja')->whereBetween('created_at', [$tanggalMulai, $tanggalAkhir])->get();
        if ($laporan) {
            $totalPenjualan = $laporan->sum('totalpayment');
        } else {
            $totalPenjualan = 0; // Atau berikan nilai default lainnya
        }
        $name = getSetting('website_name');
        // dd($tanggalMulai);
        // Buat tampilan HTML untuk laporan
        $html = view('laporan.pdf', compact('laporan', 'name', 'tanggalMulai', 'tanggalAkhir', 'totalPenjualan'))->render();

        // Konfigurasi DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Buat objek DOMPDF
        $dompdf = new Dompdf($options);

        // Muat HTML ke DOMPDF
        $dompdf->loadHtml($html);

        // Rendering dan output file PDF
        $dompdf->render();

        // Simpan atau kirimkan file PDF
        $fileName = 'laporan_kasir_' . date('Ymd') . '.pdf';
        $dompdf->stream($fileName);
    }
}
