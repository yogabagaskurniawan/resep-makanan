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
                    <form action="#" method="post">
                        <input type="search" name="search" placeholder="Type any keywords...">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Footer Social Info -->
                    <div class="footer-social-info text-right">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <!-- Footer Logo -->
                    <div class="footer-logo">
                        <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                    </div>
                    <!-- Copywrite -->
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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