<?php

namespace App\Http\Controllers;

use App\Models\Discount as ModelsDiscount;
use App\Tables\Discounts;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class Discount extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:create discount', ['only' => ['create', 'store']]);
        $this->middleware('can:read discount',   ['only' => ['show', 'index']]);
        $this->middleware('can:update discount',   ['only' => ['edit', 'update']]);
        $this->middleware('can:delete discount',   ['only' => ['destroy']]);
    }
    
    public function index()
    {
        //
        $selectType = [
            'percentage' => 'Persentase',
            'fixed' => 'Nilai Tetap',
        ];
        return view('discount.index', [
            'discount' => Discounts::class,
            'selectType' => $selectType,
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
        $this->validate($request, [
            'name' => 'required|string',
            'type' => 'required|string|in:percentage,fixed',
            'value' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'percentage' && ($value < 0 || $value > 100)) {
                        $fail('The ' . $attribute . ' must be between 0 and 100 for percentage type.');
                    } elseif ($request->type === 'fixed' && $value < 0) {
                        $fail('The ' . $attribute . ' must be a positive number for fixed type.');
                    }
                },
            ],
            'min_purchase_amount' => 'nullable|numeric',
            'daterange' => 'required',
        ]);
        // Pisahkan inputan tanggal menjadi tanggal mulai dan berakhir
        $dateRange = explode(' to ', $request->daterange);
        $startDate = trim($dateRange[0]); // Tanggal mulai
        $endDate = trim($dateRange[1]); // Tanggal berakhir
        // dd([
        //     'startDate' => $startDate,
        //     'endDate' => $endDate,
        //     'request' => $request->all()
        // ]);

        ModelsDiscount::create([
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'min_purchase_amount' => $request->min_purchase_amount,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);

        return redirect(route('discount.index'));
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
    public function edit(ModelsDiscount $discount)
    {
        //
        $selectType = [
            'percentage' => 'Persentase',
            'fixed' => 'Nilai Tetap',
        ];
        // Konversi nilai diskon dari desimal menjadi number
        $discount->value = floatval($discount->value);
        // Konversi nilai min_purchase_amount dari desimal menjadi number (jika tidak null)
        if ($discount->min_purchase_amount !== null) {
            $discount->min_purchase_amount = floatval($discount->min_purchase_amount);
        }
        return view('discount.edit', [
            'discount' => $discount,
            'selectType' => $selectType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsDiscount $discount)
    {
        //
        $this->validate($request, [
            'n' => 'required|string',
            't' => 'required|string|in:percentage,fixed',
            'v' => 'required|numeric',
            'min' => 'nullable|numeric',
            'start_d' => 'required|date',
            'end_d' => 'required|date|after_or_equal:start_d',
        ]);

        $discount->update([
            'name' => $request->n,
            'type' => $request->t,
            'value' => $request->v,
            'min_purchase_amount' => $request->min,
            'start_date' => $request->start_d,
            'end_date' => $request->end_d,
        ]);
        Toast::title('Your profile was updated!');
        return to_route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsDiscount $discount)
    {
        //
        $discount->delete();
        Toast::title('Discount Data Terhapus')->rightTop()->danger()->autoDismiss(3);

        return to_route('discount.index');
    }
}
