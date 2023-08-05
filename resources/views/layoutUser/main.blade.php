<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Delicious - Food Blog Template | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('templete/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('templete/user.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/classy-nav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/custom-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templete/css/owl.carousel.min.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <i class="circle-preloader"></i>
        <img src="{{ asset('templete/img/core-img/salad.png') }}" alt="">
    </div>

    <!-- Search Wrapper -->
    <div class="search-wrapper">
        <!-- Close Btn -->
        <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="/search" method="GET">
                        <input type="search" name="search" placeholder="Silahkan apa yang kamu cari...." value="{{ request('search') }}">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <!-- Breaking News -->
                    <div class="col-12 col-sm-6">
                        <div class="breaking-news">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a>Hello Kawan</a></li>
                                    <li><a>Selamat Datang Di Dapur Mamis.</a></li>
                                    <li><a>Mau Masak Apa Hari Ini ?</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="/"><img src="{{ asset('templete/img/logo.png') }}" width="144px" height="65px" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    {{-- <li class="active"><a href="index.html">Home</a></li> --}}
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/">Resep</a>
                                        <ul class="dropdown">
                                            @foreach ($kategori as $ktg)
                                                <li><a href="{{ url('resep-makanan/'. $ktg->slug) }}">{{ $ktg->nama }}</a></li> 
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="/artikel-resep-makanan">Artikel</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>

                                <!-- Newsletter Form -->
                                <div class="search-btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    
    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Copywrite -->
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Dapur Mami with <i class="fa fa-heart-o" aria-hidden="true"></i> by Bagas
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('templete/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('templete/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('templete/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('templete/js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('templete/js/active.js') }}"></script>
</body>

</html>