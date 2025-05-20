<div class="page-content">
    <!-- Banner  -->
    <div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark"
        style="background-image: url(assets/images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1>Se Connecter</h1>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row m-t15">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Connecter</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Map Iframe -->
    <section class="map-wrapper1 overflow-hidden  content-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5 m-b30">
                    <div class="info-box style-1 ">
                        <div class="info">
                            <h2 class="text-light wow fadeInUp" data-wow-delay="0.6s">Connectez-vous</h2>
                            {{-- <p class="wow fadeInUp" data-wow-delay="0.8s">Fill up the form and our team will get<br>
                                back to you within 24 hours.</p> --}}
                        </div>

                        <div class="widget widget_about">
                            <div class="widget widget_getintuch">
                                <ul class="list-unstyled text-white">
                                    <li class="d-flex mb-3 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="text-white"><strong>Trouvez l'emploi idéal :</strong> des milliers
                                            d'offres dans tous
                                            les secteurs.</span>
                                    </li>
                                    <li class="d-flex mb-3 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="text-white"><strong>Valorisez votre profil :</strong> CV en ligne,
                                            compétences,
                                            expériences.</span>
                                    </li>
                                    <li class="d-flex mb-3 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="text-white"><strong>Recruteurs vérifiés :</strong> entreprises
                                            sérieuses et
                                            partenaires fiables.</span>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="text-white"><strong>Alertes personnalisées :</strong> offres
                                            ciblées par email selon
                                            vos critères.</span>
                                    </li>
                                    <li class="d-flex mb-3 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" stroke="#198754" stroke-width="2" class="me-3 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
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
                    <div class="form-wrapper style-1">
                        <h2 class="title m-a0 wow fadeInUp" data-wow-delay="1.6s">Connexion</h2>
                        <p class="font-text text-primary p-b10 wow fadeInUp" data-wow-delay="1.7s">Nous sommes là pour
                            vous. Comment pouvons-nous vous aider ?</p>
                        <div class="contact-area">

                            {{-- Message d'erreur général --}}
                            @if ($errorMessage)
                                <div class="alert alert-danger small mb-3">{{ $errorMessage }}</div>
                            @endif

                            {{-- Erreurs de validation --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mb-3">
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Formulaire de connexion --}}
                            <form wire:submit.prevent="logincandidat" x-data="{ showPassword: false }" class="vstack gap-3">

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="form-label">Adresse email</label>
                                    <input id="email" type="email" wire:model.defer="email" class="form-control"
                                        placeholder="Entrez votre adresse email" autocomplete="email" />
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Mot de passe --}}
                                <div>
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <div class="input-group">
                                        <input :type="showPassword ? 'text' : 'password'" id="password"
                                            wire:model.defer="password" class="form-control"
                                            placeholder="Entrez votre mot de passe" autocomplete="current-password" />
                                        <button type="button" class="btn btn-outline-secondary"
                                            @click="showPassword = !showPassword"
                                            aria-label="Afficher/Masquer le mot de passe">
                                            <span x-show="!showPassword">👁️</span>
                                            <span x-show="showPassword">🙈</span>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror

                                    {{-- Lien mot de passe oublié --}}
                                    <div class="text-end mt-1">
                                        <a href="{{route('password.request')}}"
                                            class="text-decoration-none small">Mot de passe oublié ?</a>
                                    </div>
                                </div>

                                {{-- Bouton soumettre --}}
                                <div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        Se connecter
                                    </button>
                                </div>

                                {{-- Lien inscription --}}
                                <div class="text-center small mt-2">
                                    Pas encore inscrit ? <a href="{{ route('inscrire') }}"
                                        class="text-decoration-none">Créez un compte</a>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

</section>
<!-- Map Iframe End -->
</div>
