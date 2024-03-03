<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt example</title>
    <style>
        * {
            font-size: 8px;
            font-family: 'Times New Roman';
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            border-bottom: 1px dashed black;
            /* Menggunakan garis putus-putus di antara baris */
            padding: 5px;
            /* Tambahkan padding untuk memberikan ruang di sekitar konten */
        }

        th {
            border-bottom: 1px solid black;
        }

        .centered {
            text-align: center;
        }

        .ticket-wrapper {
            max-width: 300px;
            width: 100%;
            margin: auto;
        }

        @media screen and (min-width: 600px) {
            .ticket-wrapper {
                max-width: 400px;
            }
        }

        @media screen and (min-width: 900px) {
            .ticket-wrapper {
                max-width: 500px;
            }
        }
    </style>
</head>

<body>
    <div class="ticket-wrapper">
        <div class="ticket">
            <div style="text-align: center;">
                <img src="assets/store.png" alt="Logo" style="width: 50px; height: auto;">
            </div>
            <p class="centered">{{ $nama }}</p>
            <p class="centered">{{ $alamat }}<br>{{ $telepon }}</p>
            <p>Nama Pembeli: {{ $kasir->nama_pemesan }}</p>
            <p>Nomer Meja: {{ $nomer_meja }}</p>
            <p>Nomer Pesanan: #{{ $kasir->id }}</p>
            <p>Tanggal Pesanan: {{ $kasir->created_at }}</p>
            <table>
                <thead>
                    <tr>
                        <th>JML</th>
                        <th>Pesanan</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $item)
                        <tr class="items">
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->harga * $item->quantity }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td>DISCOUNT</td>
                        <td>
                            @if ($kasir->type_discount === 'percentage')
                                {{ sprintf('%.0f', $kasir->value_discount) }}%
                            @else
                                Rp{{ number_format($kasir->value_discount, 0, ',', '.') }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td>{{ $kasir->totalpayment }}</td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!<br>{{ $nama }}</p>
        </div>
    </div>
</body>

</html>
