<!DOCTYPE html>
<html lang="fa">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مدیریت</title>

    <link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('admin/css/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/libs/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/mine.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/iransans.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 right_col">
            <div class="right_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('/management') }}" class="site_title" style="text-align: center;">پنل مدیریت</a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_info">
                        <h4 class="font2">خوش آمدید</h4>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i>خانه</a></li>
                            <li><a><i class="fa fa-edit"></i> پست ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('/management/posts') }}">لیست پست ها</a></li>
                                    <li><a href="{{ url('/management/post/create') }}">پست جدید</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i> دسته بندی ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('/management/categories') }}">لیست دسته بندی ها</a></li>
                                    <li><a href="{{ url('/management/category/create') }}">دسته بندی جدید</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i> نقل قول ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ url('/management/quotes') }}">لیست نقل قول ها</a></li>
                                    <li><a href="{{ url('/management/quote/create') }}">نقل قول جدید</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/management/comments') }}"><i class="fa fa-comment"></i>نظرات</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="">
                            <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt="">{{ $authUser->name }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-left">
                                <li><a href="#"> پروفایل</a></li>
                                <li>
                                    <a href="#">
                                        <span class="badge bg-red pull-left">50%</span>
                                        <span>تنظیمات</span>
                                    </a>
                                </li>
                                <li><a href="#">کمک</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-left"></i> خروج</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="#" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>
                                        <span>
                          <span>محمد رضا پازوکی</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                        <span class="message">
                          آخرین مطالب و اخبار را در اینجا می بینید. ادامه مطلب...
                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="left_col" role="main">
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
        <!-- /page content -->

        <!-- footer content -->
        <footer class="footer navbar-fixed-bottom">
            <div>
                طراحی و توسعه توسط <a href="http://arash-hatami.ir" style="color: #2ab27b">آرش حاتمی</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('admin/js/bootstrap.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/js/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('admin/js/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('admin/js/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('admin/js/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('admin/js/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('admin/libs/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('admin/js/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('admin/js/jquery.flot.js') }}"></script>
<script src="{{ asset('admin/js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('admin/js/jquery.flot.time.js') }}"></script>
<script src="{{ asset('admin/js/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('admin/js/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('admin/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('admin/js/date-fa-IR.js') }}"></script>
<script src="{{ asset('admin/js/jquery.flot.spline.js') }}"></script>
<script src="{{ asset('admin/js/curvedLines.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/libs/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('admin/libs/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('admin/libs/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('admin/js/moment-with-locales.js') }}"></script>
<script src="{{ asset('admin/js/daterangepicker.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('admin/js/custom.min.js') }}"></script>
<!-- mine -->
<script src="{{ asset('admin/js/mine.js') }}"></script>
@yield('scripts')
</body>
</html>
