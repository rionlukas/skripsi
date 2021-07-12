@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Stock</u></h1>

    <table class="table">
        <thead class="table-borderless">
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Jumlah</th>
            <th>Action</th>
        </thead>

        @foreach ($stocks as $stock)
            <tbody>
                    <td>{{ $stock->KodeKain }}</td>
                    <td>{{ $stock->NamaKain }}</td>
                    <td>{{ $stock->JenisKain }}</td>
                    <td>{{ $stock->Jumlah }}</td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
            </tbody>
        @endforeach
    </table>
        
@endsection