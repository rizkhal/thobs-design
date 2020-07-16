<x-front-layout :title="$post->title">
    @section('content')
    <!-- Breadcumbs -->
    <x-front.breadcumbs active="Blog Post">
      Halaman Blog
    </x-front-breadcumbs>
    
     <!-- Single post-->
      <section class="section section-variant-1 bg-white text-center">
        <div class="shell">
          <div class="range range-30 range-md-center">
            <div class="cell-md-10 cell-lg-8">
              <!-- Single post-->
              <article class="post-single">
                <time class="post-single__time" datetime="2017">May 9, 2017</time>
                <div class="post-single__header">
                  <p class="heading-1 post-single__title">{{ucfirst($post->title)}}</p>
                </div>
                <ul class="post-single__meta">
                  <li> <span>by</span><span class="post-single__author">Admin</span></li>
                  <li>
                    <ul class="list-inline list-inline_iconed list-inline-sm">
                      <li><span class="icon mdi mdi-eye"></span><span class="text">343</span></li>
                      <li> <span class="icon mdi mdi-comment"></span><span class="text">3</span></li>
                    </ul>
                  </li>
                </ul>
                <div class="post-single__main">
                  <img src="{{$post->blog_file_url}}" alt="">
                  <div class="post-single__inset">
                    {!! $post->content !!}
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
    @stop
</x-front-layout>
