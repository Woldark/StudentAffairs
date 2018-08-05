@extends('blog.layout.base')

@section('main')
    <div class="tech-no">
        @foreach($posts as $post)
            <div class="tc-ch">
                <div class="tch-img">
                    <a href="{{ url('/blog/post/'.$post->slug) }}" target="_blank">
                        <img src="{{ asset('/blog_asset/images/1.jpg') }}" class="img-responsive" alt=""/>
                    </a>
                </div>
                <a class="blog blue"
                   href="{{ url('/blog/category/'.$post->category->id) }}">{{ $post->category->name }}</a>
                <h3 style="text-align: right; direction: rtl;">
                    <a href="{{ url('/blog/post/'.$post->slug) }}" target="_blank">{{ $post->title }}</a>
                </h3>
                <p style="text-align: justify; direction: rtl;">{!! html_entity_decode($post->body) !!}</p>
                <div class="blog-poast-info">
                    <ul style="text-align: right">
                        <li>
                            <i class="glyphicon glyphicon-eye-open info_icon"></i>{{ $post->seen }}
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-comment info_icon"></i>{{ count($post->comments) }}
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-heart info_icon"></i>{{ $post->like }}
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-calendar info_icon"></i>{{ explode(' - ',$post->create_date)[0] }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        @endforeach
        <div class="center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection