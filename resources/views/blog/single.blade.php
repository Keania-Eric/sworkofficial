@extends('partials.app')

@section('page-contents')

  <!-- Blog Details Area -->
  <div class="blog-details bg-default-6">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="blog-title">
              <h1 class="blog-title__heading">{{$post->title}}</h1>
              <div class="blog__metainfo">
                <a href="#" class="blog__metainfo__author-name">By {{$post->author}}</a>
                <a href="#" class="blog__metainfo__date">{{date('j F, Y,', strtotime($post->published_at))}}</a>
              </div>
            </div>
            <div class="blog-content">
              <div class="blog-content__img">
                <img class="w-100" src="{{$post->default_image_url}}" alt="">
              </div>
              <p class="blog-content__text">{{$post->perex}}</p>
              
              <div class="post-tags-section d-flex align-items-center flex-wrap">
                <h4 class="post-tags-section__title mb-0">Tags:</h4>
                <ul class="post-tags list-unstyled mt-3 mt-lg-5">
                  <li><a href="#">Freelance</a></li>
                  <li><a href="#">Education</a></li>
                  <li><a href="#">Marketing</a></li>
                  <li><a href="#">Job</a></li>
                  <li><a href="#">Freelance</a></li>
                </ul>
              </div>
              <div class="post-social-share d-flex align-items-center flex-wrap">
                <h4 class="post-social-share__title mb-0">Share:</h4>
                <ul class="social-share list-unstyled mb-0">
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
              </div>
              <div class="next-prev-btn d-flex align-items-center justify-content-between">
                <div class="prev-btn">
                  <a class="btn-link btn-link--prev" href="{{$post->prev_post_url}}"><i class="fa fa-arrow-left"></i>prev</a>
                </div>
                <div class="prev-btn">
                  <a class="btn-link btn-link--next" href="{{$post->next_post_url}}">next<i class="fa fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 offset-xl-1 col-lg-5 mt-5 mt-lg-0">
            <div class="sidebar-area">
              <!-- Single Widgets -->
              <div class="widget">
                <h3 class="widget__title">Search</h3>
                <div class="widget__search">
                  <form action="./">
                    <i class="fa fa-search text-royal-blue"></i>
                    <input type="text" placeholder="Type to search">
                  </form>
                </div>
              </div>
              <!--/ .Single Widgets -->
              <!-- Single Widgets -->
              <div class="widget">
                <h3 class="widget__title">Recent Posts</h3>
                <ul class="widget__recent-post list-unstyled mb-0 pb-0">
                  <li class="widget__recent-post__single">
                    <a href="#">
                      <h4 class="widget__recent-post__title">How To Blow Through Capital At An Incredible Rate</h4>
                      <p class="widget__recent-post__date">Jan 14, 2020</p>
                    </a>
                  </li>
                  <li class="widget__recent-post__single">
                    <a href="#">
                      <h4 class="widget__recent-post__title">Design Studios That Everyone Should Know About?</h4>
                      <p class="widget__recent-post__date">Jan 14, 2020</p>
                    </a>
                  </li>
                  <li class="widget__recent-post__single">
                    <a href="#">
                      <h4 class="widget__recent-post__title">How did we get 1M+ visitors in 30 days without anything!</h4>
                      <p class="widget__recent-post__date">Jan 14, 2020</p>
                    </a>
                  </li>
                </ul>
              </div>
              <!--/ .Single Widgets -->
              
              <!-- Single Widgets -->
              <div class="widget">
                <h3 class="widget__title">Categories</h3>
                <div class="widget__category">
                  <ul class="list-unstyled">
                    @foreach($categories as $category)
                      <li>
                        <a class="d-flex align-items-center justify-content-between flex-wrap" href="#">
                          <h4 class="mb-0">{{$category->name}}:</h4>
                          <span>{{$category->postCount}} posts</span>
                        </a>
                      </li>
                    @endforeach
                    
                  </ul>
                </div>
              </div>
              <!--/ .Single Widgets -->
              <!-- Single Widgets -->
              <div class="sidebar__ads">
                <a href="#"><img class="w-100" src="./image/png/ads-img.png" alt=""></a>
              </div>
            </div>
            <!--/ .Single Widgets -->
          </div>
        </div>
      </div>
    </div>
    <!--/ .Blog Details Area -->
    <!-- Comments Section Area -->
    <div class="comments-area bg-default-3 border-bottom border-default-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-7" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
            <div class="comments-form section-title text-left mb-5 mb-md-7">
              <h2 class="section-title__heading">
                Comments
              </h2>
            </div>
            <ul class="list-unstyled">
              <!-- Single Comments -->
              <li class="comment-meta-box__single">
                <div class="comment-meta-box d-flex">
                  <div class="comment-meta-box__author-img">
                    <img src="./image/png/user-img-1.png" alt="">
                  </div>
                  <div class="comment-meta-box__content">
                    <div class="comment-meta-box__user-info d-flex align-items-end justify-content-between mb-3">
                      <div class="comment-meta-box__details">
                        <a href="#" class="comment-meta-box__name">Brandon Howard</a>
                        <div class="comment-meta-box__date-time">
                          <a href="#" class="comment-meta-box__date">Jan 20, 2021 </a>|
                          <a href="" class="comment-meta-box__time"> 24 minutes ago</a>
                        </div>
                      </div>
                      <a class="btn-link comment-meta-box__reply-btn text-electric-violet-2" href="#">
                        <i
                                            class="fa fa-reply"></i> Reply</a>
                    </div>
                    <p class="comment-meta-box__text">OMG! I cannot believe that I have got a brand new
                      landing page after getting
                      Fastland. It
                      was super easy to create, edit and publish.</p>
                  </div>
                </div>
                <ul class="list-unstyled sub-comment-meta-box">
                  <!-- Single Comments -->
                  <li class="comment-meta-box__single">
                    <div class="comment-meta-box d-flex">
                      <div class="comment-meta-box__author-img">
                        <img src="./image/png/user-img-2.png" alt="">
                      </div>
                      <div class="comment-meta-box__content">
                        <div class="comment-meta-box__user-info d-flex align-items-end justify-content-between mb-3">
                          <div class="comment-meta-box__details">
                            <a href="#" class="comment-meta-box__name">Jennifer Ashley</a>
                            <div class="comment-meta-box__date-time">
                              <a href="#" class="comment-meta-box__date">Jan 20, 2021 </a>|
                              <a href="" class="comment-meta-box__time"> 24 minutes ago</a>
                            </div>
                          </div>
                          <a class="btn-link comment-meta-box__reply-btn text-electric-violet-2" href="#">
                            <i class="fa fa-reply"></i> Reply</a>
                        </div>
                        <p class="comment-meta-box__text">OMG! I cannot believe that I have got a brand
                          new landing page after getting
                          Fastland. It
                          was super easy to create, edit and publish.</p>
                      </div>
                    </div>
                  </li>
                  <!--/ .Single Comments -->
                </ul>
              </li>
              <!--/ .Single Comments -->
              <!-- Single Comments -->
              <li class="comment-meta-box__single">
                <div class="comment-meta-box d-flex">
                  <div class="comment-meta-box__author-img">
                    <img src="./image/png/user-img-3.png" alt="">
                  </div>
                  <div class="comment-meta-box__content">
                    <div class="comment-meta-box__user-info d-flex align-items-end justify-content-between mb-3">
                      <div class="comment-meta-box__details">
                        <a href="#" class="comment-meta-box__name">Mark Ruffins</a>
                        <div class="comment-meta-box__date-time">
                          <a href="#" class="comment-meta-box__date">Jan 20, 2021 </a>|
                          <a href="#" class="comment-meta-box__time"> 24 minutes ago</a>
                        </div>
                      </div>
                      <a class="btn-link comment-meta-box__reply-btn text-electric-violet-2" href="#">
                        <i
                                            class="fa fa-reply"></i> Reply</a>
                    </div>
                    <p class="comment-meta-box__text">OMG! I cannot believe that I have got a brand new
                      landing page after getting
                      Fastland. It
                      was super easy to create, edit and publish.</p>
                  </div>
                </div>
              </li>
              <!--/ .Single Comments -->
            </ul>
          </div>
          <div class="col-xl-7 col-lg-7 mb-7 mb-lg-0">
            <div class="comments-form">
              <div class="section-title text-left mb-5 mb-md-7" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
                <h2 class="section-title__heading">
                  Share your response
                </h2>
              </div>
              <form action="./" class="contact-form" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                <div class="row">
                  <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                      <input class="form-control" placeholder="Leave a comment here" id="floatinginput" />
                      <label for="floatinginput">Your Name</label>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="form-floating">
                      <input class="form-control" placeholder="Leave a comment here" id="floatinginput2" />
                      <label for="floatinginput2">Your Email</label>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea3" style="height: 100px"></textarea>
                      <label for="floatingTextarea3">Type your comment.. </label>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-check d-flex align-items-center">
                      <input class="form-check-input bg-white float-none mt-0" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Save my name, email, and website in this browser for the next time I comment.
                      </label>
                    </div>
                    <button class="btn btn-primary shadow--primary-4 btn--lg-2 rounded-55 text-white">Send
                      Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ .Comments Section Area -->
@endsection

