<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ URL::asset('resources/assets/bootstrap/css/bootstrap.min.css') }}">

    <script type="text/javascript" src="{{ URL::asset('resources/assets/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/assets/bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>

    @include('layouts.panel')

    <div class="container">
        @yield('content')
    </div>

</body>