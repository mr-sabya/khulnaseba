<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - Admin Panel | Khulna Seba </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/backend/images/favicon.png') }}">

    <!-- Datatable -->
    <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/toastr/css/toastr.min.css') }}">

    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/select2/css/select2.min.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/summernote/summernote-bs4.min.css') }}">

    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">



</head>

<body>

    <!-- preloader start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- preloader end -->
    <div id="main-wrapper">


        <!-- navbar  -->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ url('assets/backend/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ url('assets/backend/images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ url('assets/backend/images/logo-text.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!-- navabr -->

        <!-- header start -->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="fa-regular fa-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ route('admin.password.edit', Auth::user()->id) }}" class="dropdown-item">
                                        <i class="fa-solid fa-key"></i>
                                        <span class="ml-2">Change Password </span>
                                    </a>
                                    @if(Auth::user()->is_admin == 1)
                                    <a href="{{ route('admin.setting.index')}}" class="dropdown-item">
                                        <i class="fa-solid fa-gear"></i>
                                        <span class="ml-2">Setting </span>
                                    </a>

                                    <a href="{{ route('admin.banner.index')}}" class="dropdown-item">
                                        <i class="fa-solid fa-images"></i>
                                        <span class="ml-2">Banner </span>
                                    </a>

                                    <a href="{{ route('admin.user.index') }}" class="dropdown-item">
                                        <i class="fa-solid fa-users"></i>
                                        <span class="ml-2">Users </span>
                                    </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- header end -->

        <!-- sidebar -->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="fa-solid fa-house"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Address</span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.district.index') }}">District</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.city.index') }}">City</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-label">Services</li>
                    <li>
                        <a href="{{ route('admin.newspaper.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-newspaper"></i><span class="nav-text">Newspaper</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-person"></i><span class="nav-text">Blood Donor</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.blood.index') }}">Blood group</a>
                            </li>

                            <li>
                                <a href="{{ route('admin.blood-donor.index') }}">Blood Donor</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.hospital.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-hospital"></i><span class="nav-text">Hospital</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-user-doctor"></i><span class="nav-text">Doctor</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.medical.index') }}">Doctor Type</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.doctor.index') }}">Doctor</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.ambulance.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-truck-medical"></i><span class="nav-text">Ambulance</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-utensils"></i><span class="nav-text">Restaurant</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.food.index') }}">food</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.restaurant.index') }}">Restaurant</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.fireservice.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-fire-extinguisher"></i><span class="nav-text">Fire Service</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.journalist.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-user-secret"></i><span class="nav-text">Journalist</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-gavel"></i><span class="nav-text">Lawyer</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.lawdepartment.index') }}">Law Department</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.lawyer.index') }}">Lawyer</a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-bus"></i><span class="nav-text">Bus Ticket</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.busroute.index') }}">Bus Route</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.bus.index') }}">Bus</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.bustype.index') }}">Bus Type</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.buscounter.index') }}">Bus Counter</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.busticket.index') }}">Bus Ticket</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-train"></i><span class="nav-text">Train Ticket</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.trainroute.index') }}">Train Route</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.trainclass.index') }}">Train Class</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.train.index') }}">Train</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.trainticket.index') }}">Train Ticket</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-plane-departure"></i><span class="nav-text">Plane Ticket</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="#">Airlines</a>
                            </li>
                            <li>
                                <a href="#">Ticket Counters</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.ehelp.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-handshake-angle"></i><span class="nav-text">E-Help</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.govtoffice.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-building"></i><span class="nav-text">Govt. Office</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.job.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-briefcase"></i><span class="nav-text">Job</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.trainingcenter.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-computer"></i><span class="nav-text">Traing Center</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.helpline.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-phone-volume"></i><span class="nav-text">Helpline</span>
                        </a>
                    </li>


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-business-time"></i><span class="nav-text">Business Idea</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.businesstype.index') }}">Business Type</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.businessidea.index') }}">Business Idea</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.library.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-book-atlas"></i><span class="nav-text">Library</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.educationalinstitute.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-school-flag"></i><span class="nav-text">Educational Institute</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.hotel.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-hotel"></i><span class="nav-text">Hotel</span>
                        </a>
                    </li>


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-map-location-dot"></i><span class="nav-text">Tourist Place</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.placetype.index') }}">Place Type</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.touristplace.index') }}">Tourist Place</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-shop"></i><span class="nav-text">Shop</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.shopcategory.index') }}">Shop Category</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.shop.index') }}">Shop</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-handcuffs"></i><span class="nav-text">Thana-Police</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.thana.index') }}">Thana</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.police.index') }}">Police</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-brands fa-blogger-b"></i><span class="nav-text">Blog</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.blogcategory.index') }}">Blog Category</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog.index') }}">Blog</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{ route('admin.pallibidyut.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-bolt"></i>
                            <span class="nav-text">Bidyut</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-users-between-lines"></i>
                            <span class="nav-text">Golpo Adda</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.storycategory.index') }}">Golpo Adda Category</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.story.index') }}">Golpo Adda</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.testimonial.index') }}" aria-expanded="false">
                            <i class="fa-solid fa-comments"></i>
                            <span class="nav-text">Testimonial</span>
                        </a>
                    </li>


                </ul>
            </div>


        </div>
        <!-- sidebar -->

        <!-- content start -->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

        <!-- content end -->


        <!-- footer -->
        <div class="footer">
            <div class="copyright">
                <p>Developed by <a href="https://sabyaroy.info/" target="_blank">Sabya Roy</a> 2019</p>
            </div>



        </div>


        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form id="deleteForm" action="" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <h3 class="text-center">Do you want to delete this Data?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Required vendors -->
        <script src="{{ asset('assets/backend/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/quixnav-init.js') }}"></script>


        <!-- Datatable -->
        <script src="{{ asset('assets/backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

        <!-- Toastr -->
        <script src="{{ asset('assets/backend/vendor/toastr/js/toastr.min.js') }}"></script>

        <!-- select 2 -->
        <script src="{{ asset('assets/backend/vendor/select2/js/select2.full.min.js') }}"></script>

        <!-- summernote -->
        <script src="{{ asset('assets/backend/vendor/summernote/summernote-bs4.min.js') }}"></script>

        <script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>

        <script type="text/javascript">
            //ajax csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#image').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            $('.details').summernote({
                placeholder: 'details here....',
                tabsize: 2,
                height: 300
            });

            $(".single-select").select2();


            $(document).on('click', '.delete', function() {
                var route = $(this).attr('data-route');
                $('#deleteForm').attr('action', route);
                $('#deleteModal').modal('show');
            });
        </script>
        @if(Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}", "Success");
        </script>
        @elseif(Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}", "Error");
        </script>
        @endif

        <!-- page scripts -->
        @yield('scripts')

</body>

</html>