<section class="breadcrumbs-custom bg-image" style="background-image: url(images/breadcrumbs-image.jpg);">
    <div class="shell">
        <h1 class="breadcrumbs-custom__title">
            {{$slot}}
        </h1>
        <ul class="breadcrumbs-custom__path">
            <li>
                <a href="{{ url('/') }}">
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    Pages
                </a>
            </li>
            <li class="active">
                {{$active}}
            </li>
        </ul>
    </div>
</section>
