@extends('front.layouts.app', [
		'title' => 'My Galery'
	])

@section('content')
	<!-- Breadcrumbs-->
      <section class="breadcrumbs-custom bg-image" style="background-image: url(images/breadcrumbs-image.jpg);">
        <div class="shell">
          <h1 class="breadcrumbs-custom__title">Grid Gallery</h1>
          <ul class="breadcrumbs-custom__path">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Albums</a></li>
            <li class="active">Grid Gallery</li>
          </ul>
        </div>
      </section>

    <!-- Gallery-->
      <section class="section section-md bg-white oh text-center">
        <div class="shell">
          <div class="navigation-custom">
            <button class="button navigation-custom__toggle" data-custom-toggle=".navigation-custom__content" data-custom-toggle-hide-on-blur="true">Filter</button>
            <div class="navigation-custom__content">
              <div class="isotope-filters isotope-filters_modern">
                <ul class="inline-list">
            		<li><a class="active" data-isotope-filter="*" data-isotope-group="gallery" href="#">All</a></li>
		        	@foreach ($categories as $category)
			          	<li><a data-isotope-filter="{{$category->name}}" data-isotope-group="gallery" href="#">{{$category->name}} </a></li>
		        	@endforeach
                </ul>
              </div>
            </div>
          </div>
          <!-- Isotope-->
          <div class="isotope" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group">
            <div class="row">
              @forelse($projects as $project)
              	<div class="col-xs-12 col-sm-6 col-md-4 isotope-item" data-filter="{{$project->categories->pluck('name')->first()}}">
              		<a class="thumb-ruby" href="{{$project->project_file_url}}" data-lightgallery="item">
	              		<img class="thumb-ruby__image" src="{{$project->project_file_url}}" alt="" width="371" height="276"/>
	                	<div class="thumb-ruby__caption">
		                    <p class="thumb-ruby__title heading-3">{{$project->title}}</p>
	                	    <p class="thumb-ruby__text">{{$project->content}}</p>
	                 	</div>
                 	</a>
              	</div>
              @empty
				<h3>Sorry, galery is empty</h3>
              @endforelse
            </div>
          </div>
        </div>
      </section>
@endsection