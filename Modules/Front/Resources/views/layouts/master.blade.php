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
    <link rel="stylesheet" href="{{ asset(('/css/front.css')) }}">


</head>
<body>
<header>
    <!-- Header top -->
    <div class="headertop bg-secondary text-white py-3">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div>
                    <a class="font-15 line-15 mb-0" href="#">
                        <i class="fa fa-globe mr-2"></i>
                        English
                    </a>
                </div>
                <div class="d-flex flex-wrap align-items-center">
                    <p class="font-15 line-15 mr-24 ml-md-4 mb-0">
                        <i class="fa fa-money-bill mr-2"></i>
                        الدفع عند الاستلام
                    </p>
                    <a class="font-15 line-15 mr-24 ml-md-4 mb-0" href="#">
                        <i class="fa fa-headset mr-2"></i>
                        خدمة العملاء
                    </a>
                    <a class="font-15 line-15 mr-24 ml-md-4 mb-0" href="#">
                        <i class="fa fa-truck mr-2"></i>
                        تتبع طلبك
                        <span class="headertop__dot bg-primary rounded-pill ml-2 d-inline-block"></span>
                    </a>
                    @if(Auth::user())
                        <a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit()"
                           class="font-15 line-15 mr-24 ml-md-4 mb-0">
                            <i class="fas fa-sign-out-alt mr-2"></i> @lang('adminlte.auth.logout')
                            <span class="headertop__dot bg-primary rounded-pill ml-2 d-inline-block"></span>

                            <form style="display: none;" action="{{ route('logout') }}" method="post" id="logoutForm"
                                  class="d-none">
                                @csrf
                            </form>
                        </a>
                    @else
                        <a class="font-15 line-15 mr-24 ml-md-4 mb-0" href="{{route('login')}}">
                            <i cldashboardass="fa fa-truck mr-2"></i>
                            تسجيل دخول
                            <span class="headertop__dot bg-primary rounded-pill ml-2 d-inline-block"></span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- / Header op -->
    <!-- Header bottom -->
    <div class="headerbottom bg-secondary text-white pb-lg-4 pb-3">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-3 my-lg-0 mt-1">
                    <div class="d-md-flex flex-wrap align-items-center">
                        <a class="d-block mb-3 mb-md-0" href="#">
                            <img class="img-h40 d-block mx-auto" src="/img/logo.svg" alt="">
                        </a>
                        <div class="headerbottom__search ml-md-3 position-relative">
                            <div class="input-group rounded-pill">
                                <select name="" id="" class="custom-select bg-primary text-white border-primary px-4">
                                    <option value="">منتجات</option>
                                    <option value="">متاجر</option>
                                </select>
                                <input type="text" class="form-control pr-48" placeholder="ابحث عن منتجات او متاجر">
                            </div>
                            <button type="submit" class="position-absolute bg-transparent border-0 p-0">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="headerbottom__menus d-flex flex-wrap align-items-center justify-content-md-end justify-content-center">
                        <button class="navbar-toggler collapsed d-flex d-lg-none align-items-center" type="button"
                                data-toggle="collapse" data-target="#listmobile" aria-controls="listmobile"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i> <span class="font-15 ml-3">القائمة</span>
                        </button>
                        <div class="styledropdown">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="d-none d-md-inline-block">
                                                كرار سلام
                                            </span>
                                    <span class="d-inline-block d-md-none">
                                                <i class="fa fa-user"></i>
                                            </span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">الرابط 01</a>
                                    <a class="dropdown-item" href="#">الرابط 02</a>
                                    <a class="dropdown-item" href="#">الرابط 03</a>
                                    <a class="dropdown-item" href="#">الرابط 04</a>
                                </div>
                            </div>
                        </div>
                        <a class="font-15 line-15" href="#">
                            <i class="fa fa-shopping-cart mr-md-2"></i>
                            <span class="d-none d-md-inline-block">عربة التسوق</span>
                        </a>
                        <a class="btn btn-primary rounded-pill btn-mw100 btn-md-mw120" href="#">
                            أنشئ متجر
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Header bottom -->
    <!-- Header Menus -->
    <div class="headermenus bg-white border-bottom">
        <div class="container">
            <nav class="navbar styledropdown navbar-expand-lg p-0">
                <div class="collapse navbar-collapse" id="listmobile">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i
                                    class="fa fa-th mr-24"></i>جميع الأقسام</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الإلكترونيات
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الأزياء
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        المنزل والمطبخ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الجمال والعطور
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الاطفال والمواليد
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الالعاب
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الالعاب
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الإلكترونيات
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الأزياء
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        المنزل والمطبخ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الجمال والعطور
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الاطفال والمواليد
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الالعاب
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الإلكترونيات
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الأزياء
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        المنزل والمطبخ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الجمال والعطور
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الاطفال والمواليد
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الالعاب
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الاطفال والمواليد
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الالعاب
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الإلكترونيات
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الأزياء
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        المنزل والمطبخ
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الجمال والعطور
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الاطفال والمواليد
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        الالعاب
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">الإلكترونيات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">الأزياء</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">المنزل والمطبخ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">الجمال والعطور</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">الأطفال والمواليد</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">الالعاب</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">المتاجر</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <p class="font-15 line-15 m-0">
                                <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                بغداد - الكرادة - ساحة الحرية
                            </p>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- / Header Menus -->
</header>


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
    <!-- Footer Links -->
    <div class="footercenter py-4 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg col-md-6">
                    <h3 class="font-18 font-lg-20 my-3 mt-lg-0">
                        الإلكترونيات
                    </h3>
                    <ul class="footercenter__links m-0 p-0">
                        <li><a href="#">الهواتف المتحركة</a></li>
                        <li><a href="#">اجهزة التابلت</a></li>
                        <li><a href="#">اجهزة الكمبيوتر المحمولة</a></li>
                        <li><a href="#">الاجهزة المنزلية</a></li>
                        <li><a href="#">سماعات الراس</a></li>
                        <li><a href="#">العاب الفيديو</a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-6">
                    <h3 class="font-18 font-lg-20 my-3 mt-lg-0">
                        الأزياء
                    </h3>
                    <ul class="footercenter__links m-0 p-0">
                        <li><a href="#">الهواتف المتحركة</a></li>
                        <li><a href="#">اجهزة التابلت</a></li>
                        <li><a href="#">اجهزة الكمبيوتر المحمولة</a></li>
                        <li><a href="#">الاجهزة المنزلية</a></li>
                        <li><a href="#">سماعات الراس</a></li>
                        <li><a href="#">العاب الفيديو</a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-6">
                    <h3 class="font-18 font-lg-20 my-3 mt-lg-0">
                        المطبخ والأجهزة المنزلية
                    </h3>
                    <ul class="footercenter__links m-0 p-0">
                        <li><a href="#">الهواتف المتحركة</a></li>
                        <li><a href="#">اجهزة التابلت</a></li>
                        <li><a href="#">اجهزة الكمبيوتر المحمولة</a></li>
                        <li><a href="#">الاجهزة المنزلية</a></li>
                        <li><a href="#">سماعات الراس</a></li>
                        <li><a href="#">العاب الفيديو</a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-6">
                    <h3 class="font-18 font-lg-20 my-3 mt-lg-0">
                        الجمال
                    </h3>
                    <ul class="footercenter__links m-0 p-0">
                        <li><a href="#">الهواتف المتحركة</a></li>
                        <li><a href="#">اجهزة التابلت</a></li>
                        <li><a href="#">اجهزة الكمبيوتر المحمولة</a></li>
                        <li><a href="#">الاجهزة المنزلية</a></li>
                        <li><a href="#">سماعات الراس</a></li>
                        <li><a href="#">العاب الفيديو</a></li>
                    </ul>
                </div>
                <div class="col-lg col-md-6">
                    <h3 class="font-18 font-lg-20 my-3 mt-lg-0">
                        الأطفال
                    </h3>
                    <ul class="footercenter__links m-0 p-0">
                        <li><a href="#">الهواتف المتحركة</a></li>
                        <li><a href="#">اجهزة التابلت</a></li>
                        <li><a href="#">اجهزة الكمبيوتر المحمولة</a></li>
                        <li><a href="#">الاجهزة المنزلية</a></li>
                        <li><a href="#">سماعات الراس</a></li>
                        <li><a href="#">العاب الفيديو</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between flex-wrap mt-4 mt-lg-5">
                <div>
                    <img class="footercenter__logo img-h50 img-lg-h90" src="/img/logodark.svg" alt="">
                </div>
                <div class="text-center">
                    <p class="font-15 mb-2">
                        تواصل معنا
                    </p>
                    <ul class="sharesocial bg-primary icons-lg">
                        <li><a href="#" class="fab fa-facebook-f"></a></li>
                        <li><a href="#" class="fab fa-twitter"></a></li>
                        <li><a href="#" class="fab fa-instagram"></a></li>
                        <li><a href="#" class="fab fa-youtube"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- / Footer Links -->
    <!-- Footer Copy -->
    <div class="footerbottom bg-white py-4 border-top">
        <div class="container">
            <div class="d-flex align-items-center justify-content-lg-between justify-content-center flex-wrap">
                <p class="font-15 line-15 m-0">
                    جميع الحقوق محفوظة لـ موقع © 2020
                </p>
                <ul class="footerbottom__links">
                    <li><a href="#">شروط الاستخدام</a></li>
                    <li><a href="#">سياسة الخصوصية</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- / Footer Copy -->
    <script src="{{asset('js/slick-1.8.0.min.js')}}"></script>
    <script src="{{asset('js/masonry-4.2.2.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded-4.1.4.min.js')}}"></script>
    <script src="{{asset('js/pace-1.0.0.min.js')}}"></script>
    <script src="{{asset('js/custom-1.0.0.js')}}"></script>
</footer>

{{-- Laravel Mix - JS File --}}
<script src="{{ asset('js/front.js') }}"></script>
</body>
</html>
