@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Halaman Pembelian</h1>

    <form action="{{ route('pembelian_insert') }}" method="post">
      @csrf
            <div class="mb-3">
              <label for="inputTransactionId" class="form-label">ID Transaksi</label>
              <input type="text" class="form-control" id="inputTransactionId" name="TransactionId">
            </div>

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
              <label for="inputJumlahKain" class="form-label">Jumlah Kain Dalam Roll</label>
              <input type="number" class="form-control" id="inputJumlahKain" name="Jumlah">
            </div>

            <div class="mb-3">
              <label for="inputSupplier" class="form-label">Supplier</label>
              <input type="text" class="form-control" id="inputSupplier" name="Supplier">
            </div>

            <div class="mb-1">
              <label for="inputTanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control" id="inputTanggal" name="Tanggal">
            </div>

            <div class="mb-3">
              <label for="inputKeterangan" class="form-label">Keterangan</label>
              <input type="textarea" class="form-control" id="inputKeterangan" name="Keterangan">
            </div>

            <div class="mb-3" hidden="true">
              <label for="inputStatus" class="form-label">Status</label>
              <input type="text" class="form-control" id="inputStatus" name="Status" value="Belum Disetujui">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection