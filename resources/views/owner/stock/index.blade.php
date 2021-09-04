@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Stock</u></h1>

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

    <a href="/owner/create" class="btn btn-info">Kain Baru</a>
    <br><br>
    {{ $stocks->links() }}

    <table class="table">
        <thead class="table-borderless">
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Jumlah Dalam Roll</th>
            <th>Action</th>
        </thead>

        @foreach ($stocks as $stock)
            <tbody>
                    <td>{{ $stock->KodeKain }}</td>
                    <td>{{ $stock->NamaKain }}</td>
                    <td>{{ $stock->JenisKain }}</td>
                    <td>{{ $stock->Jumlah }}</td>
                    <td>
                        <form action="{{ route('stock_destroy',$stock->id) }}" method="POST">
                        
                        <a class="btn btn-primary btn-sm" href="{{ route('stock_edit',$stock->id) }}">Edit</a> 
                        
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                      
                    </td>
            </tbody>
        @endforeach
    </table>        
@endsection