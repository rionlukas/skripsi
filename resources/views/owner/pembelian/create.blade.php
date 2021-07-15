@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Halaman Pembelian</h1>

    <form action="{{ route('pembelian_acc') }}" method="post">
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
              <label for="inputSupplier" class="form-label">Supplier</label>
              <input type="number" class="form-control" id="inputSupplier" name="Supplier">
            </div>

            <div class="mb-3">
              <label for="inputTanggal" class="form-label">Tanggal</label>
              <input type="number" class="form-control" id="inputTanggal" name="Tanggal">
            </div>

            <div class="mb-3">
              <label for="inputKeterangan" class="form-label">Keterangan</label>
              <input type="textarea" class="form-control" id="inputKeterangan" name="Keterangan">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection