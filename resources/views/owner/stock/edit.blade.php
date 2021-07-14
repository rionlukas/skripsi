@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>this is edit page</h1>

    <form action="{{ route('stock_insert',$stock->id) }}" method="post">
      @csrf
      @method('PUT')
            <div class="mb-3">
              <label for="inputKodeKain" class="form-label">Kode Kain</label>
              <input type="text" class="form-control" id="inputKodeKain" name="KodeKain" value="{{ $stock->KodeKain }}">
            </div>

            <div class="mb-3">
              <label for="inputNamaKain" class="form-label">Nama Kain</label>
              <input type="text" class="form-control" id="inputNamaKain" name="NamaKain" value="{{ $stock->NamaKain }}">
            </div>

            <div class="mb-3">
              <label for="inputJenisKain" class="form-label">Jenis Kain</label>
              <input type="text" class="form-control" id="inputJenisKain" name="JenisKain" value="{{ $stock->JenisKain }}">
            </div>

            <div class="mb-3">
              <label for="inputJumlah" class="form-label">Jumlah</label>
              <input type="number" class="form-control" id="inputJumlah" name="Jumlah" value="{{ $stock->JumlahKain }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection