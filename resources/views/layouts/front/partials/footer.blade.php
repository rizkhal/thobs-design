<!-- Page Footer-->
<footer class="footer-centered section bg-gray-darker">
  <div class="shell">
    <div class="range range-sm-center">
      <div class="cell-sm-10 cell-md-8 cell-lg-6">
        <ul class="list-icons list-inline-sm">
          @foreach ($socials as $key => $social)
            <li><a href="{{$social->link}}" target="_blank" class="icon icon-sm fa fa-{{social_render($social->platform)}} icon-style-camera"><span></span><span></span><span></span><span></span></a></li>
          @endforeach
        </ul>
        <p class="rights">Copyright <span>&copy;&nbsp;</span><span class="copyright-year"></span>. Daeng Tobs Digital Design.</p>
      </div>
    </div>
  </div>
</footer>
