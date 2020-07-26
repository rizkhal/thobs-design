<x-front-layout title="Halaman Home">
  @section('content')
  <!-- projects -->
  <section class="section bg-white text-center">
    <div class="shell-fluid">
      <p class="heading-1" style="padding-top:1em!important;">Projects</p>
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
      @if ($posts->count() > 0)
      <div class="range range-30">
        @foreach ($posts as $post)
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
                  <div class="unit__left">
                    <img class="post-boxed__avatar" src="{{$post->author->profile_picture_url}}" alt="" width="46" height="46"/>
                  </div>
                  <div class="unit__body">
                    <h6 class="text-uppercase">by {{$post->author->name}}</h6>
                  </div>
                </div>
              </div>
            </article>
          </div>
        @endforeach
      </div>
      @else
        <x-front.empty-message>postingan</x-front.empty-message>
      @endif
    </div>
  </section>
  @stop
</x-front-layout>
