<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,800,900%7cRaleway:300,400,500,600,700" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/js/jquery.min.js')}}"></script>
    <link href="{{ asset('public/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
   
</head>
<body>
    <div id="app">
    <navbar></navbar>
    <router-view></router-view>
    <myfooter></myfooter>
    </div>
    <script src="{{ asset('public/js/app.js') }}"></script>
</body>
</html>