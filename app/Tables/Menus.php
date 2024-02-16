<?php

namespace App\Tables;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Menus extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for ()
    {
        return Menu::query();

        // return QueryBuilder::for(Menu::class)
        // ->defaultSort('id')
        // ->allowedSorts(['id', 'nama_menu', 'harga_menu'])
        // ->allowedFilters(['id','kategori_id']);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {

        $table
            ->withGlobalSearch(columns: ['id'])
            ->column('id', sortable: true)
            ->column('image')
            ->column(key: 'kategori.nama_kategori', label: 'Kategori')
            ->column('nama_menu')
            ->column('harga_menu')
            ->column('status')
            ->column('keterangan_menu')
            ->column('actions');
        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
