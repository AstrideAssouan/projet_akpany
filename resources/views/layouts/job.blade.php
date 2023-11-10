<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" type="text/css" href="assets/css/app.min.css">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>



<section class="job_listing_area sec-ptb-100 decoration-wrap clearfix">
    <div class="container">
        <div class="section-title text-center mb-70">
            <h2 class="title-text mb-3">Les dernières offres</h2>
            <p class="mb-0">Vous êtes en quête d'expérience professionnelle ? Rejoignez-nous donc !</p>
        </div>
        <div class="job_lists">
            <div class="row">

                @if (!empty($emploi))
                @foreach ($emploi as $row)
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
                    </div>
                @endforeach

                @if (count($emploi) >= 3)
                <div class="col-md-7">
                    <div class="brouse_job text-right">
                        <a href="{{ route('all_job') }}" class="boxed-btn4" style="margin-top: 50px;">Voir plus</a>
                    </div>
                </div>
                @endif

                @else
                <div class="col-lg-12 d-flex justify-content-center">
                    <p class="text-muted">Aucune offre disponible pour l'instant</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
