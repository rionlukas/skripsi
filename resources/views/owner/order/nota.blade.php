@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u> Nota Pembayaran </u></h1>

<div class="mb-3">
    <label for="inputOrderID" class="form-label">Order ID</label>
    <input type="text" class="form-control" id="inputOrderId" name="OrderId" value={{$order->OrderId}}>
  </div>
  <div class="mb-3">
    <label for="inputNamaCustomer" class="form-label">Nama Customer</label>
    <input type="text" class="form-control" id="inputNamaCustomer" name="NamaCustomer">
  </div>

  <div class="mb-3">
    <label for="inputKodeKain" class="form-label">Kode Kain</label>
    <input type="text" class="form-control" id="inputKodeKain" name="KodeKain">
  </div>

  <div class="mb-3" hidden=true id="div_namaKain">
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
    <label for="inputHarga" class="form-label">Harga</label>
    <input type="number" class="form-control" id="inputHarga" name="Harga">
  </div>

  <div class="mb-3">
    <label for="inputTotalHarga" class="form-label">Total Harga</label>
    <input type="number" class="form-control" id="inputTotalHarga" name="TotalHarga">
  </div>

  <div class="mb-1">
    <label for="inputTanggal" class="form-label">Tanggal Beli</label>
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
        
@endsection