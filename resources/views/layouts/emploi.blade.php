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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.min.css') }}">
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

                    </div>
                </div>
            </div>
        </div>
        <!--/ bradcam_area  -->


        <!-- START JOB-GRID -->
        <section class="section">
            <div class="container">
                <div class="row">

                    @if (!empty($allJob))
                    @foreach ($allJob as $row)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="card job-grid-box">
                            <div class="card-body p-4">

                                <div>
                                    <a href="{{ route('job_details', ['job_id'=>$row->id]) }}"><img src="https://familiapro.akpany.ci/assets/ns/images/favicon.ico" alt="" class="img-fluid rounded-3"></a>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('job_details', ['job_id'=>$row->id]) }}" class="primary-link">
                                        <h5 class="fs-17 mb-1">{{$row->intitule_poste}}</h5>
                                    </a>
                                    <p class="text-muted"><span class="material-icons">place</span>{{$row->localisation}}</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="badge bg-soft-success fs-13 mt-1">{{$row->remuneration}}</span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="badge bg-soft-purple fs-13 mt-1">{{$row->secteur_activite}}</span>
                                        </li>
                                        <!-- <li class="list-inline-item">
                                                        <span class="badge bg-soft-blue fs-13 mt-1">Developer</span>
                                                    </li> -->
                                    </ul>
                                </div>
                                <div class="job-grid-content mt-3">
                                    <p class="text-muted">{{$row->description_poste}}</p>
                                    <div class="d-flex align-items-center justify-content-between mt-4 border-top pt-3">
                                        <p class="text-muted float-start mb-0">Date: {{$row->date_limite}}</p>
                                        <div class="text-end">
                                            <a href="{{ route('job_details', ['job_id'=>$row->id]) }}" class="boxed-btn3">Postuler</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end job-grid-box-->
                    </div><!--end col-->
                    @endforeach
                    @else
                    @endif

                </div><!--end container-->
        </section>
        <!-- END JOB-GRID -->


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