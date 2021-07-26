@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Halaman Order</h1>

    <form action="{{ route('order_insert') }}" method="post">
      @csrf
            <div class="mb-3">
              <label for="inputOrderID" class="form-label">Order ID</label>
              <input type="text" class="form-control" id="inputOrderId" name="OrderId">
            </div>
            <div class="mb-3">
              <label for="inputNamaCustomer" class="form-label">Nama Customer</label>
              <input type="text" class="form-control" id="inputNamaCustomer" name="NamaCustomer">
            </div>

            <div class="mb-3">
              <label for="inputKodeKain" class="form-label">Nama Kain</label>
              <select name="KodeKain" id="KodeKain" class="form-control">
                <option value="">== Pilih Kain ==</option>
                @foreach ($kains as $kain)
                    <option value="{{ $kain->KodeKain }}">{{ $kain->NamaKain }}</option>
                @endforeach
              </select>
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

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
      window.onload = onPageLoaded();
      function onPageLoaded() {
          localStorage.clear();
          GetAllKainData();
      }

      async function GetAllKainData() 
      {
        const data = await fetch("http://127.0.0.1:8000/owner/kain", {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
        });

          const dataProps = await data.json();
          var rawData = JSON.stringify(dataProps);
          localStorage.setItem('data', rawData);
        }

        
        $('#KodeKain').change(function (e) {
            var kk = this.value;
            var dataMaster = JSON.parse(localStorage.data);
            document.getElementById('inputNamaKain').value = dataMaster.filter(x => x.KodeKain == kk)[0].NamaKain;
            document.getElementById('inputJenisKain').value = dataMaster.filter(x => x.KodeKain == kk)[0].JenisKain;
            document.getElementById('inputHarga').value = dataMaster.filter(x => x.KodeKain == kk)[0].Harga;
        });

        $('#inputJumlahKain').change(function (e) {
            var jumlah = this.value;
            var Harga = document.getElementById('inputHarga').value;
            document.getElementById('inputTotalHarga').value = jumlah*Harga;
        });
    
    </script>
@endsection