<x-front-layout title="Halaman Home">
  @section('content')
  <!-- projects -->
  <section class="section bg-white text-center">
    <div class="shell-fluid">
      <p class="heading-1">Projects</p>
      <div class="isotope thumb-ruby-wrap wow fadeIn" data-isotope-layout="masonry" data-isotope-group="gallery" data-lightgallery="group">
        <div class="row">
          @forelse ($projects as $project)
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item">
            <a class="thumb-ruby thumb-mixed_height-2 thumb-mixed_md" href="{{$project->project_file_url}}" data-lightgallery="item">
              <img class="thumb-ruby__image" src="{{$project->project_file_url}}" alt="" width="440" height="327"/>
              <div class="thumb-ruby__caption">
                <p class="thumb-ruby__title heading-3">{{$project->title}}</p>
                <p class="thumb-ruby__text">{{$project->description}}</p>
              </div>
            </a>
          </div>
          @empty
            <x-front.empty-message>project</x-front.empty-message>
          @endforelse
        </div>
      </div>
    </div>
  </section>

  <!-- Blog-->
  <section class="section section-md bg-gray-lighter text-center">
    <div class="shell">
      <p class="heading-1">Blog</p>
      <div class="range range-30">
        @forelse($posts as $key => $post)
          <div class="cell-sm-6 cell-md-4 wow fadeInLeftSmall" data-wow-delay=".15s">
            <!-- Post boxed-->
            <article class="post-boxed">
              <ul class="post-boxed__meta">
                <li>
                  <time datetime="{{date('Y')}}">{{$post->created_at->diffForHumans()}}</time>
                </li>
                <li><a href="#">3 comments</a></li>
              </ul>
              <div class="post-boxed__main">
                <h3 class="post-boxed__title"><a href="{{ route('application.blog.show', $post->slug) }}">{{ucfirst($post->title)}}</a></h3>
                {{\Str::words(strip_tags($post->content), 10)}}
              </div>
              <div class="post-boxed__aside">
                <div class="unit unit-horizontal unit-middle unit-spacing-xs">
                  <div class="unit__left"><img class="post-boxed__avatar" src="images/user-6-46x46.jpg" alt="" width="46" height="46"/>
                  </div>
                  <div class="unit__body">
                    <h6 class="text-uppercase">by {{$post->author->name}}</h6>
                  </div>
                </div>
              </div>
            </article>
          </div>
        @empty
        <h3>Maaf untuk saat ini belum ada postingan untuk ditampilkan.</h3>
        @endforelse
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
              <form action="" class="request-event" data-form-output="form-output-global" method="post">
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
  @stop
</x-front-layout>
