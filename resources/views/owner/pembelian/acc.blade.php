@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

<h1><u>Persetujuan Pembelian</u></h1>

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    
    <table class="table">
        <thead class="table-bpembelianless">
            <th>Kode Kain</th>
            <th>Nama Kain</th>
            <th>Jenis Kain</th>
            <th>Jumlah Dalam Roll</th>
            <th>Supplier</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>

        @foreach ($pembelians as $pembelian)
            <tbody class="formGroup">
                    <td>{{ $pembelian->KodeKain }}</td>
                    <td>{{ $pembelian->NamaKain }}</td>
                    <td>{{ $pembelian->JenisKain }}</td>
                    <td>{{ $pembelian->Jumlah }}</td>
                    <td>{{ $pembelian->Supplier }}</td>
                    <td>{{ $pembelian->TanggalPembelian }}</td>
                    <td>{{ $pembelian->Keterangan }}</td>
                    <td>{{ $pembelian->Status }}</td>
                    <form>
                        <td>
                            <input type="number" class="form-control JumlahAcc" name="JumlahAcc" id="JumlahAcc" value="{{$pembelian->JumlahAcc}}"/>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm btnApprove" type="button" id="btnApprove" value={{$pembelian->id}}>Disetujui</button> 
                            <button class="btn btn-danger btn-sm btnReject" type="button" id="btnReject" value={{$pembelian->id}}>Tolak</button>                       
                        </td>
                    </form>
            </tbody>
        @endforeach
    </table>
        

    <script>
        $('.btnApprove').click(function(event) {
            var id = event.target.value;
            // var jmlAcc = $('#JumlahAcc').val();
            var jmlAcc = $(event.target).closest('.formGroup').find('.JumlahAcc').val();
            var url = 'http://127.0.0.1:8000/api/owner/pembelian/approve/' + id + '/Disetujui/' + jmlAcc;
            
            fetch(url, {
                method: 'PUT',
                body: []
            }).then(response => console.log(response))
            window.location.href = './pembelian'
        });
        
        $('.btnReject').click(function(event) {
            var id = event.target.value;
            var jmlAcc = $('#JumlahAcc').val();
            var url = 'http://127.0.0.1:8000/api/owner/pembelian/approve/' + id + '/Ditolak/' + jmlAcc;
            fetch(url, {
                method: 'PUT',
                body: []
            }).then(response => function() {
                debugger;
                console.log(response);
            })
            window.location.href = './pembelian'
        });
    </script>
        
@endsection