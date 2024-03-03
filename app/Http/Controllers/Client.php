<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Kasir;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use Illuminate\Http\Request;

class Client extends Controller
{
    //
    public function client()
    {
        //
        $menus = Menu::with('kategori')->where('status', 1)->get()->toArray();
        // Ambil semua diskon yang tersedia

        $discounts = Discount::where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get()
            ->toArray();
        $categories = Kategori::all()->toArray();
        $meja = Meja::where('status', 0)->get()->toArray();
        $pesanan = Kasir::with('meja')->latest()->take(10)->get()->toArray();
        return view('cart', compact('menus', 'discounts', 'categories', 'pesanan', 'meja'));
    }
    public function post_client(Request $request)
    {
        // Tangkap data dari permintaan
        $data = $request->all();
        $kasir = Kasir::create([
            'nama_pemesan' => $data['name'],
            'id_meja' => $data['id_meja'],
            'totaldiscount' => $data['totalDiscount'],
            'totalpayment' => $data['totalPayment'],
            'nama_discount' => $data['selectedDiscount']['name'] ?? 'Tanpa Diskon',
            'type_discount' => $data['selectedDiscount']['type'] ?? 'Tanpa Diskon',
            'value_discount' => $data['selectedDiscount']['value'] ?? 0,
            'min_purchase_amount' => $data['selectedDiscount']['min_purchase_amount'] ?? 0,
        ]);

        if (isset($data['orderedItems']) && is_array($data['orderedItems'])) {
            foreach ($data['orderedItems'] as $item) {

                $kasir->detail_pesanan()->create([
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'harga' => $item['harga'],
                ]);
            }
        }
        Meja::where('id', $data['id_meja'])->update(['status' => 1]);
        // Buat Kasir record dan associate detail_pesanan
        // $kasir = ModelsKasir::create([
        //     'nama_pemesan' => $data['name'],
        //     'totaldiscount' => $data['totalDiscount'],
        //     'totapayment' => $data['totalPayment'],
        // ])->detail_pesanan()->createMany(
        //         array_map(function ($item) use ($data) {
        //             return [
        //                 'name' => $item['name'],
        //                 'quantity' => $item['quantity'],
        //                 'harga' => $item['harga'],
        //             ];
        //         }, $data['orderedItems'] ?? [])
        //     );

        return response()->json([
            'message' => 'Data berhasil disimpan.',
            'data' => $kasir, // Anda bisa mengembalikan data yang divalidasi atau data lain yang relevan
        ]);
    }
}
