<?php

namespace App\Http\Controllers;

use App\Models\Kategori as ModelsKategori;
use App\Tables\Kategoris;
use Illuminate\Http\Request;

use ProtoneMedia\Splade\Facades\Toast;

class Kategori extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'kategori' => Kategoris::class,
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
    public function store(request $request)
    {
        //
        // dd($request->all());
        ModelsKategori::create([
            'nama_kategori' => $request->kategori,
            'keterangan_kategori' => $request->Keterangan,
        ]);
        Toast::title('Successs!')
            ->message('Tambah Kategori Berhasil')
            ->success()->autoDismiss(3);
        return to_route('kategori.index');
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
    public function edit(ModelsKategori $kategori)
    {
        //
        return view('kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsKategori $kategori)
    {
        //
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan_kategori' => $request->keterangan_kategori,
        ]);
        Toast::title('Kategori Data Berhasil Di Edit')->rightTop();

        return to_route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsKategori $kategori)
    {
        //
        $kategori->delete();
        Toast::title('kategori Data Terhapus')->rightTop()->danger()->autoDismiss(3);
        // return redirect()->route('kategori.index');
        return to_route('kategori.index');
    }
}
