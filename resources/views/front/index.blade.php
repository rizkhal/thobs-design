@extends('front.layouts.app')

@section('content')
<!-- My Best Photos-->
<section class="section bg-white text-center">
  <!-- Slick Carousel-->
  <div class="slick-wrap">
    <div class="slick-slider slick-style-1" data-arrows="true" data-autoplay="false" data-loop="true" data-dots="true" data-swipe="true" data-xs-swipe="true" data-sm-swipe="false" data-items="1" data-sm-items="3" data-md-items="3" data-lg-items="3" data-center-mode="true" data-lightgallery="group-slick">
      @foreach ($projects as $key => $project)
        @if ($project->is_corausel)
          <div class="item">
            <div class="slick-slide-inner">
              <div class="slick-slide-caption">
                <a class="thumb-ann thumb-mixed_large" href="{{ $project->project_file_url }}" data-lightgallery="item">
                  <img class="thumb-ann__image" src="{{ $project->project_file_url }}" alt="" width="961" height="664"/>
                  <div class="thumb-ann__caption">
                    <p class="thumb-ann__title heading-3">{{$project->title}}</p>
                    <p class="thumb-ann__text">{{$project->content}}</p>
                  </div></a>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</section>

<section class="section section-md bg-white text-center">
  <div class="shell-fluid">
    <p class="heading-1">Project</p>
    <div class="isotope thumb-ruby-wrap wow fadeIn" data-isotope-layout="masonry" data-isotope-group="gallery" data-lightgallery="group">
      <div class="row">
        @forelse ($projects->take(8) as $project)
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item">
            <a class="thumb-ruby thumb-mixed_height-2 thumb-mixed_md" href="{{$project->project_file_url}}" data-lightgallery="item">
              <img class="thumb-ruby__image" src="{{$project->project_file_url}}" alt="" width="440" height="327"/>
              <div class="thumb-ruby__caption">
                <p class="thumb-ruby__title heading-3">{{$project->title}}</p>
                <p class="thumb-ruby__text">{{$project->content}}</p>
              </div></a>
          </div>
        @empty
          <h3>Maaf untuk saat ini belum ada file yang diupload.</h3>
        @endforelse
      </div>
    </div>
  </div>
</section>

<!-- Awards-->
{{-- <section class="section parallax-container bg-image-dark" data-parallax-img="images/bg-image-7-1920x1244.jpg">
  <div class="parallax-content">
    <div class="section-md text-center">
      <div class="shell">
        <div class="range range-50 range-lg-bottom">
          <div class="cell-xs-6 cell-md-3 wow fadeIn">
            <!-- Box award-->
            <article class="box-award"><img class="box-award__image" src="images/award-1-134x98-inverse.png" alt="" width="134" height="98"/>
              <h3 class="box-award__title">Best photo of the year</h3>
              <div class="box-award__divider"></div>
              <time class="box-award__time" datetime="2010">2010</time>
            </article>
          </div>
          <div class="cell-xs-6 cell-md-3 wow fadeIn" data-wow-delay=".1s">
            <!-- Box award-->
            <article class="box-award"><img class="box-award__image" src="images/award-2-115x117-inverse.png" alt="" width="115" height="117"/>
              <h3 class="box-award__title">Best couple photo</h3>
              <div class="box-award__divider"></div>
              <time class="box-award__time" datetime="2014">2014</time>
            </article>
          </div>
          <div class="cell-xs-6 cell-md-3 wow fadeIn" data-wow-delay=".2s">
            <!-- Box award-->
            <article class="box-award"><img class="box-award__image" src="images/award-3-116x103-inverse.png" alt="" width="116" height="103"/>
              <h3 class="box-award__title">Best love story photo</h3>
              <div class="box-award__divider"></div>
              <time class="box-award__time" datetime="2015">2015</time>
            </article>
          </div>
          <div class="cell-xs-6 cell-md-3 wow fadeIn" data-wow-delay=".3s">
            <!-- Box award-->
            <article class="box-award"><img class="box-award__image" src="images/award-4-131x96-inverse.png" alt="" width="131" height="96"/>
              <h3 class="box-award__title">Best photo shoot</h3>
              <div class="box-award__divider"></div>
              <time class="box-award__time" datetime="2016">2016</time>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}


<!-- Blog-->
<section class="section section-md bg-gray-lighter text-center">
  <div class="shell">
    <p class="heading-1">Blog</p>
    <div class="range range-30">
      <div class="cell-sm-6 cell-md-4 wow fadeInLeftSmall">
        <!-- Post boxed-->
        <article class="post-boxed">
          <ul class="post-boxed__meta">
            <li>
              <time datetime="2019">Jul 20, 2019</time>
            </li>
            <li><a href="#">3 comments</a></li>
          </ul>
          <div class="post-boxed__main">
            <h3 class="post-boxed__title"><a href="#">Becoming a King and Queen for a Day</a></h3>
            <p>For one day, the two of you are the focus of attention. The concerns of the world slip...</p>
          </div>
          <div class="post-boxed__aside">
            <div class="unit unit-horizontal unit-middle unit-spacing-xs">
              <div class="unit__left"><img class="post-boxed__avatar" src="images/user-6-46x46.jpg" alt="" width="46" height="46"/>
              </div>
              <div class="unit__body">
                <h6 class="text-uppercase">by Susan Parker</h6>
              </div>
            </div>
          </div>
        </article>
      </div>
      <div class="cell-sm-6 cell-md-4 wow fadeInLeftSmall" data-wow-delay=".15s">
        <!-- Post boxed-->
        <article class="post-boxed">
          <ul class="post-boxed__meta">
            <li>
              <time datetime="2019">Jul 15, 2019</time>
            </li>
            <li><a href="#">3 comments</a></li>
          </ul>
          <div class="post-boxed__main">
            <h3 class="post-boxed__title"><a href="#">How to Make Great Wedding Photos</a></h3>
            <p>Today I’m going to answer the question that my clients ask almost after every photo shoot. It’s a question...</p>
          </div>
          <div class="post-boxed__aside">
            <div class="unit unit-horizontal unit-middle unit-spacing-xs">
              <div class="unit__left"><img class="post-boxed__avatar" src="images/user-6-46x46.jpg" alt="" width="46" height="46"/>
              </div>
              <div class="unit__body">
                <h6 class="text-uppercase">by Susan Parker</h6>
              </div>
            </div>
          </div>
        </article>
      </div>
      <div class="cell-sm-6 cell-md-4 wow fadeInLeftSmall" data-wow-delay=".3s">
        <!-- Post boxed-->
        <article class="post-boxed">
          <ul class="post-boxed__meta">
            <li>
              <time datetime="2019">Jul 5, 2019</time>
            </li>
            <li><a href="#">3 comments</a></li>
          </ul>
          <div class="post-boxed__main">
            <h3 class="post-boxed__title"><a href="#">5 Most Exotic Weddings</a></h3>
            <p>Do you want to know where your wedding will be the most unforgettable? Read this post and you’ll find...</p>
          </div>
          <div class="post-boxed__aside">
            <div class="unit unit-horizontal unit-middle unit-spacing-xs">
              <div class="unit__left"><img class="post-boxed__avatar" src="images/user-6-46x46.jpg" alt="" width="46" height="46"/>
              </div>
              <div class="unit__body">
                <h6 class="text-uppercase">by Susan Parker</h6>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- Book Your Photo Shoot-->
<section class="section section-md bg-white">
  <div class="shell">
    <div class="range range-50 range-sm-center range-md-left range-md-reverse range-md-middle">
      <div class="cell-sm-10 cell-md-6 wow fadeInRight">
        <div class="box-width-4 box-centered">
          <p class="heading-1">Book Your <br> Photo Shoot</p>
          <p>I will appreciate as many details about your particular wedding venue, dates, theme and other aspects, as you’d be willing to share. I will be giving you my feedback immediately!</p>
        </div>
      </div>
      <div class="cell-sm-10 cell-md-6 wow fadeInLeft">
        <article class="">
          <div class="" style="padding: 100px">
            <!-- RD Mailform-->
            <form action="{{ route('application.appointment') }}" class="request-event" data-form-output="form-output-global" method="post">
              @csrf
              <div class="form-wrap">
                <input class="form-input" id="contact-date" type="text" data-time-picker="date" name="appointment_at" data-constraints="@Required">
                <label class="form-label" for="contact-date">Event Date</label>
              </div>
              <div class="form-wrap">
                <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="contact-name">Your Name</label>
              </div>
              <div class="form-wrap">
                <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                <label class="form-label" for="contact-email">E-mail</label>
              </div>
              <div class="form-wrap">
                <label class="form-label" for="contact-message">Your Message</label>
                <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
              </div>
              <div class="form-wrap form-button offset-1">
                <button class="button button-block button-primary-outline button-ujarak" type="submit">make an appointment</button>
              </div>
            </form>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection