<div class="container max-w-2xl mt-2">

    <!-- Banner  -->
    <div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark"
        style="background-image: url(assets/images/banner/bnr1.jpg);margin-top:9px;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h4 class="text-white">Inscription Candidat – Accédez aux Offres Qui Vous Correspondent</h4>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row m-t15">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Réinitialiser le mot de passe</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <div class="card shadow-lg border-0 rounded-4">

        <section class="map-wrapper1 overflow-hidden  content-inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5 m-b30">
                        <div class="info-box style-1 ">
                            <div class="info">
                                <h2 class="text-light wow fadeInUp" data-wow-delay="0.6s">inscrivez-vous</h2>
                                {{-- <p class="wow fadeInUp" data-wow-delay="0.8s">Fill up the form and our team will get<br>
                                back to you within 24 hours.</p> --}}
                            </div>

                            <div class="widget widget_about">
                                <div class="widget widget_getintuch">
                                    <ul class="list-unstyled text-white">
                                        <li class="d-flex mb-3 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-white"><strong>Trouvez l'emploi idéal :</strong> des
                                                milliers
                                                d'offres dans tous
                                                les secteurs.</span>
                                        </li>
                                        <li class="d-flex mb-3 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-white"><strong>Valorisez votre profil :</strong> CV en
                                                ligne,
                                                compétences,
                                                expériences.</span>
                                        </li>
                                        <li class="d-flex mb-3 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-white"><strong>Recruteurs vérifiés :</strong> entreprises
                                                sérieuses et
                                                partenaires fiables.</span>
                                        </li>
                                        <li class="d-flex mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-white"><strong>Alertes personnalisées :</strong> offres
                                                ciblées par email selon
                                                vos critères.</span>
                                        </li>
                                        <li class="d-flex mb-3 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-white"><strong>Protection de vos données :</strong>
                                                confidentialité
                                                garantie.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            {{-- <div class=" dz-social style-1 wow fadeInUp" data-wow-delay="0.2s">
                            <h6 class="text-light">Our Socials</h6>
                            <ul class="social-icon">
                                <li><a class="social-btn" target="_blank" href="https://www.facebook.com/dexignzone/"><i
                                            class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a class="social-btn" target="_blank"
                                        href="https://www.instagram.com/dexignzone/"><i
                                            class="fa-brands fa-instagram"></i></a></li>
                                <li><a class="social-btn" target="_blank" href="https://twitter.com/dexignzones"><i
                                            class="fa-brands fa-twitter"></i></a></li>
                                <li><a class="social-btn" target="_blank"
                                        href="https://www.youtube.com/@dexignzone1723"><i
                                            class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-sm-12 m-b30">

<div class="container mt-5">
    <h2>Réinitialiser le mot de passe</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form wire:submit.prevent="sendResetLink">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input wire:model.defer="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Envoyer le lien</button>
    </form>
</div>

                    </div>
                </div>
            </div>

        </section>

    </div>


</div>

