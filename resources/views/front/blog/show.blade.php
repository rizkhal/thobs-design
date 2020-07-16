<x-front-layout :title="$post->title">
    @section('content')
     <!-- Single post-->
      <section class="section section-variant-1 bg-white text-center" style="padding-top:2.5em!important;">
        <div class="shell">
          <div class="range range-30 range-md-center">
            <div class="cell-md-10 cell-lg-8">
              <!-- Single post-->
              <article class="post-single">
                <p class="heading-1 post-single__title">{{ucfirst($post->title)}}</p>
                <ul class="post-single__meta">
                  <li> <span>by</span><span class="post-single__author">{{$post->author->name}}</span></li>
                  <li>
                    <ul class="list-inline list-inline_iconed list-inline-sm">
                      <li><span class="icon mdi mdi-eye"></span><span class="text">{{$post->view}}</span></li>
                      <li> <span class="icon mdi mdi-comment"></span><span class="text">3</span></li>
                      <li> <span class="icon mdi mdi-calendar"></span><span class="text">{{date('F d, Y', strtotime($post->created_at))}}</span></li>
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
