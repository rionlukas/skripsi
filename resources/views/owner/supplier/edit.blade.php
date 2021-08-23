@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>Edit Supplier</h1>

    <form action="{{ route('supplier_update',$supplier->id) }}" method="post">
      @csrf
      @method('PUT')
            <div class="mb-3">
              <label for="inputKodesupplier" class="form-label">Kode supplier</label>
              <input type="text" class="form-control" id="inputKodesupplier" name="KodeSupplier" value="{{ $supplier->KodeSupplier }}">
            </div>

            <div class="mb-3">
              <label for="inputNamasupplier" class="form-label">Nama supplier</label>
              <input type="text" class="form-control" id="inputNamasupplier" name="NamaSupplier" value="{{ $supplier->NamaSupplier }}">
            </div>

            <div class="mb-3">
              <label for="inputAlamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="inputAlamat" name="Alamat" value="{{ $supplier->Alamat }}">
            </div>

            <div class="mb-3">
              <label for="inputTelepon" class="form-label">Telepon</label>
              <input type="text" class="form-control" id="inputTelepon" name="Telepon" value="{{ $supplier->Telepon }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection