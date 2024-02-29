<?php

namespace App\Http\Controllers;

use App\Models\meja as Modelsmeja;
use App\Tables\Mejas;
use Illuminate\Http\Request;

use ProtoneMedia\Splade\Facades\Toast;

class Meja extends Controller
{
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
    public function store(request $request)
    {
        //
        // dd($request->all());
        Modelsmeja::create([
            'nama_meja' => $request->meja,
            'nomer_meja' => $request->kode_meja,
        ]);
        Toast::title('Successs!')
            ->message('Tambah meja Berhasil')
            ->success()->autoDismiss(3);
        return to_route('meja.index');
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
        Toast::title('meja Data Berhasil Di Edit')->rightTop();

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
