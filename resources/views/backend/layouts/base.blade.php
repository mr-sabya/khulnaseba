
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - Admin Panel | Khulna Seba </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">

    <!-- Datatable -->
    <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/toastr/css/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/select2/css/select2.min.css') }}">

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
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i>
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
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./index.html">Dashboard 1</a></li>
                            <li><a href="./index2.html">Dashboard 2</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Apps</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">Compose</a></li>
                                    <li><a href="./email-inbox.html">Inbox</a></li>
                                    <li><a href="./email-read.html">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="./app-calender.html">Calendar</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('admin.newspaper.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Newspaper</span></a>
                    </li>

                    <li class="nav-label">Address</li>
                    <li>
                        <a href="{{ route('admin.district.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">District</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.city.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">City</span></a>
                    </li>

                    <li class="nav-label">Blood</li>
                    <li>
                        <a href="{{ route('admin.blood.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Blood group</span></a>
                    </li>

                    <li>
                        <a href="{{ route('admin.blood-donor.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Blood Donor</span></a>
                    </li>


                    <li>
                        <a href="{{ route('admin.hospital.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Hospital</span></a>
                    </li>

                    <li>
                        <a href="{{ route('admin.ambulance.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Ambulance</span></a>
                    </li>

                    <li class="nav-label">Restaurant</li>
                    <li>
                        <a href="{{ route('admin.food.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">food</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.restaurant.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Restaurant</span></a>
                    </li>

                    <li class="nav-label">Person</li>
                    <li>
                        <a href="{{ route('admin.fireservice.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Fire Service</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.journalist.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Journalist</span></a>
                    </li>

                    <li class="nav-label">Lawyer</li>
                    <li>
                        <a href="{{ route('admin.lawdepartment.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Law Department</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.lawyer.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Lawyer</span></a>
                    </li>

                    <li class="nav-label">Doctor</li>
                    <li>
                        <a href="{{ route('admin.medical.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Doctor Type</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.doctor.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Doctor</span></a>
                    </li>

                    <li class="nav-label">Bus Ticket</li>
                    <li>
                        <a href="{{ route('admin.busroute.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Bus Route</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bus.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Bus</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.busticket.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Bus Ticket</span></a>
                    </li>

                    <li class="nav-label">E-Help</li>
                    <li>
                        <a href="{{ route('admin.ehelp.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">E-Help</span></a>
                    </li>

                    <li class="nav-label">Govt. Office</li>
                    <li>
                        <a href="{{ route('admin.govtoffice.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Govt. Office</span></a>
                    </li>

                    <li class="nav-label">Job</li>
                    <li>
                        <a href="{{ route('admin.job.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Job</span></a>
                    </li>

                    <li class="nav-label">Training Center</li>
                    <li>
                        <a href="{{ route('admin.trainingcenter.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Traing Center</span></a>
                    </li>

                    <li class="nav-label">Helpline</li>
                    <li>
                        <a href="{{ route('admin.helpline.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Helpline</span></a>
                    </li>

                    <li class="nav-label">Business</li>
                    <li>
                        <a href="{{ route('admin.businesstype.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Business Type</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.businessidea.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Business Idea</span></a>
                    </li>

                    <li class="nav-label">Library</li>
                    <li>
                        <a href="{{ route('admin.library.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Library</span></a>
                    </li>

                    <li class="nav-label">Educational Institute</li>
                    <li>
                        <a href="{{ route('admin.educationalinstitute.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Educational Institute</span></a>
                    </li>

                    <li class="nav-label">Train Ticket</li>
                    <li>
                        <a href="{{ route('admin.trainroute.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Train Route</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.trainclass.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Train Class</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.train.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Train</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.trainticket.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Train Ticket</span></a>
                    </li>

                    <li class="nav-label">Hotel</li>
                    <li>
                        <a href="{{ route('admin.hotel.index') }}" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Hotel</span></a>
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
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p> 
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

    <script src="{{ asset('assets/backend/vendor/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>

    <script type="text/javascript">
        //ajax csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#image').change(function(){
            const file = this.files[0];
            console.log(file);
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                    console.log(event.target.result);
                    $('#imgPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        $(".single-select").select2();
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