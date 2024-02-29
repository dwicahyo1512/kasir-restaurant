<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Tables\Pesanans;
use Illuminate\Http\Request;

class Pesanan extends Controller
{
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
        $pending = Kasir::where('status', 0)->get()->toArray();
        $proses = Kasir::where('status', 1)->get()->toArray();
        $done = Kasir::where('status', 2)->take(20)->get()->toArray();
        return view('pesanan.proses', compact('pending', 'proses', 'done'));
    }

    public function UpdateStatus(Request $request)
    {
        $id = $request->all();
        $update = Kasir::where('id', $id)->increment('status');
        return response()->json([
            'message' => 'Status berhasil disimpan.',
            'data' => $update, // Anda bisa mengembalikan data yang divalidasi atau data lain yang relevan
        ]);
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
    public function destroy(string $id)
    {
        //
    }
}
