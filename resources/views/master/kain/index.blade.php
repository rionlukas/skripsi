@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Master Kain</u></h1>

    <a href="/owner/create" class="btn btn-info">Kain Baru</a>

    <table class="table">
        <thead class="table-borderless">
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Harga</th>
            <th>Action</th>
        </thead>

        @foreach ($kains as $kain)
            <tbody>
                    <td>{{ $kain->KodeKain }}</td>
                    <td>{{ $kain->NamaKain }}</td>
                    <td>{{ $kain->JenisKain }}</td>
                    <td>{{ $kain->Harga }}</td>
                    <td>
                        <form action="{{ route('kain_delete', $kain->id) }}" method="POST">
                        
                        <a class="btn btn-primary btn-sm btn-block mb-3" href="{{ route('kain_edit', $kain->id) }}">Edit</a> 
                        
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                      
                    </td>
            </tbody>
        @endforeach
    </table>
        
@endsection