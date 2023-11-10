<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

    <!-- custom - css include -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"

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
                    <img src="{{ asset('assets/images/logo_akpany-removebg-preview.png') }}" alt="Logo">

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


    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <!-- <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Software Engineer</h3>
                    </div>
                </div> -->
        </div>
    </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">

                                <div class="jobs_conetent">
                                    <a href="#">
                                        <h4>{{ $job->intitule_poste }}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location" style="display: flex;">
                                            <span class="material-icons">place</span>
                                            <p style="margin-left: 10px;">{{$job->localisation}}</p>
                                        </div>
                                        <!-- Bouton de partage -->
                                        <button id="shareBtn" class="bouton">Partager</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Description du poste</h4>
                            <p>{{ $job->description_poste }}</p>
                        </div>
                        <div class="single_wrap">
                            <h4>Missions</h4>
                            <ul>
                                @foreach ($missions as $index => $row)
                                <li>{{ $row }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="apply_job_form white-bg">
                        <h4>Postuler à l'offre</h4>
                        {{-- formulaire de soumissions --}}
                        <form action="{{ route('candidature')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Votre nom" name="nom" id="nom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Votre prenom" name="prenom" id="prenom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Email" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Votre contact" name="numero" id="numero">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Votre lieu de résidence" name="lieu_residence" id="lieu_residence">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Votre niveau" name="niveau" id="niveau">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="lettre" id="" cols="30" rows="10" placeholder="Lettrre de motivation..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" id="inputGroupFileAddon03"><span class="material-icons">upload</span></button>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" id="inputGroupFile03" name="cv_pdf" accept=".pdf">
                                            <!-- <label class="custom-file-label" for="inputGroupFile03">Sélectionner
                                                CV</label> -->
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="emploi_id" value="{{$job->id}}" id="emploi_id">
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Postuler</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- fin formulaire de soumission --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Résumé</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Date de publication: <span> {{ $job->date_publication }} </span></li>
                                <li>Date limite: <span>{{ $job->date_limite }}</span></li>
                                <li>Niveau d'étude: <span>{{ $job->niveau_etude }}</span></li>
                                <li>Secteur d'activité: <span>{{ $job->secteur_activite }}</span></li>
                                <li>Remunération: <span> {{ $job->remuneration }}</span></li>
                                <li>Catégorie: <span> {{ $categorie }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Récupérez l'élément d'input de type fichier
        const cvFileInput = document.getElementById('cvFile');

        // Vérifiez l'extension du fichier lors de la soumission du formulaire
        document.querySelector('form').addEventListener('submit', function(event) {
            const allowedExtensions = /(\.pdf)$/i;

            if (!allowedExtensions.exec(cvFileInput.value)) {
                // Affichez un message d'erreur si l'extension n'est pas autorisée
                event.preventDefault(); // Empêche la soumission du formulaire
                alert("Veuillez sélectionner un fichier PDF pour le CV.");
                return false;
            }
        });
    </script>

    <script>
        // Récupération de l'URL de l'emploi sélectionné
        var jobUrl = window.location.href;

        // Ajout de l'événement au bouton de partage
        document.getElementById('shareBtn').addEventListener('click', function() {
            // Vérification si l'API Navigator.share est disponible
            if (navigator.share) {
                navigator.share({
                    title: 'Offre d\'emploi',
                    url: jobUrl
                }).then(() => {
                    console.log('Lien partagé avec succès.');
                }).catch((error) => {
                    console.error('Erreur lors du partage : ', error);
                });
            } else {
                // Si l'API n'est pas disponible, afficher un message d'erreur ou utiliser une autre méthode de partage
                console.error('L\'API de partage n\'est pas prise en charge dans ce navigateur.');
                // Vous pouvez ajouter ici une alternative pour le partage, par exemple, copier le lien dans le presse-papiers
            }
        });
    </script>

    <script>
        // Sélectionnez le bouton de partage par son ID
        var shareBtn = document.getElementById('shareBtn');

        // Ajoutez un gestionnaire d'événements pour le clic sur le bouton de partage
        shareBtn.addEventListener('click', function() {
            // Récupérez l'URL de l'emploi sélectionné
            var jobUrl = window.location.href;

            // Créez un élément de texte temporaire avec le format HTML contenant le lien
            var tempInput = document.createElement('textarea');
            tempInput.value = '<a href="' + jobUrl + '">Cliquez ici pour voir l\'offre d\'emploi</a>';

            // Ajoutez l'élément au DOM
            document.body.appendChild(tempInput);

            // Sélectionnez le texte dans l'élément de texte
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // Pour les appareils mobiles

            // Copiez le texte formaté en HTML dans le presse-papiers
            document.execCommand('copy');

            // Supprimez l'élément de texte temporaire
            document.body.removeChild(tempInput);

            // Affichez un message indiquant que l'URL a été copiée avec succès
            Swal.fire({
                icon: 'success',
                title: 'Lien copié avec succès !',
                text: 'Le lien vers l\'offre d\'emploi a été copié dans le presse-papiers.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        });
    </script>
@if (Session::has('success'))
        <script>
            toastr.success("{{Session::get('success')}}");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error("{{Session::get('error')}}");
        </script>
    @endif



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

    <style scoped>
        .bouton {
            color: white;
            background-color: #00c9a7;
            /* Couleur bleue comme exemple, vous pouvez ajuster la couleur selon vos préférences */
            padding: 10px 20px;
            text-decoration: none;
            margin-left: 180%;
            margin-bottom: 30px;
        }
    </style>