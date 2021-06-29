 <!-- Header Area -->
 <header class="site-header site-header--menu-left dynamic-sticky-bg mt-2 mt-lg-0 menu-block-4 mb-7 mb-lg-0 site-header--absolute site-header--sticky">
      <div class="container">
        <nav class="navbar site-navbar">
          <!-- Brand Logo-->
          <div class="brand-logo">
            <a href="/home-marketing.html">
              <!-- light version logo (logo must be black)-->
              <img src="image/png/logo-dark.png" alt="" class="light-version-logo">
              <!-- Dark version logo (logo must be White)-->
              <img src="image/png/logo-white.png" alt="" class="dark-version-logo">
            </a>
          </div>
          <div class="menu-block-wrapper ">
            <div class="menu-overlay"></div>
            <nav class="menu-block" id="append-menu-header">
              <div class="mobile-menu-head">
                <div class="go-back">
                  <i class="fa fa-angle-left"></i>
                </div>
                <div class="current-menu-title"></div>
                <div class="mobile-menu-close">&times;</div>
              </div>
              <ul class="site-menu-main">
                <li class="nav-item">
                  <a href="{{route('home')}}" class="nav-link-item drop-trigger">Home
                  </a>
                  
                </li>
                <li class="nav-item">
                  <a href="{{route('blog.index')}}" class="nav-link-item drop-trigger">Blog 
                  </a>
                </li>
                
                <li class="nav-item nav-item-has-children">
                  <a href="#" class="nav-link-item drop-trigger">Product <i class="fas fa-angle-down"></i>
                  </a>
                  <ul class="sub-menu" id="submenu-10">
                    <li class="sub-menu--item">
                      <a href="{{route('product.tour')}}">Product Tour</a>
                    </li>
                    <li class="sub-menu--item">
                      <a href="{{route('product.pricing')}}">Pricing Page</a>
                    </li>
                    <li class="sub-menu--item">
                      <a href="{{route('product.status')}}">Swork Status </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item nav-item-has-children">
                  <a href="#" class="nav-link-item drop-trigger">Solutions <i class="fas fa-angle-down"></i>
                  </a>
                  <ul class="sub-menu" id="submenu-10">
                    <li class="sub-menu--item">
                      <a href="{{route('solutions.project-management')}}">Marketting Project Management</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item ">
                  <a href="{{route('contact')}}" class="nav-link-item drop-trigger">Contact 
                  </a>
                </li>
                <li class="nav-item ">
                  <a href="{{route('api-docs')}}" class="nav-link-item drop-trigger">API Docs 
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="header-btns  ms-auto ms-lg-0 d-none d-sm-flex align-items-center heading-default-color">
            <a class="btn-link heading-default-color-2 transition-4s me-3" href="#">
              Login
            </a>
            <a class="btn btn--xxl h-45 btn-primary text-white rounded-55" href="#">
              Get Started For Free
            </a>
          </div>
          <!-- mobile menu trigger -->
          <div class="mobile-menu-trigger">
            <span></span>
          </div>
          <!--/.Mobile Menu Hamburger Ends-->
        </nav>
      </div>
    </header>