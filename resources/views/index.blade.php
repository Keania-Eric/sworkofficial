@extends('partials.app')

@section('page-contents')
 <!-- Hero Area -->
 <div class="welcome-area welcome-area--l2 bg-default">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-11">
            <div class="welcome-content welcome-content--l2 text-center position-relative">
              <h1 class="welcome-content--l2__heading" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">{!! \App\Models\SiteContent::findItem('home_hero_content')->title !!}</h1>
              <p class="welcome-content--l2__descriptions" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true"> 
                {!! \App\Models\SiteContent::findItem('home_hero_content')->content !!}
              </p>
              <div class="welcome-content--l2-shape" data-aos="fade-right" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                <img class="w-100" src="{{asset('image/home-2/l2-hero-shape.png')}}" alt="">
              </div>
            </div>
            <!-- Newsletter -->
            <div class="welcome-content--l2__newsletter" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
              <div class="newsletter-form mx-auto newsletter-form--l2">
                <form action="/.">
                  <div class="d-flex align-items-center justify-content-center flex-column flex-xs-row">
                    <input class="form-control  rounded-55" type="email" placeholder="@ Enter your email" required>
                    <button class=" btn btn-primary text-white btn--medium rounded-55" type="submit">Start Now!</button>
                  </div>
                </form>
              </div>
            </div>
            <!--/ .Newsletter -->
          </div>
          <div class="col-lg-5 col-md-7" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
            <div class="welcome-image welcome-image--l2">
              <img class="w-100" src="{{\App\Models\SiteImage::findImage('hero_1_image')}}" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="welcome-area--l2-shape-1" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
        <img class="w-100" src="{{asset('image/home-2/l2-hero-shape-2.png')}}" alt="">
      </div>
      <div class="welcome-area--l2-shape-2" data-aos="fade-right" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
        <img class="w-100" src="{{asset('image/home-2/l2-hero-shape-1.png')}}" alt="">
      </div>
    </div>
    <!--/ .Hero Area -->
    <!-- Features Area -->
    <div class="feature-area feature-area--l2 bg-purple-heart dark-mode-texts">
      <div class="container">
        <div class="feature--l2-tab">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
              <div class="feature-area--l2__tab" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
                <ul class="nav nav-tabs nav-tab--feature-2" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{\App\Models\NavItem::findItem('home_2_nav_1')->name}}</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{\App\Models\NavItem::findItem('home_2_nav_2')->name}}</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{\App\Models\NavItem::findItem('home_2_nav_3')->name}}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-content tab-content--feature-l2" id="myTabContent" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-5 col-xs-10">
                  <div class="feature-area--l2__image-group">
                    <img class="w-100" src="{{\App\Models\SiteImage::findImage('home_2_project_management')}}" alt="">
                    <div class="feature-area--l2__image-group__img-1">
                      <img src="{{asset('image/home-2/l2-feature-shape.png')}}" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7 col-xs-10">
                  <div class="feature-area--l2__content">
                    <h2 class="feature-area--l2__content__heading content-widget-l2__heading">Best features<br class="d-none d-xs-block">
                                    for your project<br class="d-none d-xs-block"> management.</h2>
                    <!-- Feature widgets -->
                    <div class="feature-area--l2-widgets">
                      <!-- Single Feature Widgets -->
                      <div class="widget widget--feature-2">
                        <div class="widget--feature-2__icon bg-coral">
                          <img src="{{asset('image/home-2/icon-grid.png')}}" alt="">
                        </div>
                        <div class="widget--feature-2__body">
                          <h4 class="widget--feature-2__title">{!! \App\Models\SiteContent::findItem('home_2_tab_1_1')->title !!}</h4>
                          <p class="widget--feature-2__content">{!! \App\Models\SiteContent::findItem('home_2_tab_1_1')->content !!}</p>
                        </div>
                      </div>
                      <!--/ .Single Feature Widgets -->
                      <!-- Single Feature Widgets -->
                      <div class="widget widget--feature-2">
                        <div class="widget--feature-2__icon bg-java">
                          <img src="{{asset('image/home-2/icon-message.png')}}" alt="">
                        </div>
                        <div class="widget--feature-2__body">
                          <h4 class="widget--feature-2__title">{!! \App\Models\SiteContent::findItem('home_2_tab_1_2')->title !!}</h4>
                          <p class="widget--feature-2__content">{!! \App\Models\SiteContent::findItem('home_2_tab_1_2')->content !!}</p>
                        </div>
                      </div>
                      <!--/ .Single Feature Widgets -->
                    </div>
                    <!--/ .Feature widgets -->
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-5 col-xs-10">
                  <div class="feature-area--l2__image-group">
                    <img class="w-100" src="{{\App\Models\SiteImage::findImage('home_2_task_management')}}" alt="">
                    <div class="feature-area--l2__image-group__img-1">
                      <img src="{{asset('image/home-2/l2-feature-shape.png')}}" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7 col-xs-10">
                  <div class="feature-area--l2__content">
                    <h2 class="feature-area--l2__content__heading content-widget-l2__heading">Best features<br class="d-none d-xs-block">
                                    for your project<br class="d-none d-xs-block"> management.</h2>
                    <!-- Feature widgets -->
                    <div class="feature-area--l2-widgets">
                      <!-- Single Feature Widgets -->
                      <div class="widget widget--feature-2">
                        <div class="widget--feature-2__icon bg-coral">
                          <img src="{{asset('image/home-2/icon-grid.png')}}" alt="">
                        </div>
                        <div class="widget--feature-2__body">
                          <h4 class="widget--feature-2__title">{!! \App\Models\SiteContent::findItem('home_2_tab_2_1')->title !!}</h4>
                          <p class="widget--feature-2__content">{!! \App\Models\SiteContent::findItem('home_2_tab_2_1')->content !!}</p>
                        </div>
                      </div>
                      <!--/ .Single Feature Widgets -->
                      <!-- Single Feature Widgets -->
                      <div class="widget widget--feature-2">
                        <div class="widget--feature-2__icon bg-java">
                          <img src="{{asset('image/home-2/icon-message.png')}}" alt="">
                        </div>
                        <div class="widget--feature-2__body">
                          <h4 class="widget--feature-2__title">{!! \App\Models\SiteContent::findItem('home_2_tab_2_2')->title !!}</h4>
                          <p class="widget--feature-2__content">{!! \App\Models\SiteContent::findItem('home_2_tab_2_2')->content !!}</p>
                        </div>
                      </div>
                      <!--/ .Single Feature Widgets -->
                    </div>
                    <!--/ .Feature widgets -->
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-5 col-xs-10">
                  <div class="feature-area--l2__image-group">
                    <img class="w-100" src="{{\App\Models\SiteImage::findImage('home_2_dark_mode')}}" alt="">
                    <div class="feature-area--l2__image-group__img-1">
                      <img src="{{asset('image/home-2/l2-feature-shape.png')}}" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7 col-xs-10">
                  <div class="feature-area--l2__content">
                    <h2 class="feature-area--l2__content__heading content-widget-l2__heading">Best features<br class="d-none d-xs-block">
                                    for your project<br class="d-none d-xs-block"> management.</h2>
                    <!-- Feature widgets -->
                    <div class="feature-area--l2-widgets">
                      <!-- Single Feature Widgets -->
                      <div class="widget widget--feature-2">
                        <div class="widget--feature-2__icon bg-coral">
                          <img src="{{asset('image/home-2/icon-grid.png')}}" alt="">
                        </div>
                        <div class="widget--feature-2__body">
                          <h4 class="widget--feature-2__title">{!! \App\Models\SiteContent::findItem('home_2_tab_3_1')->title !!}</h4>
                          <p class="widget--feature-2__content">{!! \App\Models\SiteContent::findItem('home_2_tab_3_1')->content !!}</p>
                        </div>
                      </div>
                      <!--/ .Single Feature Widgets -->
                      <!-- Single Feature Widgets -->
                      <div class="widget widget--feature-2">
                        <div class="widget--feature-2__icon bg-java">
                          <img src="{{asset('image/home-2/icon-message.png')}}" alt="">
                        </div>
                        <div class="widget--feature-2__body">
                          <h4 class="widget--feature-2__title">{!! \App\Models\SiteContent::findItem('home_2_tab_3_2')->title !!}</h4>
                          <p class="widget--feature-2__content">{!! \App\Models\SiteContent::findItem('home_2_tab_3_2')->content !!}</p>
                        </div>
                      </div>
                      <!--/ .Single Feature Widgets -->
                    </div>
                    <!--/ .Feature widgets -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ .Features Area -->
    <!-- Content One Area -->
    <div class="content-section content-section--l2-1 bg-default position-relative">
      <div class="content-section--l2-1__shape">
        <img class="w-100" src="{{asset('image/home-2/l2-content-1-shape.png')}}" alt="">
      </div>
      <div class="container">
        <div class="row align-items-center justify-content-center justify-content-lg-start">
          <div class="col-xl-5 col-lg-6 col-md-8 col-xs-10 order-2 order-lg-1">
            <div class="content-texts content-texts--l2-1 text-center text-lg-start">
              <h2 class="content-texts--l2-1__heading" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">{!! \App\Models\SiteContent::findItem('home_3')->title !!}</h2>
              <p class="content-texts--l2-1__content" data-aos="fade-right" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">{!! \App\Models\SiteContent::findItem('home_3')->content !!}</p>
              <div class="content-texts--l2-1__button">
                <a class="btn-link--2 with--line border--primary" href="" data-aos="fade-right" data-aos-delay="500" data-aos-duration="500" data-aos-once="true">Get Started Now</a>
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-lg-6 col-md-8 col-xs-10 order-1 order-lg-2">
            <div class="content-image-group content-image-group--l2-1">
              <img class="w-100" src="{{\App\Models\SiteImage::findImage('home_3_image')}}" alt="" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
              <div class="content-image-group--l2-1__img-1">
                <img class="w-100" src="{{asset('image/home-2/l2-content-shape-2.png')}}" alt="" data-aos="fade-left" data-aos-delay="300" data-aos-duration="500" data-aos-once="true">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ .Content One Area -->
    <!-- Content Two Area -->
    <div class="content-section content-section--l2-2 position-relative bg-default">
      <div class="container">
        <div class="content-section--l2-2__wrapper border-top border-default-color">
          <div class="row align-items-center justify-content-center justify-content-lg-start">
            <div class="col-xl-7 col-lg-6 col-md-8 col-xs-10">
              <div class="content-image-group--l2-2">
                <img class="w-100" src="{{\App\Models\SiteImage::findImage('home_4_image')}}" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">
                <div class="content-image-group--l2-2__img-1">
                  <img class="w-100" src="{{asset('image/home-2/l2-content-2-shape-2.png')}}" alt="" data-aos="fade-right" data-aos-duration="500" data-aos-once="true" data-aos-delay="300">
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-8 col-xs-10">
              <div class="content-texts content-texts--l2-1 text-center text-lg-start">
                <h2 class="content-texts--l2-1__heading" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">{!! \App\Models\SiteContent::findItem('home_4')->title !!}</h2>
                <p class="content-texts--l2-1__content" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">{!! \App\Models\SiteContent::findItem('home_4')->content !!}</p>
                <div class="content-texts--l2-1__button" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                  <a class="btn-link--2 with--line border--primary" href="">Get Started Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-section--l2-2__shape-img">
        <img class="w-100" src="{{asset('image/home-2/l2-content-2-shape.png')}}" alt="">
      </div>
    </div>
    <!--/ .Content Two Area -->
    <!-- Brand Logo Area -->
    <div class="brand-area brand-area--l2 bg-default-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="section-title--2 text-center">
              <h2 class="section-title--2__heading" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">{!! \App\Models\SiteContent::findItem('home_5')->title !!}</h2>
              <p class="section-title--2__description" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">{!! \App\Models\SiteContent::findItem('home_5')->content !!}</p>
              <div class="section-title--2__button">
                <a class="btn-link--2 with--line border--primary" href="" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400" data-aos-once="true">Explore All
                  Apps</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-9" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
            <div class="brand-image-group brand-image-group--l2">
              <div class="brand-image-group--l2__image--main circle-126">
                <div class="img-0">
                  <img class="w-100" src="{{asset('image/home-2/brand-logo-1.png')}}" alt="">
                </div>
              </div>
              <!-- Image -->
              <div class="brand-image-group--l2__single brand-image-group--l2__img-1 circle-91">
                <div class="brand-logo-1">
                  <img class="w-100" src="{{asset('image/home-2/brand-logo-2.png')}}" alt="">
                </div>
              </div>
              <div class="brand-image-group--l2__single brand-image-group--l2__img-2 circle-103">
                <div class="brand-logo-2">
                  <img class="w-100" src="{{asset('image/home-2/brand-logo-3.png')}}" alt="">
                </div>
              </div>
              <div class="brand-image-group--l2__single brand-image-group--l2__img-3 circle-98">
                <div class="brand-logo-3">
                  <img class="w-100" src="{{asset('image/home-2/brand-logo-4.png')}}" alt="">
                </div>
              </div>
              <div class="brand-image-group--l2__single brand-image-group--l2__img-4 circle-99">
                <div class="brand-logo-4">
                  <img class="w-100" src="{{asset('image/home-2/brand-logo-5.png')}}" alt="">
                </div>
              </div>
              <div class="brand-image-group--l2__single brand-image-group--l2__img-5 circle-95">
                <div class="brand-logo-5">
                  <img class="w-100" src="./image/home-2/brand-logo-6.png" alt="">
                </div>
              </div>
              <div class="brand-image-group--l2__single brand-image-group--l2__img-6 circle-113">
                <div class="brand-logo-6">
                  <img class="w-100" src="./image/home-2/brand-logo-7.png" alt="">
                </div>
              </div>
              <div class="brand-image-group--l2__single brand-image-group--l2__img-7 circle-88">
                <div class="brand-logo-7">
                  <img class="w-100" src="./image/home-2/brand-logo-8.png" alt="">
                </div>
              </div>
              <div class="brand-image-group--l2__single brand-image-group--l2__img-8 circle-108">
                <div class="brand-logo-8">
                  <img class="w-100" src="./image/home-2/brand-logo-9.png" alt="">
                </div>
              </div>
              <!-- Image Line -->
              <div class="brand-image-group--l2__line-1">
                <img class="w-100" src="./image/home-2/brand-line-1.png" alt="">
              </div>
              <div class="brand-image-group--l2__line-2">
                <img class="w-100" src="./image/home-2/brand-line-2.png" alt="">
              </div>
              <div class="brand-image-group--l2__line-3">
                <img class="w-100" src="./image/home-2/brand-line-3.png" alt="">
              </div>
              <div class="brand-image-group--l2__line-4">
                <img class="w-100" src="./image/home-2/brand-line-4.png" alt="">
              </div>
              <div class="brand-image-group--l2__line-5">
                <img class="w-100" src="./image/home-2/brand-line-5.png" alt="">
              </div>
              <div class="brand-image-group--l2__line-6">
                <img class="w-100" src="./image/home-2/brand-line-6.png" alt="">
              </div>
              <div class="brand-image-group--l2__line-7">
                <img class="w-100" src="./image/home-2/brand-line-7.png" alt="">
              </div>
              <div class="brand-image-group--l2__line-8">
                <img class="w-100" src="./image/home-2/brand-line-8.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ .Brand Logo Two Area -->
    <!-- Cta Area -->
    <div class="cta-section cta-section--l2 bg-default">
      <div class="container">
        <div class="cta-section--l2__content bg-electric-violet dark-mode-texts">
          <div class="row align-items-center">
            <div class="col-lg-7">
              <h3 class="cta-section--l2__content__heading" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">Get started by<br class="d-none d-xs-block">  downloading apps.</h3>
            </div>
            <div class="col-lg-5">
              <div class="cta-section--l2__button text-center text-lg-end">
                <a class="btn btn--190 btn-white rounded-55" href="" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">Download App</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ .Cta Area -->
    <!-- Footer Area -->
@endsection

