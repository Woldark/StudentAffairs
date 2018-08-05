<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/blog_asset/css/bootstrap.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('/blog_asset/css/style.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('/blog_asset/css/iransans.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('/blog_asset/css/mine.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('/blog_asset/css/fontawesome-all.min.css') }}" rel='stylesheet' type='text/css'/>
</head>
<body>
<!--start-main-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="{{ route('blog_home') }}"><h1>آرش حاتمی</h1></a>
            </div>
            <div class="search">
                <form>
                    <input type="text" value="جستجو" placeholder="" onfocus="this.value = '';"
                           onblur="if (this.value === '') {this.value = 'جستجو';}">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="social">
                <ul>
                    <li>
                        <a class="link" href="https://facebook.com/hatamiarash7" target="_blank">
                            <h1 class="fab fa-facebook"></h1>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/hatamiarash7" target="_blank">
                            <h1 class="fab fa-twitter"></h1>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/hatamiarash7" target="_blank">
                            <h1 class="fab fa-instagram"></h1>
                        </a>
                    </li>
                    <li>
                        <a href="https://t.me/hatamiarash7" target="_blank">
                            <h1 class="fab fa-telegram-plane"></h1>
                        </a>
                    </li>
                    <li>
                        <a href="https://stackoverflow.com/users/4905220/arash-hatami?tab=profile" target="_blank">
                            <h1 class="fab fa-stack-overflow"></h1>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!--head-bottom-->
    <div class="head-bottom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse pull-right">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/blog/gallery') }}" target="_blank">گالری عکس</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false"><span class="caret"></span>دسته بندی ها</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ url('/category/').$category->name }}"
                                       target="_blank">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="active"><a href="{{ url('/') }}">خانه</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!--head-bottom-->
</div>
<!-- banner -->
<div class="banner">
    <div class="container">
        <h2>{{ $quote->quote }}</h2>
        <p>{{ $quote->author }}</p>
    </div>
</div>
<!-- technology -->
<div class="technology">
    {{--<div class="container">--}}
    <div class="row" style="margin-left: 10px; margin-right: 10px;">
        <div class="col-md-3">
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4 style="text-align: center">جدیدتری ترین مطالب</h4>
                    @foreach($newPosts as $newPost)
                        <div class="blog-grids">
                            <div class="blog-grid-right">
                                <a href="{{ url('/blog/post/'.$newPost->slug) }}" target="_blank">
                                    <img src="{{ asset('/blog_asset/images/6.jpg') }}" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="blog-grid-left">
                                <h5>
                                    <a href="{{ url('/blog/post/'.$newPost->slug) }}"
                                       target="_blank">{{ $newPost->title }}</a>
                                </h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4 style="text-align: center">محبوب ترین مطالب</h4>
                    @foreach($hotPosts as $hotPost)
                        <div class="blog-grids">
                            <div class="blog-grid-right">
                                <a href="{{ url('/blog/post/'.$hotPost->slug) }}" target="_blank">
                                    <img src="{{ asset('/blog_asset/images/6.jpg') }}" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="blog-grid-left">
                                <h5>
                                    <a href="{{ url('/blog/post/'.$hotPost->slug) }}"
                                       target="_blank">{{ $hotPost->title }}</a>
                                </h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 technology-left">
            @if (Session::has('message'))
                <div id="message" class="ok">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div id="message" class="error">
                    {{ Session::get('error') }}
                </div>
            @endif
            @yield('main')
        </div>
        <div class="col-md-3 technology-right">
            <div class="blo-top">
                <div class="tech-btm">
                    <h4 style="text-align: center">عضویت در خبرنامه</h4>
                    <p style="text-align: justify">جهت اطلاع رسانی از جدیدترین پست ها ایمیل خود را وارد نمایید.</p>
                    <div class="name">
                        <form>
                            <input style="text-align: center" type="text" value="ایمیل" title=""
                                   onfocus="this.value = '';"
                                   onblur="if (this.value === '') {this.value = 'ایمیل';}">
                        </form>
                    </div>
                    <div class="button">
                        <form>
                            <input type="submit" value="ثبت">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <br>
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4 style="text-align: center">پربازدید ترین مطالب</h4>
                    @foreach($mostVisitedPosts as $mostVisitedPost)
                        <div class="blog-grids">
                            <div class="blog-grid-right">
                                <a href="{{ url('/blog/post/'.$mostVisitedPost->slug) }}" target="_blank">
                                    <img src="{{ asset('/blog_asset/images/6.jpg') }}" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="blog-grid-left">
                                <h5>
                                    <a href="{{ url('/blog/post/'.$mostVisitedPost->slug) }}"
                                       target="_blank">{{ $mostVisitedPost->title }}</a>
                                </h5>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- technology-right -->
    </div>
    {{--</div>--}}
</div>
<!-- technology -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-4 footer-left">
            <h6 style="text-align: center">لینک های مفید</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                consectetur
                adipisicing elit,</p>
        </div>
        <div class="col-md-4 footer-middle">
            <h6 style="text-align: center">خدمات</h6>
            <div class="mid-btm">
                <p>Consectetur adipisicing</p>
                <p>Sed do eiusmod tempor</p>
                <a href="https://w3layouts.com/">https://w3layouts.com/</a>
            </div>

            <p>Consectetur adipisicing</p>
            <p>Sed do eiusmod tempor</p>
            <a href="https://w3layouts.com/">https://w3layouts.com/</a>
        </div>
        <div class="col-md-4 footer-right">
            <h6 style="text-align: center">تماس با من</h6>
            <br>
            <h2 class="contact">
                <a href="mailto:hatamiarash7@gmail.com" target="_blank">
                    <span class="fas fa-envelope"></span>
                </a>
            </h2>
            <br>
            <h2 class="contact">
                <a href="tel:+989182180519" target="_blank">
                    <span class="fas fa-phone"></span>
                </a>
            </h2>
            <br>
            <h2 class="contact">
                <a href="http://t.me/hatamiarash7" target="_blank">
                    <span class="fab fa-telegram-plane"></span>
                </a>
            </h2>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- footer -->
<div class="copyright">
    <div class="container">
        <p style="direction: ltr; color: white">
            <span class="fas fa-code"></span> With <strong><a class="cp_link" href="http://laravel.com/"
                                                              target="_blank">Laravel</a></strong> By <strong>Arash
                Hatami</strong>
        </p>
    </div>
</div>

<script type="text/javascript" src="{{ asset('/blog_asset/js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/blog_asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/blog_asset/js/mine.js') }}"></script>
</body>
</html>