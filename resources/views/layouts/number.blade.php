<head>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.min.css') }}"> -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>


<section id="blog">
    <div class="funfact-section d-flex flex-column justify-content-center">
        <div class="container-fluid p-0">
            <div class="row no-gutters counters align-items-center">
                <div class="col-lg-3 col-6">
                    <div class="single-fun-fact-wrap" data-aos="fade-up" data-aos-delay="100">
                        <div class="counter-area" id="lines1">
                            <strong class="counter">10</strong>
                        </div>
                        <div class="counter-content">
                            <h3 class="title">ans d'expérience</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 item">
                    <div class="single-fun-fact-wrap" data-aos="fade-up" data-aos-delay="300">
                        <div class="counter-area" id="lines2">
                            <strong class="counter">
                                +10
                            </strong>
                        </div>
                        <div class="counter-content">
                            <h3 class="title">Employés</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="single-fun-fact-wrap" data-aos="fade-up" data-aos-delay="600">
                        <div class="counter-area" id="lines3">
                            <strong class="counter">+100</strong>
                             </div>
                                <div class="counter-content">
                                    <h3 class="title">Projets réalisés</h3>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="single-fun-fact-wrap" data-aos="fade-up" data-aos-delay="900">
                            <div class="counter-area" id="lines4">
                                <strong class="counter">+100</strong>
                            </div>
                            <div class="counter-content">
                                <h3 class="title">Clients satisfaits</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Ajoutez cet extrait de code dans votre balise <script> ou dans un fichier JavaScript externe -->
<script>
    // Initialisez AOS
    AOS.init();

    // Fonction pour animer le décompte progressif
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        const speed = 200; // Vitesse de l'animation en millisecondes

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const increment = Math.ceil(target / speed);

            let currentValue = 0;

            // Fonction pour mettre à jour le compteur progressivement
            function updateCount() {
                currentValue += increment;
                counter.innerText = currentValue;

                // Vérifier si le compteur a atteint la cible
                if (currentValue < target) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target; // Assurez-vous que la valeur finale soit exacte
                }
            }

            // Lancer l'animation du compteur
            updateCount();
        });
    }

    // Appeler la fonction pour animer les compteurs lorsque la section est visible à l'écran
    document.querySelector('#blog').addEventListener('aos:in', animateCounters);
</script>