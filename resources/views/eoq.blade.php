@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>This is eoq page</h1>

        <div class="mb-3">
            <label for="inputJumlahUnit" class="form-label">Jumlah Unit</label>
            <input type="number" class="form-control" id="inputJumlahUnit" name="JumlahUnit">
        </div>

        <div class="mb-3">
            <label for="inputBiayaPesanan" class="form-label">Biaya Pesanan</label>
            <input type="number" class="form-control" id="inputBiayaPesanan" name="BiayaPesanan">
        </div>

        <div class="mb-3">
            <label for="inputHargaPembelian" class="form-label">Harga Pembelian Per Unit</label>
            <input type="number" class="form-control" id="inputHargaPembelian" name="HargaPembelian">
        </div>

        <div class="mb-3">
            <label for="inputBiayaPenyimpanan" class="form-label">Biaya Penyimpanan (%)</label>
            <input type="number" class="form-control" id="inputBiayaPenyimpanan" name="BiayaPenyimpanan">
        </div>

        <div class="mb-3">
            <button class="btn btn-success" id="btnHitung">Hitung</button>
            <button class="btn btn-secondary" id="btnReset">Reset</button>
        </div>

        <div class="mb-3">
            <label for="inputResult" class="form-label">Hasil Perhitungan EOQ</label>
            <input type="number" class="form-control" id="inputResult" name="Result" readonly=true> 
        </div>

        <div class="mb-3">
            <label for="inputResultOrder" class="form-label">Dengan Jumlah Order Per Tahun Sebanyak : </label>
            <input type="number" class="form-control" id="inputResultOrder" name="ResultOrder" readonly=true> 
        </div>

    <script>

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
            var step1 = 0;
            var step2 = 0;
           


            step1 = 2 * jmlUnit * biayaPesanan;
            step2 = step1 / (hargaPembelian * (biayaPenyimpanan / 100));
            result = Math.sqrt(step2);
            resultOrder = jmlUnit / result;
            $('#inputResult').val(result);
            $('#inputResultOrder').val(resultOrder);

        });

        $('#btnReset').click(function() {
            $('#inputJumlahUnit').val('');
            $('#inputBiayaPesanan').val('');
            $('#inputHargaPembelian').val('');
            $('#inputBiayaPenyimpanan').val('');
            $('#inputResult').val('');
        });
        
    </script>


@endsection