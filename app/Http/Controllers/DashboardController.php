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
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $pesanan_bulan = Kasir::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->get()
            ->toArray();
        $currentDate = Carbon::now()->toDateString();
        $pesanan_hari = Kasir::whereDate('created_at', $currentDate)->get()->toArray();
        $total_kasir = Kasir::count();
        $total_menu = Menu::count();
        $total_user = User::count();
        return view('dashboard', compact('pesanan_hari','pesanan_bulan','total_kasir','total_menu','total_user'));
    }
}
