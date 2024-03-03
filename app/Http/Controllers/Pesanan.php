<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Meja;
use App\Tables\Pesanans;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class Pesanan extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create pesanan', ['only' => ['create', 'store']]);
        $this->middleware('can:read pesanan',   ['only' => ['show', 'index']]);
        $this->middleware('can:read proses',   ['only' => ['proses', 'index']]);
        $this->middleware('can:update pesanan',   ['only' => ['edit', 'update']]);
        $this->middleware('can:delete pesanan',   ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pesanan.index', [
            'pesanan' => Pesanans::class,
        ]);
    }

    public function proses()
    {
        $pending = Kasir::with('meja')->where('status', 0)->get()->toArray();
        $proses = Kasir::with('meja')->where('status', 1)->get()->toArray();
        $done = Kasir::with('meja')->where('status', 2)->take(20)->get()->toArray();
        return view('pesanan.proses', compact('pending', 'proses', 'done'));
    }

    public function UpdateStatus(Request $request)
    {
        $data = $request->all();

        // Periksa apakah 'id_meja' ada dalam data
        if (isset($data['id_meja'])) {
            // Update status pada tabel Kasir dan Meja
            $update = Kasir::where('id', $data['id'])->increment('status');
            $updateMeja = Meja::where('id', $data['id_meja'])->update(['status' => 0]);

            return response()->json([
                'message' => 'Status berhasil Diupdate.',
                'data' => [
                    'kasir' => $update,
                    'meja' => $updateMeja
                ]
            ]);
        } else {
            // Jika 'id_meja' tidak ada, hanya update status pada tabel Kasir
            $update = Kasir::where('id', $data['id'])->increment('status');
            return response()->json([
                'message' => 'Status berhasil Diupdate.',
                'data' => $update
            ]);
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kasir $pesanan)
    {
        //
        return view('pesanan.detail', [
            'pesanan' => $pesanan
        ]);
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
    public function destroy(Kasir $kasir)
    {
        //
        $kasir->detail_pesanan()->delete();
        $kasir->delete();
        Toast::title('Pesanan Data Terhapus')->rightTop()->danger()->autoDismiss(3);
        // return redirect()->route('kategori.index');
        return to_route('pesanan.index');
    }
}
