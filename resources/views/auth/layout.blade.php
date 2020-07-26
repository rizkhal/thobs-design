<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
    <title>Login | Daeng Tobs Digital Design</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/linearicons/style.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <!-- ICONS -->
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png"> --}}
    {{-- <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png"> --}}

    @stack('styles')
</head>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        @yield("auth")
    </div>
    <!-- END WRAPPER -->

</body>
</html>
