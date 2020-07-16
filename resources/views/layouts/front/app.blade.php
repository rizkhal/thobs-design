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
    {{-- <div class="snackbars" id="form-output-global"></div> --}}
    <!-- Javascript-->
    <script src="{{ asset('front/js/core.min.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/myjs.js') }}"></script>
    <!-- coded by starlight-->
    @stack('scripts')
    <!--Start of Tawk.to Script-->
    {{-- @if (env('APP_ENV', 'production')) --}}
      <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e5750cda89cda5a188829c1/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
      })();
    </script>
    {{-- @endif --}}
    <!--End of Tawk.to Script-->
  </body>
</html>
