<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Kasir as ModelsKasir;
use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;

class Kasir extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::with('kategori')->where('status', 1)->get()->toArray();
        // Ambil semua diskon yang tersedia

        $discounts = Discount::where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get()
            ->toArray();
        $categories = Kategori::all()->toArray();
        $meja = Meja::where('status', 0)->get()->toArray();
        $pesanan = ModelsKasir::latest()->take(10)->get()->toArray();
        return view('kasir.index', compact('menus', 'discounts', 'categories', 'pesanan', 'meja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kasir.pesan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tangkap data dari permintaan
        $data = $request->all();
        $kasir = ModelsKasir::create([
            'nama_pemesan' => $data['name'],
            'id_meja' => $data['id_meja'],
            'totaldiscount' => $data['totalDiscount'],
            'totalpayment' => $data['totalPayment'],
            'nama_discount' => $data['selectedDiscount']['name'] ?? 'Tanpa Diskon',
            'type_discount' => $data['selectedDiscount']['type'] ?? 'Tanpa Diskon',
            'value_discount' => $data['selectedDiscount']['value'] ?? 0,
            'min_purchase_amount' => $data['selectedDiscount']['min_purchase_amount'] ?? 0,
        ]);

        if (isset($data['orderedItems']) && is_array($data['orderedItems'])) {
            foreach ($data['orderedItems'] as $item) {

                $kasir->detail_pesanan()->create([
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'harga' => $item['harga'],
                ]);
            }
        }
        // Buat Kasir record dan associate detail_pesanan
        // $kasir = ModelsKasir::create([
        //     'nama_pemesan' => $data['name'],
        //     'totaldiscount' => $data['totalDiscount'],
        //     'totapayment' => $data['totalPayment'],
        // ])->detail_pesanan()->createMany(
        //         array_map(function ($item) use ($data) {
        //             return [
        //                 'name' => $item['name'],
        //                 'quantity' => $item['quantity'],
        //                 'harga' => $item['harga'],
        //             ];
        //         }, $data['orderedItems'] ?? [])
        //     );

        return response()->json([
            'message' => 'Data berhasil disimpan.',
            'data' => $kasir, // Anda bisa mengembalikan data yang divalidasi atau data lain yang relevan
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        dd($request->all());
        return view('kasir.pesan', $request->all());
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

    public function struk1()
    {

        $html = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB; "><span style="font-weight: bold; font-size: 14pt;">Acme Trading Co.</span><br />123 Anystreet<br />Your City<br />GD12 4LP<br /><span style="font-family:dejavusanscondensed;">&#9742;</span> 01777 123 567</td>
<td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

<div style="text-align: right">Date: 13th November 2008</div>

<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
</tr></table>

<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="15%">Ref. No.</td>
<td width="10%">Quantity</td>
<td width="45%">Description</td>
<td width="15%">Unit Price</td>
<td width="15%">Amount</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td class="cost">&pound;2.56</td>
<td class="cost">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td class="cost">&pound;102.11</td>
<td class="cost">&pound;102.11</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td class="cost">&pound;2.56</td>
<td class="cost">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td class="cost">&pound;102.11</td>
<td class="cost">&pound;102.11</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td class="cost">&pound;2.56</td>
<td class="cost">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td class="cost">&pound;102.11</td>
<td class="cost">&pound;102.11</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td class="cost">&pound;2.56</td>
<td class="cost">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td class="cost">&pound;102.11</td>
<td class="cost">&pound;102.11</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td class="cost">&pound;2.56</td>
<td class="cost">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td class="cost">&pound;102.11</td>
<td class="cost">&pound;102.11</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td class="cost">&pound;2.56</td>
<td class="cost">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td class="cost">&pound;102.11</td>
<td class="cost">&pound;102.11</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td class="cost">&pound;2.56</td>
<td class="cost">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td class="cost">&pound;102.11</td>
<td class="cost">&pound;102.11</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&pound;12.26</td>
<td class="cost">&pound;325.60</td>
</tr>
<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="3" rowspan="6"></td>
<td class="totals">Subtotal:</td>
<td class="totals cost">&pound;1825.60</td>
</tr>
<tr>
<td class="totals">Tax:</td>
<td class="totals cost">&pound;18.25</td>
</tr>
<tr>
<td class="totals">Shipping:</td>
<td class="totals cost">&pound;42.56</td>
</tr>
<tr>
<td class="totals"><b>TOTAL:</b></td>
<td class="totals cost"><b>&pound;1882.56</b></td>
</tr>
<tr>
<td class="totals">Deposit:</td>
<td class="totals cost">&pound;100.00</td>
</tr>
<tr>
<td class="totals"><b>Balance due:</b></td>
<td class="totals cost"><b>&pound;1782.56</b></td>
</tr>
</tbody>
</table>


<div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>


</body>
</html>
';


        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 48,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Acme Trading Co. - Invoice");
        $mpdf->SetAuthor("Acme Trading Co.");
        $mpdf->SetWatermarkText("Paid");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);

        // Output PDF to file or return it as response
        $mpdf->Output('struk.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function pdf_struk()
    {

        $filename = 'demo.pdf';

        $data = [
            'title' => 'Generate PDF using Laravel TCPDF - ItSolutionStuff.com!'
        ];

        $html = view()->make('pdfSample', $data)->render();

        $pdf = new TCPDF;

        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));
    }
}
