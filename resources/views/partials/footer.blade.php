<div class="footer-area footer-section--2 position-relative bg-default">
      <div class="container">
        <footer class="footer-top">
          <div class="row">
            <div class="col-lg-4 col-md-8 col-xs-10">
              <div class="footer-widgets footer-widgets--l2">
                <!-- Brand Logo-->
                <div class="brand-logo mt-1">
                  <a href="#">
                    <!-- light version logo (logo must be black)-->
                    <img src="{{asset('image/png/logo-dark.png')}}" alt="" class="light-version-logo">
                    <!-- Dark version logo (logo must be White)-->
                    <img src="{{asset('image/png/logo-white.png')}}" alt="" class="dark-version-logo">
                  </a>
                </div>
                <p class="footer-widgets__text">{{\App\Models\SiteMeta::findItem('footer_note')->value}}</p>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-md-4 col-xs-6">
                  <div class="footer-widgets footer-widgets--l2 mb-10 mb-md-0">
                    <h4 class="footer-widgets__title">Company</h4>
                    <ul class="footer-widgets__list">
                      <li>
                        <a href="{{route('product.tour')}}">About
                          us</a>
                      </li>
                      <li>
                        <a href="{{route('privacy')}}">Privacy
                          Policy</a>
                      </li>
                      <li>
                        <a href="{{route('terms')}}">Terms &
                          Conditions</a>
                      </li>
                     
                      <li>
                        <a href="{{route('contact')}}">Contact</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4 col-xs-6">
                  <div class="footer-widgets footer-widgets--l2">
                    <h4 class="footer-widgets__title">Contact Details</h4>
                    <ul class="footer-widgets__list footer-widgets--address">
                      <li> <i class="fa fa-map-marker-alt text-radical-red"></i>
                        {{\App\Models\SiteMeta::findItem('our_location')->value}}
                      </li>
                      <li> <i class="fa fa-phone-alt text-radical-red"></i>
                        {{\App\Models\SiteMeta::findItem('phone')->value}}
                      </li>
                      <li> <i class="fa fa-envelope text-radical-red"></i>
                        <a class="heading-default-color gr-text-hover-underline text-break" href="mailto:{{\App\Models\SiteMeta::findItem('email')->value}}">{{\App\Models\SiteMeta::findItem('email')->value}}</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-4 col-xs-7">
                  <div class="footer-widgets footer-widgets--l2">
                    <h4 class="footer-widgets__title">Follow us on social
                      media</h4>
                    <div class="footer-social-share dot-right footer-social-share--2">
                      <ul class="list-unstyled d-flex align-items-center">
                        <li>
                          <a href="{{\App\Models\SiteMeta::findItem('facebook_link')->value}}">Facebook</a>
                        </li>
                        <li>
                          <a href="{{\App\Models\SiteMeta::findItem('twitter_handle')->value}}">Twitter</a>
                        </li>
                        <li>
                          <a href="{{\App\Models\SiteMeta::findItem('instagram_handle')->value}}">Instagram</a>
                        </li>
                      </ul>
                    </div>
                    <div class="payment-gatway border-top border-default-color">
                      <!-- <img class="w-100" src="{{asset('image/home-2/payment-gatway.png')}}" alt=""> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--/ .Footer Area -->