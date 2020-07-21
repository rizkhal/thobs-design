<head>
    <!-- Site Title-->
    <title>Daeng Tobs Studio - {{isset($title) ? $title : "Daeng Tobs Studio"}}</title>
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

    {{-- waiting... --}}
    {{-- @include('front.layouts.partials.seo') --}}

    <!-- icons -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/icon1.ico') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/icon2.ico')}}">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,400,700,400italic%7CJosefin+Sans:400,700,300italic">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>
