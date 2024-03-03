<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Kasir as ModelsKasir;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class Kasir extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create kasir', ['only' => ['create', 'store']]);
        $this->middleware('can:read kasir',   ['only' => ['show', 'index']]);
        $this->middleware('can:update kasir',   ['only' => ['edit', 'update']]);
        $this->middleware('can:delete kasir',   ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        $pesanan = ModelsKasir::with('meja')->latest()->take(10)->get()->toArray();
        return view('kasir.index', compact('menus', 'discounts', 'categories', 'pesanan', 'meja'));
    }
  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kasir.pesan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tangkap data dari permintaan
        $data = $request->all();
        $kasir = ModelsKasir::create([
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


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        dd($request->all());
        return view('kasir.pesan', $request->all());
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function struk($id)
    {
        $kasir = ModelsKasir::findOrFail($id);
        $meja = Meja::findOrFail($kasir->id_meja);
        $pesanan = $kasir->detail_pesanan;
        $name = getSetting('website_name');
        $nomer_meja = $meja->nomer_meja;
        $alamat = 'Wonorejo, Pakijangan, Pasuruan';
        $telepon = '083851574470';
        $data = [
            [
                'quantity' => 1,
                'description' => '1 Year Subscription',
                'price' => '129.00'
            ]
        ];
        $pdf = Pdf::loadView('kasir.struk', ['pesanan' => $pesanan, 'nama' => $name, 'alamat' => $alamat, 'telepon' => $telepon, 'nomer_meja' => $nomer_meja, 'kasir' => $kasir])->setPaper(array(0, 0, 180, 450), 'potrait');

        // return $pdf->download();
        return $pdf->stream();
    }
    //     public function struk()
//    {
//
//    }
}
