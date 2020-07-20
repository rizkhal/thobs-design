<x-front-layout title="Semua Postingan">
  @section('content')
    <section class="section section-md bg-white text-center" style="padding-top: 2.5em!important;">
      <div class="shell">
        <div class="range range-md-center">
          <div class="cell-md-11 cell-lg-10">
            <h2 class="text-bold">Kontak</h2>
            <p>
              <span class="box-width-2">
                {{$app['contact']->description}}
              </span>
            </p>
            <div class="layout-columns"> 
              <div class="layout-columns__main">
                <div class="layout-columns__main-inner">
                  <!-- RD Mailform-->
                  <form method="POST" action="">
                    @csrf
                    <div class="form-wrap">
                      <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-name">Nama Anda</label>
                    </div>
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                      <label class="form-label" for="contact-email">Alamat Email</label>
                    </div>
                    <div class="form-wrap">
                      <input class="form-input" id="subject-name" type="text" name="subject" data-constraints="@Required">
                      <label class="form-label" for="subject-name">Subjek Pesan</label>
                    </div>
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message">Pesan Anda</label>
                      <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                    </div>
                    <div class="form-wrap form-button offset-1">
                      <button class="button button-block button-primary-outline button-ujarak" type="submit">kirim pesan</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="layout-columns__aside">
                <div class="layout-columns__aside-item">
                  <p class="heading-5">Sosial Media</p>
                  <div class="divider-modern"></div>
                  <ul class="list-inline-xs">
                    @foreach ($socials as $key => $social)
                      <li><a target="_blank" class="icon icon-md icon-gray-7 fa fa-{{social_render($social->platform)}}" href="{{$social->link}}"></a></li>
                    @endforeach
                  </ul>
                </div>
                <div class="layout-columns__aside-item">
                  <p class="heading-5">Nomor Handphone</p>
                  <div class="divider-modern"></div>
                  <div class="unit unit-horizontal unit-spacing-xxs">
                    <div class="unit__left"><span class="icon icon-md icon-primary material-icons-local_phone"></span></div>
                    <div class="unit__body"><a href="callto:#">{{$app['contact']->phone}}</a></div>
                  </div>
                </div>
                <div class="layout-columns__aside-item">
                  <p class="heading-5">Alamat</p>
                  <div class="divider-modern"></div>
                  <div class="unit unit-horizontal unit-spacing-xxs">
                    <div class="unit__left"><span class="icon icon-md icon-primary material-icons-location_on"></span></div>
                    <div class="unit__body"><a href="#">{{$app['contact']->address}}</a></div>
                  </div>
                </div>
                <div class="layout-columns__aside-item">
                  <p class="heading-5">Jam Kerja</p>
                  <div class="divider-modern"></div>
                  <div class="unit unit-horizontal unit-spacing-xxs">
                    <div class="unit__left"><span class="icon icon-md icon-primary mdi mdi-clock"></span></div>
                    <div class="unit__body"><span>Kami bekerja setiap hari {{market_time($app['contact']->open)}} – {{market_time($app['contact']->close)}}</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @stop
</x-front-layout>
