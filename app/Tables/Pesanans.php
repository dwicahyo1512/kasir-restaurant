<?php

namespace App\Tables;

use App\Models\Kasir;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Pesanans extends AbstractTable
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
        return Kasir::query();
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
            ->column('id')
            ->column(key: 'nama_pemesan', label: 'Nama Pemesan')
            ->column(key: 'nama_discount', label: 'Nama Discount')
            ->column(key: 'totalpayment', label: 'Total Payment')
            ->column(key: 'totaldiscount', label: 'Discount')
            ->column(key: 'created_at', label: 'Tanggal Pesan',sortable: true)
            ->column('actions', exportAs: false)
            // ->searchInput()
            ->selectFilter('type_discount', [
                'percentage' => 'Persen',
                'fixed' => 'Fixed',
            ])
            ->export()
            ->paginate(15);
        // ->withGlobalSearch()

        // ->bulkAction()
    }
}
