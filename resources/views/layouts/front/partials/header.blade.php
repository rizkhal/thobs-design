<!-- Page header-->
<header class="section page-header">
  <!-- RD Navbar-->
  <div class="rd-navbar-wrap">
    <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="5px" data-lg-stick-up-offset="5px" data-md-stick-up="true" data-lg-stick-up="true">
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
          <!-- RD Navbar Panel-->
          <div class="rd-navbar-panel">
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <!-- RD Navbar Brand-->
            <div class="rd-navbar-brand">
              <a class="brand" href="{{ url('/') }}">
                <div class="brand__name">
                  <img class="brand__logo-dark" src="{{ asset('images/logo.jpg') }}" alt="" width="243" height="57"/>
                  {{-- <img class="brand__logo-light" src="{{ asset('front/images/logo-inverse-243x57.png') }}" alt="" width="243" height="57"/> --}}
                </div>
              </a>
            </div>
          </div>
          <!-- RD Navbar Nav-->
          <div class="rd-navbar-nav-wrap">
            <div class="rd-navbar-element">
              <ul class="list-icons list-inline-sm">
                @foreach ($socials as $key => $social)
                  <li><a href="{{$social->link}}" target="_blank" class="icon icon-sm fa fa-{{social_render($social->platform)}} icon-style-camera"><span></span><span></span><span></span><span></span></a></li>
                @endforeach
              </ul>
            </div>
            <!-- RD Navbar Nav-->
            <ul class="rd-navbar-nav">
              <li class="{{ active('/') }}"><a href="{{ route('application.index') }}">Home</a></li>
              <li class="{{ active('pages/projects*') }}"><a href="{{ route('application.project.index') }}">Project</a></li>
              <li class="{{ active('pages/blog*') }}"><a href="{{ route('application.blog.index') }}">Blog</a></li>
              <li class="{{ active('pages/contact*') }}"><a href="{{ route('application.contact') }}">Kontak</a></li>
              <li class=""><a href="#">Tentang</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
