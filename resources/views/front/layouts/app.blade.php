<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  @include('front.layouts.partials.head')
  <body>
    @include('front.layouts.partials.loader')
    <div class="page">
      @include('front.layouts.partials.header')

        @yield('content')

      @include('front.layouts.partials.footer')
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{ asset('front/js/core.min.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <!-- coded by starlight-->
  </body>
</html>