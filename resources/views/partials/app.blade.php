<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    {{\Corcel\Model\Option::get('blogname')}}- {{\Corcel\Model\Option::get('blogdescription')}}
  </title>
  <link rel="shortcut icon" href="{{asset('image/png/favicon.png')}}" type="image/x-icon">
  <!-- Bootstrap , fonts & icons  -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('fonts/icon-font/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('fonts/typography-font/typo.css')}}">
  <link rel="stylesheet" href="{{asset('fonts/fontawesome-5/css/all.css')}}">
  <!-- Plugin'stylesheets  -->
  <link rel="stylesheet" href="{{asset('plugins/aos/aos.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/fancybox/jquery.fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/nice-select/nice-select.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/slick/slick.min.css')}}">
  <!-- Vendor stylesheets  -->
  <link rel="stylesheet" href="{{asset('plugins/theme-mode-switcher/switcher-panel.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <!-- Custom stylesheet -->
</head>

<body data-theme-mode-panel-active data-theme="light">
  <div class="site-wrapper overflow-hidden ">
    <div id="loading">
      <img src="image/preloader.gif" alt="">
    </div>
    <!-- Clean The Code And Hop in -->
    <!-- Header Area -->
    <!-- Preloader -->
    <!-- <div id="loading">
    <div class="preloader">
     <img src="image/preloader-3.gif" alt="preloader">
   </div>
   </div>   -->
    @include('partials.header')

    <!-- This place holds site contents -->
    @yield('page-contents')
    <!-- End site contents -->

    @include('partials.footer')
  </div>
  <!-- Plugin's Scripts -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('plugins/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('plugins/fancybox/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('plugins/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('plugins/aos/aos.min.js')}}"></script>
  <script src="{{asset('plugins/counter-up/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('plugins/counter-up/waypoints.min.js')}}"></script>
  <script src="{{asset('plugins/slick/slick.min.js')}}"></script>
  <script src="{{asset('plugins/skill-bar/skill.bars.jquery.js')}}"></script>
  <script src="{{asset('plugins/isotope/isotope.pkgd.min.js')}}"></script>
  <!--<script src="plugins/theme-mode-switcher/gr-theme-mode-switcher.js"></script>-->
  <!-- Activation Script -->
  <script src="{{asset('js/menu.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>