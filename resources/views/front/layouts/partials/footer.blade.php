@push('styles')
  <style type="text/css">
    {{--  --}}
  </style>
@endpush
<!-- Page Footer-->
<footer class="footer-centered section bg-gray-darker">
  <div class="shell">
    <div class="range range-sm-center">
      <div class="cell-sm-10 cell-md-8 cell-lg-6">
        <!-- Brand--><a class="brand" href="index.html">
          <div class="brand__name">
            <img src="{{ asset('front/images/logo-inverse-243x57.png') }}" alt="" width="243" height="57"/>
          </div></a>
          <!-- RD Mailform-->
          <form method="post" action="{{ route('application.subscribe') }}" data-form-output="form-output-global" class="subscribe form_inline">
            @csrf
            <div class="form__inner">
              <div class="form-wrap">
                <input class="form-input" id="subscribe-form-footer-email" type="email" name="email" data-constraints="@Email @Required">
                <label class="form-label" for="subscribe-form-footer-email">Your E-mail...</label>
              </div>
              <div class="form-button">
                <button class="button button-link" type="submit">Subscribe</button>
              </div>
            </div>
          </form>
        <ul class="list-icons list-inline-sm">
          <li><a class="icon icon-sm fa fa-instagram icon-style-camera" href="#"><span></span><span></span><span></span><span></span></a></li>
          <li><a class="icon icon-sm fa fa-facebook icon-style-camera" href="#"><span></span><span></span><span></span><span></span></a></li>
          <li><a class="icon icon-sm fa fa-pinterest icon-style-camera" href="#"><span></span><span></span><span></span><span></span></a></li>
        </ul>
        <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
      </div>
    </div>
  </div>
</footer>