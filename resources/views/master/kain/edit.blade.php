@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>Edit Kain</h1>

    <form action="{{ route('kain_update',$kain->id) }}" method="post">
      @csrf
      @method('PUT')
            <div class="mb-3">
              <label for="inputKodeKain" class="form-label">Kode Kain</label>
              <input type="text" class="form-control" id="inputKodeKain" name="KodeKain" value="{{ $kain->KodeKain }}">
            </div>

            <div class="mb-3">
              <label for="inputNamaKain" class="form-label">Nama Kain</label>
              <input type="text" class="form-control" id="inputNamaKain" name="NamaKain" value="{{ $kain->NamaKain }}">
            </div>

            <div class="mb-3">
              <label for="inputJenisKain" class="form-label">Jenis Kain</label>
              <input type="text" class="form-control" id="inputJenisKain" name="JenisKain" value="{{ $kain->JenisKain }}">
            </div>

            <div class="mb-3">
              <label for="inputHarga" class="form-label">Harga</label>
              <input type="number" class="form-control" id="inputHarga" name="Harga" value="{{ $kain->Harga }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection