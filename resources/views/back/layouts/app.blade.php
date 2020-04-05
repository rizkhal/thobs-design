<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('back/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('back/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/toastr/css/toastr.min.css') }}">
    <title>Welcome - {{isset($title) ? $title : "Dashboard"}}</title>
    @stack('styles')
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        @include('back.layouts.partials.header')
        <!-- ============================================================== -->
        @include('back.layouts.partials.sidebar')
        <!-- ============================================================== -->
        @yield('app')
        <!-- ============================================================== -->
        @include('back.layouts.partials.footer')
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    {{-- <script src="{{ asset('back/vendor/jquery/jquery-3.3.1.min.js') }}"></script> --}}
    {{-- this datatable include jquery 3.3.1 --}}
    <script src="{{ asset('back/vendor/datatables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('back/vendor/toastr/js/toastr.min.js') }}"></script>
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
                    toastr["{{$value['type']}}"]("{{ $value['message'] }}");
                @endforeach
            </script>
        @endif
        @php
            session()->forget('notice');
        @endphp
    @endif

    <!-- bootstap bundle js -->
    <script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('back/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('back/libs/js/main-js.js') }}"></script>
    @stack('scripts')
</body>

</html>