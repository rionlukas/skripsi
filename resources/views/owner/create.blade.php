@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Tambah Stok Kain</h1>
    
    <br/>
    <form method="{{ url('owner') }}" action="POST">
        @csrf
        Kode Kain : <input type="text" name="kode kain"><br/>
        Nama Kain : <input type="text" name="nama kain"><br/>
        Jenis Kain : <input type="text" name="jenis kain"><br/>
        Jumlah : <input type="text" name="jumlah"><br/>
        <button type="submit" class="btn btn-success">SIMPAN</button>
@endsection