@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>Edit EOQ</h1>

    <form action="{{ route('eoq_update',$eoq->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="inputKodeKain" class="form-label">Nama Kain</label>
            <select name="KodeKain" id="KodeKain" class="form-control">
            <option value="{{ $eoq->KodeKain }}">{{ $eoq->NamaKain }}</option>
                @foreach ($kains as $kain)
                    <option value="{{ $kain->KodeKain }}">{{ $kain->NamaKain }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" id="inputNamaKain" name="NamaKain" readonly=true hidden=true>
        </div>

        <div class="mb-3">
            <label for="inputJumlahUnit" class="form-label">Jumlah Unit</label>
            <input type="number" class="form-control" id="inputJumlahUnit" name="JumlahUnit" value="{{ $eoq->JumlahUnit }}">
        </div>

        <div class="mb-3">
            <label for="inputBiayaPesanan" class="form-label">Biaya Pesanan</label>
            <input type="number" class="form-control" id="inputBiayaPesanan" name="BiayaPesanan" value="{{ $eoq->BiayaPesanan }}">
        </div>

        <div class="mb-3">
            <label for="inputHargaPembelian" class="form-label">Harga Pembelian Per Unit</label>
            <input type="number" class="form-control" id="inputHargaPembelian" name="HargaPembelian" value="{{ $eoq->HargaPembelian }}">
        </div>

        <div class="mb-3">
            <label for="inputBiayaPenyimpanan" class="form-label">Biaya Penyimpanan (%)</label>
            <input type="number" class="form-control" id="inputBiayaPenyimpanan" name="BiayaPenyimpanan" value="{{ $eoq->BiayaPenyimpanan }}">
        </div>

        <div class="mb-3">
            <button class="btn btn-success" type="button" id="btnHitung">Hitung</button>
            <button class="btn btn-secondary" type="button" id="btnReset">Reset</button>
        </div>

        <div class="mb-3">
            <label for="inputResult" class="form-label">Hasil Perhitungan EOQ</label>
            <input type="number" class="form-control" id="inputResult" name="EOQ" readonly=true value="{{ $eoq->EOQ }}"> 
        </div>

        <div class="mb-3">
            <label for="inputResultOrder" class="form-label">Dengan Jumlah Order Per Tahun Sebanyak : </label>
            <input type="number" class="form-control" id="inputResultOrder" name="JumlahOPT" readonly=true value="{{ $eoq->JumlahOPT }}"> 
        </div>

        <div class="mb-3">
            <label for="inputResultHari" class="form-label">Dilakukan Selama : </label>
            <input type="number" class="form-control" id="inputResultHari" name="FrekuensiOrder" readonly=true value="{{ $eoq->FrekuensiOrder }}">  
        </div>

        <div class="mb-3">
            <label for="inputAcuanEOQ" class="form-label">Acuan EOQ : </label>
            <input type="number" class="form-control" id="inputAcuanEOQ" name="AcuanEOQ" readonly=true value="{{ $eoq->AcuanEOQ }}"> 
        </div>

            <button type="submit" class="btn btn-success">Update</button>
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
            document.getElementById('inputHargaPembelian').value = dataMaster.filter(x => x.KodeKain == kk)[0].Harga;
            document.getElementById('inputNamaKain').value = dataMaster.filter(x => x.KodeKain == kk)[0].NamaKain;
        });

        $('#btnHitung').click(function(e){
            var jmlUnit = $('#inputJumlahUnit').val();
            var biayaPesanan = $('#inputBiayaPesanan').val();
            var hargaPembelian = $('#inputHargaPembelian').val();
            var biayaPenyimpanan = $('#inputBiayaPenyimpanan').val();

            if (jmlUnit.length == 0 || jmlUnit == 0 || jmlUnit == '') {
                alert('Lengkapi Jumlah Unit !');
                return;
            }

            if (biayaPesanan.length == 0 || biayaPesanan == 0 || biayaPesanan == '') {
                alert('Lengkapi Biaya Pesanan !');
                return;
            }

            if (hargaPembelian.length == 0 || hargaPembelian == 0 || hargaPembelian == '') {
                alert('Lengkapi Harga Pembelian !');
                return;
            }

            if (biayaPenyimpanan.length == 0 || biayaPenyimpanan == 0 || biayaPenyimpanan == '') {
                alert('Lengkapi Biaya Penyimpanan !');
                return;
            }

            var result = 0;
            var resultOrder = 0;
            var resultHari = 0;
            var step1 = 0;
            var step2 = 0;
           
            step1 = 2 * jmlUnit * biayaPesanan;
            step2 = step1 / (hargaPembelian * (biayaPenyimpanan / 100));
            result = Math.sqrt(step2);
            resultOrder = jmlUnit / result;
            resultHari = 360 / resultOrder;
            $('#inputResult').val(parseInt(result));    
            $('#inputResultOrder').val(parseInt(resultOrder));
            $('#inputResultHari').val(parseInt(resultHari));

            var acuan = parseInt(result) * parseInt(resultOrder);
            $('#inputAcuanEOQ').val(parseInt(acuan));

        });

        $('#btnReset').click(function() {
            $('#inputJumlahUnit').val('');
            $('#inputBiayaPesanan').val('');
            $('#inputHargaPembelian').val('');
            $('#inputBiayaPenyimpanan').val('');
            $('#inputResult').val('');
            $('#inputResultOrder').val('');
            $('#inputResultHari').val('');
            $('#inputAcuanEOQ').val('');
        });
        
    </script>

@endsection