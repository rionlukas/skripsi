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

<p><b>CV.Tujuh Benua Mas</b></p>
<p>Jl. Babatan no.66A</p>       
<p>08213342148</p>       
<h2><e><u>Nota Order</u></e></h2>
<br>
<hr style="border: 1px solid rgb(7, 17, 105);">

    <div class="row">
        <div>
      
        <table>
    <tr>   
        <th></th> 
        <th></th>
        <th></th>
        <th>Kepada Yth : </th>
        <th>{{ $orders[0]->NamaCustomer }}</th>
    </tr>                  
    <tr>
        <th>Order Id  </th>
        <th>:</th>
        <th>{{ $orders[0]->OrderId }}</th>
        <th></th>
        <th>{{ $orders[0]->Alamat }}</th>
    </tr>
    <tr>
        <th>Tanggal </th>
        <th>:</th>
        <th>{{ $orders[0]->TanggalOrder }}</th>
        <th></th>
        <th></th>
    </tr>
        </table>
    
        </div>
        </div>    
        <hr style="border: 1px solid rgb(7, 17, 105);">

            <div class="row">
                <div>
    @foreach ($orders as $order)
    
    <table style="border: 1px;">
        <tr>
            <th>Nama Kain </th>
            <th>Jumlah Rol</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <tr>
            <th>{{ $order->NamaKain }}</th>
            <th>{{ $order->Jumlah }}</th>
            <th></th>
            <th></th>
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
            <td>Total Harga</td>
            <td>:</td>
            <td> {{ $totals }}</td>
        </tr>
    </table>
    </div>
</div>
<hr style="border: 1px solid red;">            
