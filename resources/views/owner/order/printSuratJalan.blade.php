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

<table>
    <table>
        <tr>   
            @foreach ($orders as $order)
            <th></th> 
                <th></th>
                <th></th>
                <th>Kepada Yth : </th>
                <th>{{ $order->NamaCustomer }}</th>
            </tr>                  
            <tr>
                <th>Order Id : </th>
                <th>{{ $order->OrderId }}</th>
                <th></th>
                <th></th>
                <th>{{ $order->Alamat }}</th>
            </tr>
            <tr>
                <th>Tanggal : </th>
                <th>{{ $order->Tanggal }}</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <tr>
                <th>Nama Kain : </th>
                <th>{{ $order->NamaKain }}</th>
                <th></th>
                <th>Jumlah Dalam Rol</th>
                <th></th>
            </tr>

            <tr>
                <th></th>
                <th>{{ $order->NamaKain }}</th>
                <th></th>
                <th>{{ $order->Jumlah }}</th>
                <th></th>
            </tr>

 
            <tr>
                <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <tr>
                    <td></td>
                    <td></td>
                    <td>Total : </td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
                
            </table>
            
