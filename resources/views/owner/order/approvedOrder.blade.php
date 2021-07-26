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
            <th>Total Harga</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>

        @foreach ($orders as $order)
            <tbody>
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
                    
                    <td>
                        <form>
                            {{-- <a class="btn btn-secondary btn-sm" href="/owner/order/nota">Detail</a> --}}
                            <a class="btn btn-secondary btn-sm" href="{{ route('order_nota',$order->KodeKain) }}">Detail</a>
                        </form>
                    </td>
            </tbody>
        @endforeach
    </table>
        
@endsection