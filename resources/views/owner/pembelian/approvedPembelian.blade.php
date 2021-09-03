@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Persetujuan Pembelian</u></h1>

    <table class="table">
        <thead class="table-borderless">
            <th>ID Transaksi</th>
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Jumlah Dalam Roll</th>
            <th>Supplier</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>

        @foreach ($pembelians as $pembelian)
            <tbody>
                    <td>{{ $pembelian->TransactionId }}</td>
                    <td>{{ $pembelian->KodeKain }}</td>
                    <td>{{ $pembelian->NamaKain }}</td>
                    <td>{{ $pembelian->JenisKain }}</td>
                    <td>{{ $pembelian->Jumlah }}</td>
                    <td>{{ $pembelian->Supplier }}</td>
                    <td>{{ $pembelian->TanggalPembelian }}</td>
                    <td>{{ $pembelian->Keterangan }}</td>
                    <td>{{ $pembelian->Status }}</td>
                    
                    <td>
                        <form>
                            <a class="btn btn-success btn-sm" href="{{ route('pembelian_print_nota', $pembelian->TransactionId) }}">Detail</a>                       
                        </form>
                    </td>
            </tbody>
        @endforeach
    </table>
        
@endsection