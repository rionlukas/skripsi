@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u> Surat Jalan </u></h1>

    <form action="{{ route('surat_jalan_insert') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="inputSalesman" class="form-label">Salesman</label>
            <input type="text" class="form-control" id="inputSalesman" name="Salesman">
        </div>
    
        
        <div class="mb-3">
            <label for="inputDaftarOrder" class="form-label">Daftar Order</label>
            <select name="OrderId" id="DaftarOrder" class="form-control">
                <option value="">== Pilih Order ==</option>
                @foreach ($orders as $order)
                <option value="{{ $order->OrderId }}">{{ $order->OrderId }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="inputTanggal" class="form-label">Tanggal</label>
            <input type="text" class="form-control inputTanggal" id="inputTanggal" name="Tanggal" readonly=true>
        </div>

        <div class="mb-3">
            <label for="inputKodeKain" class="form-label">Kode Kain</label>
            <input type="text" class="form-control" id="inputKodeKain" name="KodeKain" readonly=true>
        </div>
    
        <div class="mb-3">
            <label for="inputNamaKain" class="form-label">Nama Kain</label>
            <input type="text" class="form-control" id="inputNamaKain" name="NamaKain" readonly=true>
        </div>
    
        <div class="mb-3">
            <label for="inputJumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="inputJumlah" name="Jumlah" readonly=true>
        </div>

        <div class="mb-3">
            <label for="inputAlamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="inputAlamat" name="Alamat"></textarea>
        </div>
        
        <div class="mb-3" hidden="true">
            <label for="inputHarga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="inputHarga" name="Harga" value=0 readonly=true>
        </div>
    
        <div class="mb-3" hidden="true">
            <label for="inputTotal" class="form-label">Total</label>
            <input type="number" class="form-control" id="inputTotal" name="Total" value=0 readonly=true>
        </div>
    
        <div class="mb-3" hidden=true>
            <label for="inputSubTotal" class="form-label">Total</label>
            <input type="number" class="form-control" id="inputSubTotal" name="SubTotal" value=0 readonly=true>
        </div>
    
    
        <div class="mb-3" hidden=true>
            <label for="inputJSONString" class="form-label">JSON String</label>
            <input type="text" class="form-control" id="inputJSONString" name="JSONString" value=" ">
        </div>

        <button class="btn btn-success mb-3" type="submit">Submit</button>

    </form>

    <script>
        window.onload = onPageLoaded();
        function onPageLoaded() {
            localStorage.clear();
            GetAllKainData();
        }
  
        async function GetAllKainData() 
        {
          const data = await fetch("http://127.0.0.1:8000/owner/order/all", {
          method: "GET",
          headers: {
              "Content-Type": "application/json"
          }
          });
  
            const dataProps = await data.json();
            var rawData = JSON.stringify(dataProps);
            localStorage.setItem('data', rawData);
          }
  
          
          $('#DaftarOrder').change(function (e) {
              var dataMaster = JSON.parse(localStorage.data);
              document.getElementById('inputKodeKain').value = dataMaster.filter(x => x.OrderId == this.value)[0].KodeKain;
              document.getElementById('inputNamaKain').value = dataMaster.filter(x => x.OrderId == this.value)[0].NamaKain;
              document.getElementById('inputJumlah').value = dataMaster.filter(x => x.OrderId == this.value)[0].Jumlah;
              document.getElementById('inputTanggal').value = dataMaster.filter(x => x.OrderId == this.value)[0].TanggalOrder;
          });
      
      </script>
@endsection