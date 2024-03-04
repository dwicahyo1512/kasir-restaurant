<?php

namespace App\Tables;

use App\Models\Kasir;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Laporans extends AbstractTable
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
        $yearFilter = AllowedFilter::callback('year', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query->whereYear('kasirs.created_at', $value);
                });
            });
        });

        $monthFilter = AllowedFilter::callback('month', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query->whereMonth('kasirs.created_at', $value);
                });
            });
        });

        return QueryBuilder::for(Kasir::class)
            ->defaultSort('-created_at')
            ->allowedSorts(['created_at'])
            ->allowedFilters(['nama_pemesanan', 'totalpayment', $yearFilter, $monthFilter]);
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
            ->column('nama_pemesan')
            ->column('totalpayment')
            ->column('created_at', sortable: true)
            ->withGlobalSearch()
            ->selectFilter(key: 'year', options: ['2024' => '2024', '2023' => '2023', '2022' => '2022', '2021' => '2021'], label: 'Tahun', noFilterOptionLabel: '-')
            ->selectFilter(key: 'month', options: ['01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'], label: 'Bulan', noFilterOptionLabel: '-')
            ->paginate(15);

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
