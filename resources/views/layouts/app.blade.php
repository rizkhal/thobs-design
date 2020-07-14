<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{isset($title) ? "$title | Daeng Thobs.": "Daeng Thobs."}}</title>
    <!-- vendor styles -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/linearicons/style.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- icons -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon.png')}}">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <!-- push stack styles -->
    @stack('styles')
</head>
<body>

    <div id="wrapper">
        @auth
            @include('layouts.partials.header')
            @include('layouts.partials.sidebar')
        @endauth
        <!-- main wrapper -->
        <div class="main">
            <div class="main-content">
                @yield("app")
            </div>
        </div>
        @auth
            @include('layouts.partials.footer')
        @endauth
    </div>

    <!-- toastr -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

    <!-- setup toastr -->
    <script type="text/javascript">
        toastr.options = {
            "progressBar": true,
        };
    </script>

    @if (session()->has('notice'))
        @php
            $values = session()->get('notice');
        @endphp
        @if (is_array($values))
            <script type="text/javascript">
                @foreach ($values as $value)
                    toastr["{{$value["type"]}}"]("{{$value["message"]}}");
                @endforeach
            </script>
        @endif
        @php
            session()->forget('notice');
        @endphp
    @endif
    <!-- end toastr -->

    <!-- vendor scripts -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('vendor/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('js/klorofil-common.js')}}"></script>
    <!-- push stack scripts -->
    <script lang="javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
