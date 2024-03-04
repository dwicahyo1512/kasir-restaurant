<?php

namespace App\Http\Controllers;

use App\Models\meja as Modelsmeja;
use App\Tables\Mejas;
use Illuminate\Http\Request;

use ProtoneMedia\Splade\Facades\Toast;

class Meja extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create meja', ['only' => ['create', 'store']]);
        $this->middleware('can:read meja',   ['only' => ['show', 'index']]);
        $this->middleware('can:update meja',   ['only' => ['edit', 'update']]);
        $this->middleware('can:delete meja',   ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('meja.index', [
            'meja' => Mejas::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'meja' => 'required|string', // Contoh validasi untuk nama meja yang diperlukan dan harus berupa string
            'kode_meja' => 'required|string|unique:mejas,nomer_meja', // Contoh validasi untuk nomer meja yang diperlukan dan harus berupa string
        ]);

        // Buat entri baru dalam database menggunakan model Modelsmeja
        Modelsmeja::create([
            'nama_meja' => $request->meja,
            'status' => 0,
            'nomer_meja' => $request->kode_meja,
        ]);

        // Tampilkan notifikasi toast untuk memberi tahu pengguna bahwa penambahan meja berhasil
        Toast::title('Success!')
            ->message('Tambah meja Berhasil')
            ->success()
            ->autoDismiss(3);

        // Redirect pengguna ke halaman index meja setelah berhasil menambahkan meja
        return redirect()->route('meja.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelsmeja $meja)
    {
        //
        return view('meja.edit', [
            'meja' => $meja
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelsmeja $meja)
    {
        //
        $meja->update([
            'nama_meja' => $request->nama_meja,
            'keterangan_meja' => $request->keterangan_meja,
        ]);
        Toast::title('Meja Data Berhasil Di Edit')->autoDismiss(3)->rightTop();

        return to_route('meja.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelsmeja $meja)
    {
        //
        $meja->delete();
        Toast::title('meja Data Terhapus')->rightTop()->danger()->autoDismiss(3);
        // return redirect()->route('meja.index');
        return to_route('meja.index');
    }
}
