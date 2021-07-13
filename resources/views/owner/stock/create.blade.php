@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Input Kain Baru</h1>

    <form action="{{ route('stock_insert') }}" method="post">
      @csrf
            <div class="mb-3">
              <label for="inputKodeKain" class="form-label">Kode Kain</label>
              <input type="text" class="form-control" id="inputKodeKain" name="KodeKain">
            </div>

            <div class="mb-3">
              <label for="inputNamaKain" class="form-label">Nama Kain</label>
              <input type="text" class="form-control" id="inputNamaKain" name="NamaKain">
            </div>

            <div class="mb-3">
              <label for="inputJenisKain" class="form-label">Jenis Kain</label>
              <input type="text" class="form-control" id="inputJenisKain" name="JenisKain">
            </div>

            <div class="mb-3">
              <label for="inputJumlah" class="form-label">Jumlah</label>
              <input type="number" class="form-control" id="inputJumlah" name="Jumlah">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection