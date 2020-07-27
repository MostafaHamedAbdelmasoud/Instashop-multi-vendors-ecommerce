<!DOCTYPE html>
<html dir="{{ Locales::getDir() }}" lang="{{ app()->getLocale() }}">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title .' | '. config('app.name', 'Laravel') : config('app.name', 'Laravel')}}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Laravel Mix - CSS File --}}
    <link rel="stylesheet" href="{{ asset('/css/styles-rtl.css') }}">


</head>
<body>
<header>
    <div class="headerhome">
        <div class="headerhome__top">
            <div class="container">
                <nav class="navbar styledropdown navbar-expand-lg p-0">
                    <a class="navbar-brand p-0 m-0" href="#">
                        <img class="img-h45 img-lg-h55" src="assets/img/logodark.svg" alt="">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#listmobile" aria-controls="listmobile" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="listmobile">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">تجربة المنصة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">تسجيل دخول</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('register')}}">تسجيل</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">EN</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- / Header -->


@yield('content')


<footer>
    <!-- Footer Contacts -->
    <div class="footercontact bg-white py-3 py-lg-4 border-top border-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg mb-3 mb-lg-0">
                    <h4 class="font-16 font-md-18 font-lg-20 mb-1">
                        نحن دائما جاهزون لمساعدتك
                    </h4>
                    <p class="font-14 m-0 text-light">
                        تواصل معنا من خلال أي من قنوات الدعم التالية
                    </p>
                </div>
                <div class="col col-md-6 col-lg">
                    <div class="footercontact__box d-flex align-items-center justify-content-lg-center mb-2 mb-lg-0">
                        <div class="footercontact__box--icon text-center border font-14 rounded-pill mr-3">
                            <i class="fa fa-question"></i>
                        </div>
                        <div class="footercontact__box--text">
                            <p class="font-14 line-14 mb-1">
                                مركز المساعدة
                            </p>
                            <a class="font-14" href="#">
                                help.casherstore.com
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6 col-lg">
                    <div class="footercontact__box d-flex align-items-center justify-content-lg-center mb-2 mb-lg-0">
                        <div class="footercontact__box--icon text-center border font-14 rounded-pill mr-3">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="footercontact__box--text">
                            <p class="font-14 line-14 mb-1">
                                الدعم عبر البريد الالكتروني
                            </p>
                            <a class="font-14" href="mailto:help@casherstore.com">
                                help@casherstore.com
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6 col-lg">
                    <div class="footercontact__box d-flex align-items-center justify-content-lg-center mb-2 mb-lg-0">
                        <div class="footercontact__box--icon text-center border font-14 rounded-pill mr-3">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="footercontact__box--text">
                            <p class="font-14 line-14 mb-1">
                                الدعم عبر الهاتف
                            </p>
                            <a class="font-14" href="tel:01498851244">
                                01498851244
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6 col-lg">
                    <div class="footercontact__box d-flex align-items-center justify-content-lg-center mb-2 mb-lg-0">
                        <div class="footercontact__box--icon text-center border font-14 rounded-pill mr-3">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="footercontact__box--text">
                            <p class="font-14 line-14 mb-1">
                                راسلنا على الواتس اب
                            </p>
                            <a class="font-14" href="#">
                                Whatsapp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Footer Contacts -->
    <!-- Footer Copy -->
    <div class="footerbottom bg-white py-4 border-top">
        <div class="container">
            <div class="d-flex align-items-center justify-content-lg-between justify-content-center flex-wrap">
                <p class="font-15 line-15 m-0">
                    جميع الحقوق محفوظة  © 2020
                </p>
                <ul class="footerbottom__links">
                    <li><a href="#">شروط الاستخدام</a></li>
                    <li><a href="#">سياسة الخصوصية</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- / Footer Copy -->
    <script src="{{asset('js/pace-1.0.0.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper-1.14.3.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-4.3.1.min.js')}}"></script>
    <script src="{{asset('js/slick-1.8.0.min.js')}}"></script>
    <script src="{{asset('js/custom-1.0.0.js')}}"></script>
</footer>
{{-- Laravel Mix - JS File --}}
<script src="{{ asset('js/front.js') }}"></script>
</body>
</html>
