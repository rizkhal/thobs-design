<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('layouts.front.partials.head')
  @stack('styles')
  <body>
    @include('layouts.front.partials.loader')
    <div class="page">
      @include('layouts.front.partials.header')
        <!-- content -->
        @yield('content')

      @include('layouts.front.partials.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset('front/js/core.min.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/myjs.js') }}"></script>
    <!-- coded by starlight-->
    @stack('scripts')
  </body>
</html>
