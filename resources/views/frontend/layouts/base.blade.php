<!DOCTYPE html>
<html lang="en" data-bs-theme="{{ Session::get('theme') }}">

@php
$setting = App\Models\Setting::where('id', 1)->first();
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/image/fab.png') }}">
    @if(Route::is('index'))
    <title> Info Khulna | Online Service Platform</title>
    @else
    <title>@yield('title') - Info Khulna | Online Service Platform</title>
    @endif


    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fontawesome/css/all.min.css') }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/slick/slick.css') }}">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}">
</head>

<body>

    <div id="menu-overlay" class="menu-overlay"></div>
    <!-- menu section start -->
    <div class="menu">
        <div class="container-fluid">
            <div class="menu-section">


                <div class="logo">
                    <a href="#" class="menu-btn" id="menu_btn">
                        <i class="fa-solid fa-bars-staggered"></i>
                    </a>
                    <a href="{{ route('index')}}">
                        <!-- <img src="{{ url('assets/frontend/image/logo.png') }}" alt=""> -->
                        <h4 class="m-0"><i class="fa-solid fa-info-circle"></i> Info Khulna</h4>
                    </a>
                </div>

                <div class="main-menu">
                    <div class="action d-flex gap-3 justify-content-between align-items-center me-3">


                        <!-- language toggle -->
                        <div class="language-toggle">
                            <a href="" class="active">EN</a>
                            <a href="" class="{{ Session::get('lang') == 'bn' ? 'active' : '' }}">BN</a>
                        </div>

                        <!-- login -->
                        @if (Auth::check())
                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="login-btn">Login</a>

                        @endif

                    </div>

                    <div class="buttons">
                        <a href="javascript:void(0)" id="btnSwitch" title="Switch to Dark Theme"><i class="fa-solid fa-moon"></i></a>
                        <!-- <a href="#"><i class="fa-solid fa-sun"></i></a> -->
                    </div>

                    <a href="{{ route('help.index')}}" class="help"><i class="fa-solid fa-circle-info"></i> Help</a>
                </div>
            </div>
        </div>
    </div>
    <!-- menu section end -->


    <!-- mobile menu start -->
    <div class="mobile-menu">
        <div class="menu-area">


            <div class="shape"></div>
            <a href="{{ route('volunteer.index') }}" class="item">
                <i class="fa-solid fa-users"></i> <span>Volunteer</span>
            </a>

            <a href="{{ route('index')}}" class="item">
                <i class="fa-solid fa-house"> </i><span>Home</span>
            </a>

            <a href="{{ route('contact.index')}}" class="item">
                <i class="fa-solid fa-address-book"></i> <span>Contact</span>
            </a>

        </div>

    </div>
    <!-- mobile menu end -->


    <div class="main-content">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-area">

                <div class="sp-menu">
                    <ul class="nav">
                        <li><a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}"> Publish Ad</a></li>
                        <li><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}">Become Volunteer</a></li>
                    </ul>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}"><i class="fa-solid fa-home"></i> Home</a>
                    </li>

                    <li class="nav-item"><a href="{{ route('course.index') }}" class="{{ Route::is('course.index') ? 'active' : '' }}">Rent a Car</a></li>

                    <li class="nav-item"><a href="{{ route('volunteer.index') }}" class="{{ Route::is('volunteer.index') ? 'active' : '' }}">To-Let</a></li>

                    <li class="nav-item"><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}">Super Shop</a></li>

                    <li class="nav-item"><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}">Blog</a></li>

                    <li class="nav-item"><a href="{{ route('contact.index') }}" class="{{ Route::is('contact.index') ? 'active' : '' }}">Contact</a></li>
                    <li class="nav-item"><a href="#">Career</a></li>
                </ul>


            </div>
        </div>

        <!-- content area -->
        <div class="content-area" id="content-area">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div>
            </div>
            <footer>
                <div class="footer">
                    <div class="widget">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </div>

                    <div class="widget">
                        <ul>
                            <li><a href="{{ route('contact.index')}}">Contact us</a></li>
                            <li><a href="{{ route('about.index') }}">About Us</a></li>
                            <li><a href="{{ route('privacy.index') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('terms.index') }}">Terms & Conditions</a></li>
                            <li><a href="#">Career</a></li>
                        </ul>
                    </div>

                    <p>{{ $setting->copyright_text }} || Developed By: <a class="text-white" target="_blank" href="https://sabyaroy.info/">Sabya Roy</a></p>

                </div>
            </footer>
        </div>
    </div>







    <!-- jquery -->
    <script src="{{ asset('assets/frontend/js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- slick slider -->
    <script src="{{ asset('assets/frontend/vendor/slick/slick.min.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    @if(Session::get('theme'))
    <script>
        $('#btnSwitch').html('<i class="fa-solid fa-sun"></i>');
        $('#btnSwitch').attr('title', 'Switch to White Theme');
    </script>
    @endif

    <script>
        //ajax csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#btnSwitch').click(function() {


            $.ajax({
                type: "GET",
                url: "{{ route('theme') }}",
                dataType: 'json',
                success: function(data) {

                    if (data.added) {
                        document.documentElement.setAttribute('data-bs-theme', 'dark')
                        $('#btnSwitch').html('<i class="fa-solid fa-sun"></i>');
                        $('#btnSwitch').attr('title', 'Switch to White Theme');
                    } else {
                        document.documentElement.setAttribute('data-bs-theme', 'light')
                        $('#btnSwitch').html('<i class="fa-solid fa-moon"></i>');
                        $('#btnSwitch').attr('title', 'Switch to Dark Theme');
                    }

                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });


        })
    </script>

    @yield('scripts')


</body>

</html>