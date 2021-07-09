<!-- Single Comments -->
<li class="comment-meta-box__single">
    <div class="comment-meta-box d-flex">
        <div class="comment-meta-box__author-img">
            <img src="{{asset('image/png/user-img-1.png')}}" alt="">
        </div>
        <div class="comment-meta-box__content">
            <div class="comment-meta-box__user-info d-flex align-items-end justify-content-between mb-3">
                <div class="comment-meta-box__details">
                    <a href="#" class="comment-meta-box__name">{{$comment->name}}</a>
                    <div class="comment-meta-box__date-time">
                        <a href="#" class="comment-meta-box__date">{{date('j F, Y,', strtotime($comment->created_at))}} </a>|
                        <a href="#" class="comment-meta-box__time"> {{$comment->created_at->diffForHumans()}}</a>
                    </div>
                </div>
                <a class="btn-link comment-meta-box__reply-btn text-electric-violet-2 collapse-toggler" data-target="replyform-{{$comment->id}}" href="#replyform-{{$comment->id}}" aria-expanded="false" aria-controls="replyform-{{$comment->id}}"><i class="fa fa-reply"></i> Reply</a>
                
            </div>
            <p class="comment-meta-box__text">{{$comment->comment}}</p>

            <div class="collapse" id="replyform-{{$comment->id}}">
                <form action="{{route('blog.comment.reply', ['id'=> $comment->id])}}" class="contact-form" method="POST" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true">
                    {{csrf_field()}}
                    <input type="hidden" name="parent_id" value={{$comment->id}}>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input class="form-control" placeholder="Leave a comment here" id="floatinginput" name="name" />
                            <label for="floatinginput">Your Name</label>
                        </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input class="form-control" placeholder="Leave a comment here" id="floatinginput2" name="email" />
                            <label for="floatinginput2">Your Email</label>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea3" style="height: 100px"></textarea>
                            <label for="floatingTextarea3">Type your comment.. </label>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        
                        <button class="btn btn-primary shadow--primary-4 btn--lg-2 rounded-55 text-white">Send
                            Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <ul class="list-unstyled sub-comment-meta-box">
        @foreach($comment->replies as $reply)
        <!-- Single Comments -->
        <li class="comment-meta-box__single">
            <div class="comment-meta-box d-flex">
                <div class="comment-meta-box__author-img">
                    <img src="{{asset('image/png/user-img-2.png')}}" alt="">
                </div>
                <div class="comment-meta-box__content">
                    <div class="comment-meta-box__user-info d-flex align-items-end justify-content-between mb-3">
                    <div class="comment-meta-box__details">
                        <a href="#" class="comment-meta-box__name">{{$reply->name}}</a>
                        <div class="comment-meta-box__date-time">
                        <a href="#" class="comment-meta-box__date">{{date('j F, Y,', strtotime($reply->created_at))}}</a>|
                        <a href="" class="comment-meta-box__time"> {{$reply->created_at->diffForHumans()}}</a>
                        </div>
                    </div>

                    </div>
                    <p class="comment-meta-box__text">{{$reply->comment}}</p>
                </div>
            </div>
        </li>
        <!--/ .Single Comments -->
        @endforeach

    </ul>
    </li>
    <!--/ .Single Comments -->