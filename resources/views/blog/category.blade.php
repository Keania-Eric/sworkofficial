@extends('partials.app')

@section('page-contents')

<div class="blog-area blog-area--reguler bg-default-6">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-xl-7">
            <div class="section-title section-title--innerpage text-center pb-7">
              <h5 class="section-title__sub-heading text-electric-violet-2">{{$category->name}} posts</h5>
              <h2 class="section-title__heading">Blog Reguler</h2>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">

        @forelse($posts as $post)
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
          @empty
            <div class="col-xl-4 col-lg-9 col-md-7 col-xs-10">
                <p> No post found </p>
            </div>
          @endforelse
         
        </div>

        {{$posts->links('vendor.pagination.template')}}
       
      </div>
    </div>
@endsection

