<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @if(Route::is('index'))
    <title> Khulna Seba | Online Service Platform</title>
    @else
    <title>@yield('title') - Khulna Seba | Online Service Platform</title>
    @endif
    

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fontawesome/css/all.min.css') }}">

    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slick/slick.css') }}">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>

<body>

    <div id="menu-overlay" class="menu-overlay"></div>
    <!-- menu section start -->
    <div class="menu">
        <div class="container">
            <div class="menu-section">
                <a href="#" class="menu-btn" id="menu_btn">
                    <i class="fa-solid fa-bars-staggered"></i>
                </a>

                <div class="logo">
                    <a href="{{ route('index')}}">
                        <h2 style="color: #fff;">Khulna Seba</h2>
                    </a>
                </div>

                <div class="main-menu">
                    <ul class="nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Job</a></li>
                    </ul>

                    <!-- <div class="buttons">
                        <a href="#" class="active">EN</a> <span>|</span>
                        <a href="#">বাং</a>
                    </div> -->

                    <a href="#" class="help"><i class="fa-solid fa-circle-info"></i> Help</a>

                </div>

                

            </div>
        </div>
    </div>
    <!-- menu section end -->


    <!-- mobile menu start -->
    <div class="mobile-menu">
        <div class="menu-area">


            <div class="shape"></div>
            <a href="#" class="item">
                <i class="fa-solid fa-users-gear"></i> <span>Services</span>
            </a>

            <a href="#" class="item">
                <i class="fa-solid fa-house"> </i><span>Home</span>
            </a>

            <a href="#" class="item">
                <i class="fa-solid fa-address-book"></i> <span>Contact</span>
            </a>

        </div>

    </div>
    <!-- mobile menu end -->

    @yield('content')

    <footer>
        <div class="footer">
            <div class="row">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
            </div>

            <div class="row">
                <ul>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </div>

            <p>Copyright © 2021 Inferno - All rights reserved || Designed By: Sabya Roy</p>

        </div>
    </footer>



    <!-- jquery -->
    <script src="{{ asset('assets/frontend/js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>


    <!-- slick slider -->
    <script src="{{ asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>


</body>

</html>