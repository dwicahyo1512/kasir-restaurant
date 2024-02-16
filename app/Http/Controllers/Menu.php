<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu as ModelsMenu;
use App\Tables\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\FileUploads\ExistingFile;
use ProtoneMedia\Splade\Components\Toast;

class Menu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('menu.index', [
            'menu' => Menus::class,
           'kategoris' => Kategori::pluck('nama_kategori','id')->toArray()
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
            'harga_menu' => 'required|integer|min:1'
        ]);

        // upload image
        $image = $request->file('img_menu');
        $image->storeAs('public/menu_img', $image->hashName());

        // insert new post to db
        ModelsMenu::create([
          'kategori_id' => $request->kategori,
          'nama_menu' => $request->nama_menu,
          'img_menu' => $image->hashName(),
          'harga_menu' => $request->harga_menu,
          'status' => $request->status,
          'keterangan_menu' => $request->keterangan_menu,
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
    public function edit(ModelsMenu $menu)
    {
        //
        $image_menu = ExistingFile::fromDisk('public')->get('menu_img/'. $menu->img_menu);
        return view('menu.edit', [
            'menu' => $menu,
            'image_menu' => $image_menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsMenu $menu)
    {
        //

        $this->validate($request, [
            'image'     => 'nullable|image|mimes:jpeg,jpg,png',
            'nama_menu'     => 'required|min:5',
            'harga_menu'     => 'required|min:1'
        ]);

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga_menu,
            'status' => $request->status,
            'keterangan_menu' => $request->keterangan_menu,
        ]);

        if($request->file('image_menu')){
            // upload image
            $image = $request->file('image_menu');
            $image->storeAs('public/menu_img', $image->hashName());
            // delete old image
            Storage::delete('public/menu_img/'. $menu->img_menu);
            // update post data image
            $menu->update([
                'img_menu' => $image->hashName(),
            ]);
        }

        return to_route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsMenu $menu)
    {
        //
        Storage::delete('public/menu_img/'. $menu->img_menu);
        // delete post data by id
        $menu->delete();

        // render view
        return back();
    }
}
