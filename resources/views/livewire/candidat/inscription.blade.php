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
                        <li class="breadcrumb-item active" aria-current="page">Inscription</li>
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
                        <div class="card-header bg-primary text-white rounded-top-4 py-3">
                            <h4 class="mb-0 text-white d-flex align-items-center">
                                <i class="fas fa-user-lines  me-2 fs-4"></i> Inscription Candidat
                            </h4>
                        </div>
                            <div class="card-body p-4">
                                <form wire:submit.prevent="submit">
                                    <div class="row g-4">
                                        <div class="mt-4">
                                            @if (session()->has('success'))
                                                <div class="alert alert-success alert-dismissible fade show"
                                                    role="alert">
                                                    {{ session('success') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Fermer"></button>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- Nom -->
                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label fw-semibold"><i
                                                    class="fas fa-user me-1"></i>Nom</label>
                                            <input type="text" wire:model.lazy="nom_candidat" class="form-control"
                                                placeholder="Ex : Traoré">
                                            @error('nom_candidat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Prénom -->
                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label fw-semibold"><i
                                                    class="fas fa-user me-1"></i>Prénom</label>
                                            <input type="text" wire:model.lazy="prenom_candidat"
                                                class="form-control" placeholder="Ex : Mohamed">
                                            @error('prenom_candidat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Date de naissance -->
                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label fw-semibold"><i
                                                    class="fas fa-calendar-alt me-1"></i>Date de
                                                naissance</label>
                                            <input type="date" wire:model.lazy="datenaissance_candidat"
                                                class="form-control">
                                            @error('datenaissance_candidat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Sexe -->
                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label fw-semibold"><i
                                                    class="fas fa-venus-mars me-1"></i>Sexe</label>
                                            <select wire:model.lazy="sexe_candidat" class="form-control">
                                                <option value="">Sélectionnez...</option>
                                                <option value="M">Masculin</option>
                                                <option value="F">Féminin</option>
                                            </select>
                                            @error('sexe_candidat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-lg-6 col-md-6">
                                            <label class="form-label fw-semibold"><i
                                                    class="fas fa-envelope me-1"></i>Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input type="email" wire:model.lazy="email" class="form-control"
                                                    placeholder="exemple@mail.com">
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Téléphone -->
                                        <div class="col-lg-6 col-md-6">
                                            <label class="form-label fw-semibold"><i
                                                    class="fas fa-phone me-1"></i>Téléphone</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                <input type="text" wire:model.lazy="tel_candidat"
                                                    class="form-control" placeholder="Ex : +223 70000000">
                                            </div>
                                            @error('tel_candidat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Mot de passe -->
                                        <div class="col-lg-6 col-md-6">
                                            <label class="form-label fw-semibold"><i class="fas fa-lock me-1"></i>Mot
                                                de passe</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" wire:model.lazy="password"
                                                    class="form-control" placeholder="********">
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Confirmation mot de passe -->
                                        <div class="col-lg-6 col-md-6">
                                            <label class="form-label fw-semibold"><i
                                                    class="fas fa-lock me-1"></i>Confirmation</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" wire:model.lazy="password_confirmation"
                                                    class="form-control" placeholder="********">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary rounded-pill px-5 shadow-sm">
                                            <i class="fas fa-check-circle me-2"></i>Créer mon compte
                                        </button>
                                    </div>
                                </form>
                            </div>


                    </div>
                </div>
            </div>

        </section>

    </div>


</div>



