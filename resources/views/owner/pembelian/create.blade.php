@extends('layouts.menu')

@section('section_menu')
    @parent
    
    @endsection
    
    @section('content')
    <h1>Halaman Pembelian</h1>
    
    <form action="{{ route('pembelian_insert') }}" method="post">
        @csrf
        <div class="multiContent">
            <div class="row">
                <div class="col-md">
                    <div class="mb-3">
                        <label for="inputTransactionId" class="form-label">ID Transaksi</label>
                        <input type="text" class="form-control" id="inputTransactionId" name="TransactionId[]" readonly=true>
                    </div>
                </div>

                <div class="col-md">
                    <div class="mb-3">
                        <label for="inputKodeKain" class="form-label">Nama Kain</label>
                        <select name="KodeKain[]" id="KodeKain" class="form-control">
                            <option value="">== Pilih Kain ==</option>
                            @foreach ($kains as $kain)
                            <option value="{{ $kain->KodeKain }}">{{ $kain->NamaKain }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md">
                    <div class="mb-3">
                        <label for="inputStockQty" class="form-label">Stock Tersisa</label>
                        <input type="text" class="form-control" id="inputStockQty" name="StockRemaining" readonly=true>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <div class="mb-3">
                      <label for="inputJenisKain" class="form-label">Jenis Kain</label>
                      <input type="text" class="form-control" id="inputJenisKain" name="JenisKain[]" readonly=true>
                    </div>
                </div>

                <div class="col-md">
                    <div class="mb-3">
                        <label for="inputHarga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="inputHarga" name="Harga[]" readonly=true>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="mb-3">
                      <label for="inputJumlahKain" class="form-label">Jumlah Kain Dalam Roll</label>
                      <input type="number" class="form-control" id="inputJumlahKain" name="Jumlah[]">
                    </div>
                </div>

                <div class="col-md">
                    <div class="mb-3">
                        <label for="inputTotalHarga" class="form-label">Total Harga</label>
                        <input type="number" class="form-control" id="inputTotalHarga" name="TotalHarga[]" readonly=true>
                    </div>
                </div>

                <div class="col-md">
                    <div class="mb-3">
                      <label for="inputSupplier" class="form-label">Supplier</label>
                      <input type="text" class="form-control inputSupplier" id="inputSupplier" name="Supplier" readonly=true>
                    </div>
                </div>
    
            </div>
    
            <div class="row">
                <div class="col-md">
                    <div class="mb-1">
                      <label for="inputTanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control inputTanggal" id="inputTanggal" name="Tanggal[]" disabled=true>
                    </div>
                </div>
    
                <div class="col-md">
                    <div class="mb-3">
                      <label for="inputKeterangan" class="form-label">Keterangan</label>
                      <input type="textarea" class="form-control" id="inputKeterangan" name="Keterangan[]">
                    </div>
                </div>
            </div> 
            
            <hr style="width:100%;text-align:left;margin-left:0"></div> 
            <button class="btn btn-info float-right mb-8" id="btnNewLine"
                type="button" id="btnNewLine" onclick="newLine()">Tambah</button>
            
            </div>
                <div class="container-hidden">
                    <div class="col-md">
                        <div class="mb-3" hidden=true id="div_namaKain">
                            <label for="inputNamaKain" class="form-label">Nama Kain</label>
                            <input type="text" class="form-control" id="inputNamaKain" name="NamaKain[]">
                        </div>
                    </div>
    
                    <div class="col-md">
                        <div class="mb-3" hidden="true">
                            <label for="inputStatus" class="form-label">Status</label>
                            <input type="text" class="form-control" id="inputStatus" name="Status[]" value="Belum Disetujui">
                          </div>
                    </div>
                </div>
            </div>

            <div class="" id="div_notification">

            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block mt-8 mb-4" id="btnSave" hidden=true>Submit</button>
            <button type="button" class="btn btn-primary btn-lg btn-block mt-8 mb-4" id="btnCheckEOQ">Submit</button>
    </form>

    <script>
      window.onload = onPageLoaded();
      function onPageLoaded() {
          localStorage.clear();
          GetAllKainData();
          GetAllSupplierData();
      }

        async function GetAllKainData() {
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

        async function GetAllSupplierData() {
            const data = await fetch("http://127.0.0.1:8000/api/supplier", {
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            }
            });
            
            const dataProps = await data.json();
            var rawData = JSON.stringify(dataProps);
            localStorage.setItem('supplier_data', rawData);
        }

        
        $('#KodeKain').change(function (e) {
            var kk = this.value;
            var dataMaster = JSON.parse(localStorage.data);
            var dataSupplier = JSON.parse(localStorage.supplier_data);
            document.getElementById('inputNamaKain').value = dataMaster.filter(x => x.KodeKain == kk)[0].NamaKain;
            document.getElementById('inputJenisKain').value = dataMaster.filter(x => x.KodeKain == kk)[0].JenisKain;
            document.getElementById('inputStockQty').value = dataMaster.filter(x => x.KodeKain == kk)[0].qty;
            document.getElementById('inputHarga').value = dataMaster.filter(x => x.KodeKain == kk)[0].Harga;

            var supId = dataMaster.filter(x => x.KodeKain == kk)[0].SupplierId;
            $('#inputSupplier').val(dataSupplier.filter(x => x.id == supId)[0].NamaSupplier).change();
        });
    
        $('#inputJumlahKain').change(function (e) {
            var jumlah = this.value;
            var Harga = document.getElementById('inputHarga').value;
            document.getElementById('inputTotalHarga').value = jumlah*Harga;
        });

        function newLine() 
        {
            var max_fields = 25;
            var wrapper = $('.multiContent');
            var add_button = $('.btnNewLine');
            var x = 0;
            if (x < max_fields) {
                x++;
                $(wrapper).append(`
                <div class="induk">
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inputTransactionId" class="form-label">ID Transaksi</label>
                                <input type="text" class="form-control inputTransactionId" id="inputTransactionId" name="TransactionId[]" readonly=true>
                            </div>
                        </div>
                        
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inputKodeKain" class="form-label">Nama Kain</label>
                                <select name="KodeKain[]" id="KodeKain" class="form-control KodeKain">
                                    <option value="">== Pilih Kain ==</option>
                                    @foreach ($kains as $kain)
                                    <option value="{{ $kain->KodeKain }}">{{ $kain->NamaKain }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inputStockQty" class="form-label">Stock Tersisa</label>
                                <input type="text" class="form-control inputStockQty" id="inputStockQty" name="StockRemaining" readonly=true>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                            <label for="inputJenisKain" class="form-label">Jenis Kain</label>
                            <input type="text" class="form-control inputJenisKain" id="inputJenisKain" name="JenisKain[]" readonly=true>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inputHarga" class="form-label">Harga</label>
                                <input type="number" class="form-control inputHarga" id="inputHarga" name="Harga[]" readonly=true>
                            </div>
                        </div>
            
                        <div class="col-md">
                            <div class="mb-3">
                            <label for="inputJumlahKain" class="form-label">Jumlah Kain Dalam Roll</label>
                            <input type="number" class="form-control inputJumlahKain" id="inputJumlahKain" name="Jumlah[]">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inputTotalHarga" class="form-label">Total Harga</label>
                                <input type="number" class="form-control inputTotalHarga" id="inputTotalHarga" name="TotalHarga[]" readonly=true>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inputSupplier" class="form-label">Supplier</label>
                                <input type="text" class="form-control inputSupplier" id="inputSupplier" name="Supplier" readonly=true>
                            </div>
                        </div>
            
                    </div>
            
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-1">
                            <label for="inputTanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control inputTanggal" id="inputTanggal" disabled=true name="Tanggal[]">
                            </div>
                        </div>
            
                        <div class="col-md">
                            <div class="mb-3">
                            <label for="inputKeterangan" class="form-label">Keterangan</label>
                            <input type="textarea" class="form-control inputKeterangan" id="inputKeterangan" name="Keterangan[]">
                            </div>
                        </div>
                    </div> 

                        <div class="col-md" hidden=true>
                            <div class="mb-3" id="div_namaKain">
                                <label for="inputNamaKain" class="form-label">Nama Kain</label>
                                <input type="text" class="form-control inputNamaKain" id="inputNamaKain" name="NamaKain[]">
                            </div>
                        </div>
    
                        <div class="col-md" hidden=true>
                            <div class="mb-3">
                                <label for="inputStatus" class="form-label">Status</label>
                                <input type="text" class="form-control inputStatus" id="inputStatus" name="Status[]" value="Belum Disetujui">
                            </div>
                        </div>
                    </div>

                    <hr style="width:100%;text-align:left;margin-left:0"></div> 

                </div> `
                );
            }

            $('.KodeKain').change(function(e)
            {
                var kk = this.value;
                var dataMaster = JSON.parse(localStorage.data);
                var dataSupplier = JSON.parse(localStorage.supplier_data);
                $(e.target).closest('.induk').find('.inputJenisKain').val(dataMaster.filter(x => x.KodeKain == kk)[0].JenisKain);
                $(e.target).closest('.induk').find('.inputNamaKain').val(dataMaster.filter(x => x.KodeKain == kk)[0].NamaKain);
                $(e.target).closest('.induk').find('.inputStockQty').val(dataMaster.filter(x => x.KodeKain == kk)[0].qty);
                $(e.target).closest('.induk').find('.inputHarga').val(dataMaster.filter(x => x.KodeKain == kk)[0].Harga);
                
                var supId = dataMaster.filter(x => x.KodeKain == kk)[0].SupplierId;
                $(e.target).closest('.induk').find('.inputSupplier').val(dataSupplier.filter(x => x.id == supId)[0].NamaSupplier).change();
                
            });

            $('.inputSupplier').change(function(e)
            {
                $(e.target).closest('.induk').find('.inputTransactionId').val('trx_' + this.value);
                $(e.target).closest('.induk').find('.inputTanggal').prop('disabled', false);
            });

            $('.inputTanggal').change(function(e)
            {
                var trxId = $(e.target).closest('.induk').find('.inputTransactionId').val();
                $(e.target).closest('.induk').find('.inputTransactionId').val();
                var extractTgl = this.value.replace(/-/g,'');
                $(e.target).closest('.induk').find('.inputTransactionId').val(trxId + '_' + extractTgl);
            });

            $('.inputJumlahKain').change(function(e)
            {
                var result = $(e.target).closest('.induk').find('.inputHarga').val() * this.value;
                $(e.target).closest('.induk').find('.inputTotalHarga').val(result);
            });
        }

        $(function(){
          var dtToday = new Date();
          
          var month = dtToday.getMonth() + 1;
          var day = dtToday.getDate();
          var year = dtToday.getFullYear();
          if(month < 10)
              month = '0' + month.toString();
          if(day < 10)
              day = '0' + day.toString();
          
          var maxDate = year + '-' + month + '-' + day;
          $('.inputTanggal').attr('min', maxDate);
        });
    
        $.fn.serializeObject = function()
        {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
    
        function checkEOQ()
        {
            var dataForm = $('form').serializeObject();
            var myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", dataForm._token);
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify($('form').serializeObject());

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://127.0.0.1:8000/owner/pembelian/checkEOQ", requestOptions)
            .then(response => response.text())
            .then(result => {
                if (result != 'aman') {
                var data = JSON.parse(result);
                    if (data.Type == 'Not Exists') {
                        var kk = '';
                        if (data.KodeKain.length > 1) {
                            data.KodeKain.forEach(n => {
                                kk += n + ', ';
                            });

                            kk = kk.substring(0, kk.length - 2);
                            alert('Kode Kain ' + kk + ' Belum didaftarkan di perhitungan EOQ');
                        } else 
                        {
                            alert('Kode Kain ' + data.Kodekain + ' Belum didaftarkan di perhitungan EOQ');
                        }
                    } else {
                        var kk = '';
                        if (data.KodeKain.length > 1) {
                            data.KodeKain.forEach(n => {
                                kk += n;
                            });

                            kk = kk.substring(0, kk.length - 2);
                            alert('Kode Kain ' + kk + 'Belum mencapai save stock');
                            return;
                        } else 
                        {
                            alert('Kode Kain ' + data.KodeKain + ' Belum mencapai save stock');
                            return;
                        }
                    }
                } else
                {
                    $('#btnSave').click();
                }
            })
            .catch(error => console.log('error', error));
        }

        $('#btnCheckEOQ').click(function(e) {
            checkEOQ();
        });

        $('#inputSupplier').change(function(e)
        {
            var supValue = this.value.replace(/\s/g,'');
            $('#inputTransactionId').val('trx_'+ supValue).change();
            $('#inputTanggal').prop('disabled', false);
        });

        $('#inputTanggal').change(function()
        {
           var trxId =  $('#inputTransactionId').val();
           $('#inputTransactionId').val('');
           var extractTgl = this.value.replace(/-/g,'');
           $('#inputTransactionId').val(trxId + '_' + extractTgl).change();
        });
    </script>
@endsection