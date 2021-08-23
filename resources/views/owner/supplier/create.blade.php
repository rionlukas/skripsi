@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Input Supplier Baru</h1>

    <form action="{{ route('supplier_insert') }}" method="post">
      @csrf

            <div class="mb-3" id="div_KodeSupplier">
              <label for="inputKodeSupplier" class="form-label">Kode Supplier</label>
              <input type="text" class="form-control" id="inputKodeSupplier" name="KodeSupplier">
            </div>

            <div class="mb-3" id="div_NamaSupplier">
                <label for="inputNamaSupplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="inputNamaSupplier" name="NamaSupplier">
            </div>

            <div class="mb-3" id="div_Alamat">
                <label for="inputAlamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="inputAlamat" name="Alamat"></textarea>
            </div>

            <div class="mb-3" id="div_Kota">
                <label for="inputKota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="inputKota" name="Kota">
            </div>

            <div class="mb-3" id="div_Telepon">
                <label for="inputTelepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="inputTelepon" name="Telepon">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection