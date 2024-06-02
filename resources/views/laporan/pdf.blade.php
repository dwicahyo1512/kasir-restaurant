<div>
    <h1 style="text-align: center; margin-bottom: 20px;">Laporan Data Penjualan {{ $name }}</h1>
    <p style="text-align: right;">Tanggal: {{ $tanggalMulai }} sampai dengan {{ $tanggalAkhir }}</p>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">No.</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Nama
                    Pemesan</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Nama Meja
                </th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Discount
                </th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Tanggal
                    Pesanan</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($laporan as $index => $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ ++$no }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $item->nama_pemesan }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $item->meja->nama_meja }}
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Rp.{{ $item->totaldiscount }}
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $item->created_at }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Rp.{{ $item->totalpayment }}
                    </td>
                </tr>
            @endforeach
            <!-- Tambahkan baris data penjualan sesuai dengan data yang Anda miliki -->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"
                    style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: right;">Total
                    Penjualan:</td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">Rp.{{ $totalPenjualan }}</td>
                <!-- Total penjualan bisa disesuaikan dengan nilai total yang sesuai -->
            </tr>
        </tfoot>
    </table>
</div>
