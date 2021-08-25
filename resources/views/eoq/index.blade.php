@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Data EOQ</u></h1>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    
    <a href="/owner/create" class="btn btn-info">Kain Baru</a>

    <table class="table">
        <thead class="table-borderless">
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jumlah Unit</th>
            <th>Biaya Pesanan</th>
            <th>Harga Pembelian</th>
            <th>Biaya Penyimpanan</th>
            <th>EOQ</th>
            <th>Jumlah OPT</th>
            <th>Frekuensi Order</th>
            <th>Save Stock</th>
        </thead>

        @foreach ($eoqs as $eoq)
            <tbody>
                    <td>{{ $eoq->KodeKain }}</td>
                    <td>{{ $eoq->NamaKain }}</td>
                    <td>{{ $eoq->JumlahUnit }}</td>
                    <td>{{ $eoq->BiayaPesanan }}</td>
                    <td>{{ $eoq->HargaPembelian }}</td>
                    <td>{{ $eoq->BiayaPenyimpanan }}</td>
                    <td>{{ $eoq->EOQ }}</td>
                    <td>{{ $eoq->JumlahOPT }}</td>
                    <td>{{ $eoq->FrekuensiOrder }}</td>
                    <td>{{ $eoq->AcuanEOQ }}</td>
                    <td>
                        <form action="{{ route('eoq_delete', $eoq->id) }}" method="POST">
                        
                        <a class="btn btn-primary btn-sm btn-block mb-3" href="{{ route('eoq_edit', $eoq->id) }}">Edit</a> 
                        
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                      
                    </td>
            </tbody>
        @endforeach
    </table>
        
@endsection