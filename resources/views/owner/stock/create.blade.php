@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Input Kain Baru</h1>

    <form action="{{ route('stock_insert') }}" method="post">
      @csrf
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
              <input type="text" class="form-control" id="inputNamaKain" name="NamaKain" readOnly=true>
            </div>

            <div class="mb-3">
              <label for="inputJenisKain" class="form-label">Jenis Kain</label>
              <input type="text" class="form-control" id="inputJenisKain" name="JenisKain" readOnly=true>
            </div>

            <div class="mb-3">
              <label for="inputJumlah" class="form-label">Jumlah Dalam Roll</label>
              <input type="number" class="form-control" id="inputJumlah" name="Jumlah">
            </div>

            <div class="mb-3" hidden="true">
              <label for="inputStatus" class="form-label">Status</label>
              <input type="text" class="form-control" id="inputStatus" name="Status" value="Belum Disetujui">
            </div>

            {{-- <div class="mb-3" hidden=true>
              <label for="inputKeterangan" class="form-label">Keterangan</label>
              <input type="text" class="form-control" id="inputKeterangan" name="Keterangan" value="">
            </div>

            <div class="mb-3" hidden=true>
              <label for="inputSupplier" class="form-label">Supplier</label>
              <input type="text" class="form-control" id="inputSupplier" name="Supplier" value="">
            </div> --}}

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
        });
    
    </script>

@endsection