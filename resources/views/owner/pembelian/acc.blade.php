@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Persetujuan Pembelian</u></h1>

    <table class="table">
        <thead class="table-borderless">
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Jumlah Dalam Roll</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>

        @foreach ($stocks as $stock)
            <tbody>
                    <td>{{ $stock->KodeKain }}</td>
                    <td>{{ $stock->NamaKain }}</td>
                    <td>{{ $stock->JenisKain }}</td>
                    <td>{{ $stock->Jumlah }}</td>
                    <td>{{ $stock->Status }}</td>
                    
                    <td>
                        <form>
                            <a class="btn btn-success btn-sm" href="{{ route('pembelian_approval',[$stock->id, 'Disetujui']) }}">Disetujui</a> 
                            <a class="btn btn-danger btn-sm" href="{{ route('pembelian_approval',[$stock->id, 'Ditolak']) }}">Tolak</a>                       
                        </form>
                    </td>
            </tbody>
        @endforeach
    </table>
        
@endsection