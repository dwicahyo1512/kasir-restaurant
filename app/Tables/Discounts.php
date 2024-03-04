<?php

namespace App\Tables;

use App\Models\Discount;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Discounts extends AbstractTable
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
        return Discount::query();
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
            ->column(key: 'name', label: 'Nama Discount')
            ->column(key: 'type', label: 'type')
            ->column('Diskon')
            ->column('Minimal')
            ->column(key: 'start_date', label: 'Tgl Awal Diskon')
            ->column(key: 'end_date', label: 'Tgl Akhir Diskon')
            ->column('actions')
            ->paginate(15);
        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
