<?php

namespace App\Http\Controllers;

use App\Models\Kategori as Modelskategori;
use App\Models\Menu as ModelsMenu;
use App\Tables\Menus;
use Illuminate\Http\Request;

class Menu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = Modelskategori::all();
        return view('menu.index', [
            'menu' => Menus::class,
            compact('kategori')
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
        // validate request
        $this->validate($request, [
            'img_menu' => 'required|image|mimes:jpeg,jpg,png',
            'nama_menu' => 'required|min:5',
            'status' => 'required',
            'harga' => 'required|min:1'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/menu_img', $image->hashName());

        // insert new post to db
        ModelsMenu::create([
            'title' => $request->title,
            'content' => $request->content,
            'img' => $image->hashName(),
        ]);

        // render view
        return redirect(route('menu.index'));
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
