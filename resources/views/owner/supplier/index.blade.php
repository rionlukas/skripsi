@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Master Supplier</u></h1>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <a href="/owner/supplier/create" class="btn btn-info">Supplier Baru</a>

    <table class="table">
        <thead class="table-borderless">
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telepon</th>
            <th>Action</th>
        </thead>

        @foreach ($suppliers as $supplier)
            <tbody>
                    <td>{{ $supplier->KodeSupplier }}</td>
                    <td>{{ $supplier->NamaSupplier }}</td>
                    <td>{{ $supplier->Alamat }}</td>
                    <td>{{ $supplier->Kota }}</td>
                    <td>{{ $supplier->Telepon }}</td>
                    <td>
                        <form action="{{ route('supplier_delete', $supplier->id) }}" method="POST">
                        
                        <a class="btn btn-primary btn-sm btn-block mb-3" href="{{ route('supplier_edit', $supplier->id) }}">Edit</a> 
                        
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                      
                    </td>
            </tbody>
        @endforeach
    </table>
        
@endsection