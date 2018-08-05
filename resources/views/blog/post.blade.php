@extends('blog.layout.base')

@section('main')
	<?php
	$count = 0;
	?>
    <div class="business">
        <div class="blog-grid2">
            <img src="{{ asset('/blog_asset/images/1.jpg') }}" class="img-responsive" alt="">
            <div class="blog-text">
                <h6>نویسنده : <span> {{ $post->user->name }} </span> -
                    <span> {{ explode(' - ',$post->create_date)[0] }} </span> ساعت
                    <span> {{ explode(' - ',$post->create_date)[1] }}</span></h6>
                <h5>{{ $post->title }}</h5>
                <p>{!! html_entity_decode($post->body) !!}</p>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="comment-top">
            <h3>نظرات</h3>
            @if(count($post->comments)>0)
                @foreach($post->comments as $comment)
                    @if($comment->confirm)
						<?php $count++; ?>
                        <div class="media-body" id="comment">
                            <h4 class="media-heading">{{ $comment->name }}</h4>
                            <p>{{ $comment->body }}</p>
                            <h6>{{ $comment->create_date }}</h6>
                            <!-- Nested media object -->
                            @if($comment->answer)
                                <hr>
                                <div class="media answer">
                                    <div class="media-body">
                                        <h4 class="media-heading">مدیریت</h4>
                                        <p>{{ $comment->answer }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <br>
                    @endif
                @endforeach
                @if($count==0)
                    <p>نظری ثبت نشده است</p>
                @endif
            @else
                <p>نظری ثبت نشده است</p>
            @endif
        </div>
        <br>
        <hr>
        <br>
        <div class="comment">
            <h3>نظرتان را ثبت کنید</h3>
            <div class="comment-bottom">
                <form action="{{ url('/blog/comment') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="text" name="name" placeholder="نام / نام مستعار">
                    <input type="text" name="email" placeholder="ایمیل ( اختیاری )">
                    <input type="text" name="website" placeholder="وب سایت ( اختیاری )">
                    <textarea name="body" placeholder="متن نظر"></textarea>
                    <input type="submit" value="ثبت">
                </form>
            </div>
        </div>
    </div>
@endsection