@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Persetujuan Order</u></h1>

    <table class="table">
        <thead class="table-borderless">
            <th>Order ID</th>
            <th>Nama Customer</th>
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Jumlah Dalam Roll</th>
            <th>Harga</th>
            <th>TotalHarga</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Jumlah Acc</th>
            <th>Aksi</th>
        </thead>

        @foreach ($orders as $order)
            <tbody class="formGroup">
                    <td>{{ $order->OrderId }}</td>
                    <td>{{ $order->NamaCustomer }}</td>
                    <td>{{ $order->KodeKain }}</td>
                    <td>{{ $order->NamaKain }}</td>
                    <td>{{ $order->JenisKain }}</td>
                    <td>{{ $order->Jumlah }}</td>
                    <td>{{ $order->Harga }}</td>
                    <td>{{ $order->TotalHarga }}</td>
                    <td>{{ $order->TanggalOrder }}</td>
                    <td>{{ $order->Keterangan }}</td>
                    <td>{{ $order->Status }}</td>
                    <form>
                        <td>
                            <input type="number" class="form-control JumlahAcc" name="JumlahAcc" id="JumlahAcc" value="{{$order->JumlahAcc}}"/>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm btnApprove" type="button" id="btnApprove" value={{$order->id}}>Disetujui</button> 
                            <button class="btn btn-danger btn-sm btnReject" type="button" id="btnReject" value={{$order->id}}>Tolak</button>                       
                        </td>
                    </form>
            </tbody>
        @endforeach
    </table>

    <script>
        $('.btnApprove').click(function(event) {
            var id = event.target.value;
            var jmlAcc = $(event.target).closest('.formGroup').find('.JumlahAcc').val();
            var url = 'http://127.0.0.1:8000/api/owner/order/approve/' + id + '/Disetujui/' + jmlAcc;
            
            fetch(url, {
                method: 'PUT',
                body: []
            }).then(response => console.log(response))
            window.location.href = './order'
        });
        
        $('.btnReject').click(function(event) {
            var id = event.target.value;
            var jmlAcc = $('#JumlahAcc').val();
            var url = 'http://127.0.0.1:8000/api/owner/order/approve/' + id + '/Ditolak/' + jmlAcc;
            fetch(url, {
                method: 'PUT',
                body: []
            }).then(response => console.log(response))
            window.location.href = './order'
        });
    </script>
        
@endsection