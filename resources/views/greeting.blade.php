<head>
    <style>
        .container 
        {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            padding: 20px 25px;
            width: 700px;
        }
    </style>
</head>

@extends('layouts.menu')

@section('section_menu')
    @parent

@endsection

@section('content')

    <div class="container">
        <h1>Hello, {{ $data[0]->name }}</h1>
    </div>

    <script>
        var data = {!! json_encode($data->toArray(), JSON_HEX_TAG) !!}
        console.log(data);
    </script>

@endsection