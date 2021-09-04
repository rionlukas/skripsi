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


<p><b>CV.Tujuh Benua Mas</b></p>
<p>Jl. Babatan no.66A</p>        
<h1><e><u>Faktur Pembelian</u></e></h1>
<br>
<hr />
<table>
        <tr>   
            <th></th> 
            <th></th>
            <th></th>
            <th>Kepada Yth : </th>
            <th>{{ $pembelians[0]->NamaCustomer }}</th>
        </tr>                  
        <tr>
            <th>Transaksi Id : </th>
            <th>{{ $pembelians[0]->TransactionId }}</th>
            <th></th>
            <th></th>
            <th>{{ $pembelians[0]->Alamat }}</th>
        </tr>
        <tr>
            <th>Tanggal : </th>
            <th>{{ $pembelians[0]->Tanggal }}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        
        @foreach ($orders as $order)
        <tr>
            <th>Nama Kain : </th>
            <th>{{ $pembelians->NamaKain }}</th>
            <th></th>
            <th>Jumlah Dalam Rol</th>
            <th></th>
        </tr>

        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>{{ $pembelians->Jumlah }}</th>
            <th></th>
        </tr>

 
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
        @endforeach
        
        <tr>
            <td></td>
            <td></td>
            <td>Total : </td>
            <td></td>
            <td></td>
        </tr>
                
</table>
            
