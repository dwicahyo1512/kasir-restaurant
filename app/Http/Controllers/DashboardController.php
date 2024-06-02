<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    //
    public function index()
    {
        $currentYear = Carbon::now()->year;
        $totalBulanIni = 0;
        $totalPesananPerBulan = [];

        // Loop untuk setiap bulan dalam satu tahun
        for ($month = 1; $month <= 12; $month++) {
            $pesanan_bulan = Kasir::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->get()
                ->toArray();

            // Hitung total payment untuk bulan ini
            $totalPaymentBulanIni = Kasir::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->sum('totalpayment');

            // Masukkan total payment bulan ini ke dalam array
            $totalPesananPerBulan[$month] = $totalPaymentBulanIni;

            // Tambahkan total payment bulan ini ke total bulan ini
            $totalBulanIni += $totalPaymentBulanIni;
        }

        $total_kasir = Kasir::count();
        $total_menu = Menu::count();
        $total_user = User::count();
        
        return view('dashboard', compact('totalPesananPerBulan', 'totalBulanIni', 'total_kasir', 'total_menu', 'total_user'));
    }
}
