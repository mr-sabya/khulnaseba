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
    <title> Khulna Seba | Online Service Platform</title>
    @else
    <title>@yield('title') - Khulna Seba | Online Service Platform</title>
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
                        <img src="{{ url('assets/frontend/image/logo.png') }}" alt="">
                    </a>
                </div>

                <div class="main-menu">
                    <ul class="nav">
                        <li><a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}">Blog</a></li>
                        <li><a href="{{ route('contact.index') }}" class="{{ Route::is('contact.index') ? 'active' : '' }}">Contact</a></li>
                        <li><a href="#">Career</a></li>
                    </ul>

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