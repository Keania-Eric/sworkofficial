@extends('partials.app')

@section('page-contents')
     <!-- Page Title Area -->
     <div class="page-title-content text-center bg-default-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7">
            <h2 class="page-title-content__heading">{!! \App\Models\SiteContent::findItem('marketting_project_management')->title !!}</h2>
            <p class="page-title-content__text">{!! \App\Models\SiteContent::findItem('marketting_project_management')->content !!} </p>
          </div>
        </div>
      </div>
      <div class="shape">
        <img class="w-100" src="{{asset('image/png/inner-banner-shape.png')}}" alt="">
      </div>
    </div>
    <!--/ .Page Title Area -->

     <!-- Video Area -->
     <div class="video-section video-section--career bg-default-6">
      <div class="container">
        <!-- about-us Content -->
        <div class="row align-items-center justify-content-center">
          <div class="col-12">
            {!! \App\Models\Page::findItem('marketting_project_management')->content !!}
          </div>
        </div>
        <!--/ .about-us Content -->
      </div>
    </div>
@endsection