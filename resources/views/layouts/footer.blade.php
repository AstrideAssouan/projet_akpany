<footer id="footer" class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 50px; width: 200px;">
                            </a>
                        </div>
                        <p>
                            <a href="https://akpany.ci">akpany.ci</a><br>
                            Riviera Palmeraie, Fin de la rue Rose Marie Guiraud, SIPIM 1
                            Abidjan, Côte d'Ivoire<br>
                            +225 27-22-23-52-15 <br>

                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/akpany/?locale=fr_FR">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/akpany/">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/akpany_software_media/">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-12 col-lg-2">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                        <h3 class="footer_title">
                            Liens utiles
                        </h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Réalisations</a></li>
                            <li><a href="#">Equipe</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <h3 class="footer_title">
                            Services
                        </h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Développement d'applications</a></li>
                            <li><a href="#">Couverture évenementielle</a></li>
                            <li><a href="#">Conception graphique</a></li>
                            <li><a href="#">Hébergement web</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                        <h3 class="footer_title">
                            Contactez-nous
                        </h3>
                        <form action="{{ route('subscribe') }}" class="newsletter_form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="email" name="email" placeholder="Entrez votre email" required>
                            <button type="submit">Envoyer</button>
                        </form>

                        <p class="newsletter_text">Soyez parmis les premiers à être informés des nouveautés, offres et campagnes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

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