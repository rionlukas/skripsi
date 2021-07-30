@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

    <h1>Testing Layout </h1>

    <div class="container">
        <div class="row">
            <div class="col-md">
                <label>input 1</label>
                <input type="text" class="form-control"/>
            </div>

            <div class="col-md">
                <label>input 2</label>
                <input type="text" class="form-control"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <label>input 3</label>
                <input type="text" class="form-control"/>
            </div>
        </div>
    </div>

@endsection