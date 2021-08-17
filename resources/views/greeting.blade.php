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
        <h1>Hello, {{ $name }}</h1>
    </div>

    <script>
        var role = {!! json_encode($role, JSON_HEX_TAG) !!};

        switch(role)
        {
            case 'Owner':
                break;
            
            case 'Admin':
                $('#menuStock').hide();
                $('#menuSuratJalan').hide();
                break;

            case 'Staff':
                $('#menuStock').show();
                $('#menuSuratJalan').show();
                break;

            default:
                break;
        }
    </script>

@endsection