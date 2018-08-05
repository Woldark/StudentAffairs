<!DOCTYPE HTML>
<html xmlns:v-bind="http://www.w3.org/1999/xhtml">
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
                    <li><a href="videos.html">فیلم ها</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false"><span class="caret"></span>دسته بندی ها</a>
                        <ul class="dropdown-menu">
                            <li><a href="tech.html">Action</a></li>
                            <li><a href="tech.html">Action</a></li>
                            <li><a href="tech.html">Action</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="index.html">خانه</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!--head-bottom-->
</div>
<!-- banner -->
<div class="banner">
    <div class="container">
        <h2>"There are two ways of constructing a software design. One way is to make it so simple that there are
            obviously no deficiencies. And the other way is to make it so complicated that there are no obvious
            deficiencies."</h2>
        <p>C.A.R. Hoare</p>
    </div>
</div>
<!-- technology -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no">
                <div id="app">
                    <ul>
                        <li v-for="item in items">
                            <div class="tc-ch">
                                <div class="tch-img">
                                    <a href="{{ url('/blog/') }}/@{{ item.slug }}" target="_blank">
                                        <img src="{{ asset('/blog_asset/images/1.jpg') }}" class="img-responsive"
                                             alt=""/>
                                    </a>
                                </div>
                                <a class="blog blue"
                                   href="{{ url('/blog/category/') }}/@{{ item->cat_id }}">@{{ item.cat_name }}</a>
                                <h3 style="text-align: right; direction: rtl;"><a
                                            href="{{ url('/blog/') }}/@{{ item.slug }}">@{{ item.title }}</a>
                                </h3>
                                <p style="text-align: justify; direction: rtl;">@{{ item.body }}</p>

                                <div class="blog-poast-info">
                                    <ul style="text-align: right">
                                        <li>
                                            <i class="glyphicon glyphicon-eye-open info_icon"></i>@{{ item.seen }}
                                        </li>
                                        <li>
                                            <i class="glyphicon glyphicon-comment info_icon"></i>@{{ item.comments }}
                                        </li>
                                        <li>
                                            <i class="glyphicon glyphicon-heart info_icon"></i>@{{ item.like }}
                                        </li>
                                        <li>
                                            <i class="glyphicon glyphicon-calendar info_icon"></i>@{{ item.create_date }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                    <nav>
                        <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                                <a href="#" aria-label="Previous"
                                   @click.prevent="changePage(pagination.current_page - 1)">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumber"
                                v-bind:class="[ page == isActived ? 'active' : '']">
                                <a href="#"
                                   @click.prevent="changePage(page)">@{{ page }}</a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                                <a href="#" aria-label="Next"
                                   @click.prevent="changePage(pagination.current_page + 1)">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <pre>
                        @{{ $data | json }}
                    </pre>
                </div>
            </div>
        </div>
        <!-- technology-right -->
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
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4 style="text-align: center">پربازدید ترین مطالب</h4>
                    <div class="blog-grids">
                        <div class="blog-grid-right">
                            <a href="singlepage.html">
                                <img src="{{ asset('/blog_asset/images/6.jpg') }}" class="img-responsive" alt=""/>
                            </a>
                        </div>
                        <div class="blog-grid-left">
                            <h5>
                                <a href="singlepage.html">عنوان</a>
                            </h5>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->
    </div>
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
        <p style="direction: ltr">
            <span class="fas fa-code"></span> With <strong><a href="http://laravel.com/"
                                                              target="_blank">Laravel</a></strong> By <strong>Arash
                Hatami</strong>
        </p>
    </div>
</div>

{{--<script type="text/javascript" src="{{ asset('/blog_asset/js/jquery-3.3.1.min.js') }}"></script>--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/blog_asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/blog_asset/js/mine.js') }}"></script>
<script type="text/javascript" src="{{ asset('/blog_asset/js/vue.js') }}"></script>
<script type="text/javascript" src="{{ asset('/blog_asset/js/vue-resource.min.js') }}"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            pagination: {
                total: 0,
                per_page: 7,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,// left and right padding from the pagination <span>,just change it to see effects
            items: []
        },
        ready: function () {
            this.fetchItems(this.pagination.current_page);
        },
        computed: {
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                let pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }

                return pagesArray;
            }
        },
        methods: {
            fetchItems: function (page) {
                let data = {page: page};
                this.$http.get('api/items', data).then(function (response) {
                    //look into the routes file and format your response
                    this.$set('items', response.data.data.data);
                    this.$set('pagination', response.data.pagination);
                    alert(response.data.data.data);
                }, function (error) {
                    // handle error
                });
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.fetchItems(page);
            }
        }
    });
</script>
</body>
</html>