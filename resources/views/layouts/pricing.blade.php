<section id="pricing">

    <div class="container">

        <div class="section-title text-center mb-70">
            <h2 class="title-text mb-3">NOS SERVICES</h2>
            <p class="mb-0">Des offres spécialement conçues pour répondre à vos besoins</p>
        </div>
        @foreach ($services as $item)
            <article class="center">
                <div class="num-price verticalize verticalize--full">
                    <h4 class="verticalize__box">A PARTIR DE:<br /></h4>
                    @foreach ($type_services as $row)
                    @if ($item->id_type_ser === $row->id)
                        <h2><strong>{{$row->tarif}} F </strong></h2>
                    @endif
                    @endforeach
                    <div class="categorie_service" style="text-transform:uppercase;">
                    <h4><strong>{{ $item->typeService->libelle_type_ser }}</strong></h4>
                    </div>
                </div>
                <p>
                <form style="line-height:16px; font-size:16px">
                    {{$item->intitule_ser}}
                </form>
                </p>
                <a type="button" href="#exampleModal" id="modal" class="btn1 btn--blue medium"
                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-backdrop="false">DEMARRER</a>
            </article>
        @endforeach




        <!-- {{-- <article class="center">
            <div class="num-price verticalize verticalize--full">
                <h4 class="verticalize__box">A PARTIR DE:<br /></h4>
                <h2><strong>99 000 F </strong></h2>
                <div class="categorie_service">
                    <h4><strong>CONCEPTION GRAPHIQUE</strong></h4>
                </div>
            </div>
            <p>
            <form style=" line-height:16px; font-size:16px">
                Site web
                statique<br /><br />
                Site web
                Dynamique<br /><br />

                Application ANDROID<br /><br />
                Application
                IOS<br /><br />
                Application de
                bureau<br /><br />
                Autres
            </form>
            </p>
            <a href="#" id="modal" class="btn1 btn--blue medium" data-bs-toggle="modal" data-bs-target="#exampleModal">DEMARRER</a>
        </article>

        <article class="center">
            <div class="num-price verticalize verticalize--full">
                <h4 class="verticalize__box">A PARTIR DE:<br /></h4>
                <h2><strong>99 000 F </strong></h2>
                <div class="categorie_service">
                    <h4><strong>COUVERTURE EVENEMENTIELLE</strong></h4>
                </div>
            </div>
            <p>
            <form style=" line-height:16px; font-size:16px">
                Site web
                statique<br /><br />
                Site web
                Dynamique<br /><br />

                Application ANDROID<br /><br />
                Application
                IOS<br /><br />
                Application de
                bureau<br /><br />
                Autres
            </form>
            </p>
            <a href="#" id="modal" class="btn1 btn--blue medium" data-bs-toggle="modal" data-bs-target="#exampleModal">DEMARRER</a>
        </article>

        <article class="center">
            <div class="num-price verticalize verticalize--full">
                <h4 class="verticalize__box">A PARTIR DE:<br /></h4>
                <h2><strong>99 000 F </strong></h2>
                <div class="categorie_service">
                    <h4><strong>HEBERGEMENT WEB</strong></h4>
                </div>
            </div>
            <p>
            <form style=" line-height:16px; font-size:16px">
                Site web
                statique<br /><br />
                Site web
                Dynamique<br /><br />

                Application ANDROID<br /><br />
                Application
                IOS<br /><br />
                Application de
                bureau<br /><br />
                Autres
            </form>
            </p>
            <a href="#" id="modal" class="btn1 btn--blue medium" data-bs-toggle="modal" data-bs-target="#exampleModal">DEMARRER</a>
        </article> --}} -->




    </div>


</section>
