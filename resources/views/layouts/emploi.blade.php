<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/gijgo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slicknav.css') }}">

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!-- header-start -->
    @include('layouts.header')
    <!-- header-end -->

    <!-- sidebar mobile menu - start -->
    <div class="sidebar-menu-wrapper">
        <div id="sidebar-menu" class="sidebar-menu">

            <span class="close-btn">
                <i class="las la-times"></i>
            </span>

            <div class="brand-logo text-center clearfix">
                <a href="index.html" class="brand-link">
                    <img src="assets/images/logo_akpany-removebg-preview.png" alt="logo_not_found">
                </a>
            </div>


            <div class="menu_list ul-li-block clearfix">
                <h3 class="widget-title">Menu</h3>

                <ul class="clearfix">
                    <li class="active dropdown">
                        <a href="#!">Accueil</a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html">Services</a></li>
                            <!-- <li><a href="index-2.html">Home V.2</a></li> -->
                        </ul>
                    </li>
                    <li><a href="#!">Réalisations</a></li>

                    <li><a href="{{ url('emploi') }}">Offres d'emploi</a></li>


                    <li><a href="#!">Equipe</a></li>


                    <li><a href="#!">Contact</a></li>
                </ul>
            </div>




        </div>
        <div class="overlay"></div>
    </div>

    <body class="home-v1">

        <div id="ds-preloader"></div>




        <!-- bradcam_area  -->
        <div class="bradcam_area bradcam_bg_1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- <div class="bradcam_text">
                        <h3>4536+ Jobs Available</h3>
                    </div> -->

                    </div>
                </div>
            </div>
        </div>
        <!--/ bradcam_area  -->

        <!-- job_listing_area_start  -->
        <div class="job_listing_area plus_padding">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="job_filter white-bg">
                            <div class="form_inner white-bg">
                                <h3>Filter</h3>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="single_field">
                                                <input type="text" placeholder="Search keyword">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_field">
                                                <select class="wide">
                                                    <option data-display="Location">Location</option>
                                                    <option value="1">Rangpur</option>
                                                    <option value="2">Dhaka </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_field">
                                                <select class="wide">
                                                    <option data-display="Category">Category</option>
                                                    <option value="1">Category 1</option>
                                                    <option value="2">Category 2 </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_field">
                                                <select class="wide">
                                                    <option data-display="Experience">Experience</option>
                                                    <option value="1">Experience 1</option>
                                                    <option value="2">Experience 2 </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_field">
                                                <select class="wide">
                                                    <option data-display="Job type">Job type</option>
                                                    <option value="1">full time 1</option>
                                                    <option value="2">part time 2 </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_field">
                                                <select class="wide">
                                                    <option data-display="Qualification">Qualification</option>
                                                    <option value="1">Qualification 1</option>
                                                    <option value="2">Qualification 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single_field">
                                                <select class="wide">
                                                    <option data-display="Gender">Gender</option>
                                                    <option value="1">male</option>
                                                    <option value="2">female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="reset_btn">
                                <button class="boxed-btn3 w-100" type="submit">Rechercher</button>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-9">

                        <div class="job_lists m-0">
                            <div class="row">
                                @if (!empty($allJob))
                                    @foreach ($allJob as $row)
                                        <div class="col-lg-12 col-md-12">
                                            <div class="single_jobs white-bg d-flex justify-content-between">
                                                <div class="jobs_left d-flex align-items-center">
                                                    <div class="thumb">
                                                        <img src="https://familiapro.akpany.ci/assets/ns/images/favicon.ico"
                                                            alt="">
                                                    </div>
                                                    <div class="jobs_conetent">
                                                        <a href="{{ route('job_details', ['job_id'=>$row->id]) }}">
                                                            <h4>{{$row->intitule_poste}}</h4>
                                                        </a>
                                                        <div class="links_locat d-flex align-items-center">
                                                            <div class="location">
                                                                <p><span class="material-icons">map</span>{{$row->localisation}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jobs_right">
                                                    <div class="apply_now">
                                                        <!-- <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a> -->
                                                        <a href="{{ route('job_details', ['job_id'=>$row->id]) }}"
                                                            class="boxed-btn3">Postuler</a>
                                                    </div>
                                                    <div class="date">
                                                        <p>Date line: {{$row->date_limite}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job_listing_area_end  -->

        <!-- footer-section - start
  ================================================== -->
        @include('layouts.footer')
        <!-- footer-section - end
  ================================================== -->

        <!-- link that opens popup -->
        <!-- jquery include -->
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel2.thumbs.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/countdown.js') }}"></script>


        <!-- mobile menu - jquery include -->
        {{-- <script src="{{asset('assets/js/mCustomScrollbar.js')}}"></script> --}}

        <!-- custom - jquery include -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <!-- <script src="js/vendor/modernizr-3.5.0.min.js"></script> -->
        <!-- <script src="assets/js/vendor/jquery-1.12.4.min.js"></script> -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/scrollIt.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ asset('assets/js/init.js') }}"></script>




        <script>
            $(function() {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 24600,
                    values: [750, 24600],
                    slide: function(event, ui) {
                        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1] + "/ Year");
                    }
                });
                $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                    " - $" + $("#slider-range").slider("values", 1) + "/ Year");
            });
        </script>
