@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')
    <h1>Input Kain Baru</h1>

    <form action="" method="post">
            <div class="mb-3">
              <label for="inputKodeKain" class="form-label">Kode Kain</label>
              <input type="text" class="form-control" id="inputKodeKain">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection