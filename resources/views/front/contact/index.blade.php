<x-front-layout title="Semua Postingan">
  @section('content')
    <section class="section section-md bg-white text-center" style="padding-top: 2.5em!important;">
      <div class="shell">
        <div class="range range-md-center">
          <div class="cell-md-11 cell-lg-10">
            <h2 class="text-bold">Kontak Saya</h2>
            <p><span class="box-width-2">We are available 24/7 by fax, e-mail or by phone. You can also use our quick contact form to ask a question about our services and projects.</span></p>
            <div class="layout-columns"> 
              <div class="layout-columns__main">
                <div class="layout-columns__main-inner">
                  <!-- RD Mailform-->
                  <form method="POST" action="">
                    @csrf
                    <div class="form-wrap">
                      <input class="form-input" id="subject-name" type="text" name="subject" data-constraints="@Required">
                      <label class="form-label" for="subject-name">Subject</label>
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
                      <button class="button button-block button-primary-outline button-ujarak" type="submit">SEND MESSAGE</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="layout-columns__aside">
                <div class="layout-columns__aside-item">
                  <p class="heading-5">Socials</p>
                  <div class="divider-modern"></div>
                  <ul class="list-inline-xs">
                    @foreach ($socials as $key => $social)
                      <li><a target="_blank" class="icon icon-md icon-gray-7 fa fa-{{social_render($social->platform)}}" href="{{$social->link}}"></a></li>
                    @endforeach
                  </ul>
                </div>
                <div class="layout-columns__aside-item">
                  <p class="heading-5">Phone</p>
                  <div class="divider-modern"></div>
                  <div class="unit unit-horizontal unit-spacing-xxs">
                    <div class="unit__left"><span class="icon icon-md icon-primary material-icons-local_phone"></span></div>
                    <div class="unit__body"><a href="callto:#">1-800-1234-567</a></div>
                  </div>
                </div>
                <div class="layout-columns__aside-item">
                  <p class="heading-5">Address</p>
                  <div class="divider-modern"></div>
                  <div class="unit unit-horizontal unit-spacing-xxs">
                    <div class="unit__left"><span class="icon icon-md icon-primary material-icons-location_on"></span></div>
                    <div class="unit__body"><a href="#">267 Park Avenue New York, NY 90210</a></div>
                  </div>
                </div>
                <div class="layout-columns__aside-item">
                  <p class="heading-5">opening hours</p>
                  <div class="divider-modern"></div>
                  <div class="unit unit-horizontal unit-spacing-xxs">
                    <div class="unit__left"><span class="icon icon-md icon-primary mdi mdi-clock"></span></div>
                    <div class="unit__body"><span>We work every day 9:00–23:00</span></div>
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
