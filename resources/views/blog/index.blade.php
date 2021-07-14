@extends('partials.app')

@section('page-contents')

<div class="blog-area blog-area--reguler bg-default-6">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-xl-7">
            <div class="section-title section-title--innerpage text-center pb-7">
              <h5 class="section-title__sub-heading text-electric-violet-2">Latest posts</h5>
              <h2 class="section-title__heading">Blog Reguler</h2>
            </div>
          </div>
        </div>

        @if($featuredPost)
          <!-- Featured blog post starts here -->
          <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-10">
              <div class="blogs-post blogs-post--big">
                <img class="w-100" src="{{\App\Models\SiteImage::findImage('blog_featured')}}" alt="">
                <div class="hover-content">
                  <div class="hover-content__top d-flex align-items-center dark-mode-texts">
                    <a href="{{route('blog.single', ['slug'=>$featuredPost->slug])}}" class="hover-content__badge badge bg-primary">{{$featuredPost->category->name}}</a>
                    <a href="{{route('blog.single', ['slug'=>$featuredPost->slug])}}" class="hover-content__date">{{date('j F, Y,', strtotime($featuredPost->published_at))}}</a>
                  </div>
                  <a href="{{route('blog.single', ['slug'=>$featuredPost->slug])}}" class="hover-content__title">{{$featuredPost->intro_text}}</a>
                  <ul class="hover-content__post-meta list-unstyled">
                    <li>
                      <a href="{{route('blog.single', ['slug'=>$featuredPost->slug])}}">
                        <i class="fa fa-user"></i>{{$featuredPost->author}}</a>
                      <a href="{{route('blog.single', ['slug'=>$featuredPost->slug])}}">
                        <i class="fa fa-heart"></i>21K</a>
                      <a href="{{route('blog.single', ['slug'=>$featuredPost->slug])}}">
                        <i class="fa fa-comments"></i>305</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- End Featured blog post -->
        @endif

        <div class="row justify-content-center">

          @foreach($posts as $post)
            <!-- Blog post outline starts -->
            <div class="col-xl-4 col-lg-9 col-md-7 col-xs-10">
              <div class="blogs-post blogs-post--small">
                <img class="w-100" src="{{$post->thumbnail_url}}" alt="">
                <div class="hover-content">
                  <div class="hover-content__top d-flex align-items-center dark-mode-texts">
                    <a href="{{route('blog.single', ['slug'=>$post->slug])}}" class="hover-content__badge badge bg-primary">{{$post->category->name}}</a>
                    <a href="{{route('blog.single', ['slug'=>$post->slug])}}" class="hover-content__date">{{$post->author}}</a>
                  </div>
                  <a href="{{route('blog.single', ['slug'=>$post->slug])}}" class="hover-content__title">{{$post->intro_text}}</a>
                  <ul class="hover-content__post-meta list-unstyled">
                    <li>
                      <a href="{{route('blog.single', ['slug'=>$post->slug])}}">
                        <i class="fa fa-user"></i>{{$post->author}}</a>
                      <a href="{{route('blog.single', ['slug'=>$post->slug])}}">
                        <i class="fa fa-heart"></i>21K</a>
                      <a href="{{route('blog.single', ['slug'=>$post->slug])}}">
                        <i class="fa fa-comments"></i>305</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Blog post outline ends here -->
          @endforeach
         
        </div>

        {{$posts->links('vendor.pagination.template')}}
       
      </div>
    </div>
@endsection

