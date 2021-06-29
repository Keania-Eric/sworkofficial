@extends('partials.app')

@section('page-contents')
    <!-- pricingTable Area -->
    <div class="table-section section-tl-shape bg-default-3">
      <div class="shape">
        <img class="w-100" src="./image/png/inner-banner-shape.png" alt="">
      </div>
      <div class="container">
        <div class="table-section--inner-2">
          <div class="table-section-top">
            <div class="row align-items-end justify-content-center justify-content-lg-end">
              <div class="col-xl-8 col-lg-7" data-aos="fade-right" data-aos-duration="500" data-aos-once="true">
                <div class="section-title section-title--l5 text-center text-lg-start">
                  <h6 class="section-title__sub-heading text-electric-violet-3 sub-heading--electric-violet-3">
                    Pricing table</h6>
                  <h2 class="section-title__heading mb-0">Live Chat 24/7 Support</h2>
                </div>
              </div>
              <div class="col-xl-4 col-lg-5">
                <!-- toggle-btn -->
                <div class="pricing-btn d-flex align-items-center justify-content-center justify-content-lg-end flex-wrap">
                  <label class="mb-3 mb-lg-0">Monthly</label>
                  <div class="toggle-btn form-check form-switch  mb-2 mb-lg-0">
                    <input class="form-check-input btn-toggle price-deck-trigger mb-2 mb-lg-0" type="checkbox" id="flexSwitchCheckDefault" data-pricing-trigger data-target="#table-price-value" checked>
                  </div>
                  <label class=" mb-3 mb-lg-0">Yearly</label>
                  <h3 class="badge bg-yellow mb-3 mb-lg-0">SAVE 20%</h3>
                </div>
                <!-- toggle-btn end -->
              </div>
            </div>
          </div>
          <div class="row justify-content-center" id="table-price-value" data-pricing-dynamic data-value-active="monthly">
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6 col-sm-9 col-xs-10" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
              <div class="card card--table-single text-center">
                <div class="table-top bg-electric-violet-2">
                  <h5 class="table-top__title">Development</h5>
                  <p class="table-top__text dynamic-value" data-active="Yearly package" data-monthly="Yearly package" data-yearly="Monthly package"></p>
                  <div class="card--price">
                    <span class="card--price__currency align-self-start">$</span>
                    <h1 class="card--price__price dynamic-value" data-active="25" data-monthly="25" data-yearly="30"></h1>
                    <span class="card--price__price-time">/ Month</span>
                  </div>
                </div>
                <ul class="card--table-single__list list-unstyled">
                  <li>Unlimited updates & projects</li>
                  <li>Custom permissions</li>
                  <li>Custom instructors</li>
                  <li>Custom designs & features</li>
                </ul>
                <a class="btn btn-electric-violet-2 shadow--electric-violet-2-3 btn--lg-2 text-white" href="#">Choose Plan</a>
              </div>
            </div>
            <!--/ .Single Table -->
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6 col-sm-9 col-xs-10" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
              <div class="card card--table-single text-center">
                <div class="table-top bg-primary">
                  <h5 class="table-top__title">Optimize & Seo</h5>
                  <p class="table-top__text dynamic-value" data-active="Yearly package" data-monthly="Yearly package" data-yearly="Monthly package"></p>
                  <div class="card--price">
                    <span class="card--price__currency align-self-start">$</span>
                    <h1 class="card--price__price dynamic-value" data-active="55" data-monthly="55" data-yearly="60"></h1>
                    <span class="card--price__price-time">/ Month</span>
                  </div>
                </div>
                <ul class="card--table-single__list list-unstyled">
                  <li>Unlimited updates & projects</li>
                  <li>Custom permissions</li>
                  <li>Custom instructors</li>
                  <li>Custom designs & features</li>
                </ul>
                <a class="btn btn-primary shadow--primary-4 btn--lg-2 text-white" href="#">Choose Plan</a>
              </div>
            </div>
            <!--/ .Single Table -->
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6 col-sm-9 col-xs-10" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
              <div class="card card--table-single text-center">
                <div class="table-top bg-electric-violet-2">
                  <h5 class="table-top__title">Designing</h5>
                  <p class="table-top__text dynamic-value" data-active="Yearly package" data-monthly="Yearly package" data-yearly="Monthly package"></p>
                  <div class="card--price">
                    <span class="card--price__currency align-self-start">$</span>
                    <h1 class="card--price__price dynamic-value" data-active="70" data-monthly="70" data-yearly="80"></h1>
                    <span class="card--price__price-time">/ Month</span>
                  </div>
                </div>
                <ul class="card--table-single__list list-unstyled">
                  <li>Unlimited updates & projects</li>
                  <li>Custom permissions</li>
                  <li>Custom instructors</li>
                  <li>Custom designs & features</li>
                </ul>
                <a class="btn btn-electric-violet-2 shadow--electric-violet-2-3 btn--lg-2 text-white" href="#">Choose Plan</a>
              </div>
            </div>
            <!--/ .Single Table -->
          </div>
        </div>
      </div>
    </div>
@endsection