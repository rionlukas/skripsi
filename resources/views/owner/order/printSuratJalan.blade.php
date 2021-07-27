<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                }

                th, td {
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {background-color: #f2f2f2;
            }
</style>
        </style>

<h1><u>Surat Jalan</u></h1>

    {{-- <table class="table">
        <tr>
            <thead class="table-borderless">
                <th>Kode Kain</th>
                <th>Nama Kain</th>
                <th>Jumlah Dalam Roll</th>
                <th>Harga</th>
                <th>TotalHarga</th>
                <th>Tanggal</th>
            </thead>
        </tr>

        @foreach ($orders as $order)
            <tbody>
                    <td>{{ $order->KodeKain }}</td>
                    <td>{{ $order->NamaKain }}</td>
                    <td>{{ $order->Jumlah }}</td>
                    <td>{{ $order->Harga }}</td>
                    <td>{{ $order->TotalHarga }}</td>
                    <td>{{ $order->TanggalOrder }}</td>
            </tbody>
        @endforeach --}}


        <table>
                <tr>
                    <th>Kode Kain</th>
                    <th>Nama Kain</th>
                    <th>Jumlah Dalam Roll</th>
                    <th>Harga</th>
                    <th>TotalHarga</th>
                    <th>Tanggal</th>
                </tr>
    
            @foreach ($orders as $order)
                <tr>
                        <td>{{ $order->KodeKain }}</td>
                        <td>{{ $order->NamaKain }}</td>
                        <td>{{ $order->Jumlah }}</td>
                        <td>{{ $order->Harga }}</td>
                        <td>{{ $order->TotalHarga }}</td>
                        <td>{{ $order->TanggalOrder }}</td>
                </tr>
            @endforeach
    </table>
