<div class="page-content">
    <!-- Banner  -->
    <div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark"
        style="background-image: url(assets/images/banner/bnr1.jpg);margin-top:9px;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h4 class="text-white">Detail de {{ $emploi->titre_emplois }}</h4>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row m-t15">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- Blog Details -->
    <section class="content-inner position-relative mt-4">
        <div class="container">
            <div class="row ">
                <div class="col-xl-8 col-lg-8 ">
                    <div class="blog-single pt-20 sidebar dz-card">
                        {{-- <div class="dz-media dz-media-rounded rounded">
								<img src="{{asset('frontend/assets/images/blog/large/pic2.jpg')}}" alt="">
							</div> --}}
                        <div class="dz-info m-b30">
                            <div class="job-detail-content">
                                <h3 class="dz-title">{{ $emploi->titre_emplois }}<span class="job-duration">/
                                        {{ $emploi->typecontrat->nom_type_contrat ?? 'N/A' }}</span> </h3>
                                <p class="job-address"><i
                                        class="fa-solid fa-location-dot text-primary"></i>{{ $emploi->lieu_emplois }}
                                </p>
                                <div class="income">
                                    @if ($dateExpiree)
                                        <div class="alert alert-warning">
                                            La date limite pour postuler à cette offre est dépassée.
                                        </div>
                                    @else
                                        @guest('candidat')
                                            <a href="#candidatpostuler"
                                                class="btn btn-outline-primary btn-lg px-4">Postuler</a>
                                        @else
                                            <a href="{{ route('candidat.postuler', $emploi->id) }}"
                                                class="btn btn-outline-primary btn-lg px-4">Postuler</a>
                                        @endguest
                                    @endif

                                </div>
                            </div>

                            <div class="dz-post-text">
                                <h4 class="title">Description de l'emploi:</h4>
                                <p>{{ $emploi->description_emplois }}</p>

                                {{-- <h4 class="title">Exigences:</h4>
                                <ul class="m-b30"> --}}
                                    {{-- <li>Must be able to communicate with others to convey information effectively.</li>
                                    <li>Personally passionate and up to date with current trends and technologies,
                                        committed to quality and comfortable working with adult media.</li>
                                    <li>Rachelor or Master degree level educational background.</li>
                                    <li>4 years relevant PHP dev experience.</li>
                                    <li>Troubleshooting, testing and maintaining the core product software and
                                        databases.</li> --}}
                                {{-- </ul> --}}
                                {{-- <h4 class="title">
                                    Responsabilités:</h4>
                                <ul class="m-b30"> --}}
                                    {{-- <li>Establish and promote design guidelines, best practices and standards.</li>
                                    <li>Accurately estimate design tickets during planning sessions.</li>
                                    <li>Partnering with product and engineering to translate business and user goals
                                        into elegant and practical designs. that can deliver on key business and user
                                        metrics.</li>
                                    <li>Create wireframes, storyboards, user flows, process flows and site maps to
                                        communicate interaction and design.</li>
                                    <li>Present and defend designs and key deliverables to peers and executive level
                                        stakeholders.</li>
                                    <li>Execute all visual design stages from concept to final hand-off to engineering.
                                    </li> --}}
                                {{-- </ul> --}}
                            </div>
                            {{-- <h4 class="title">Social Profile:</h4>
                            <div class="dz-share-post">
                                <div class="dz-social-icon dark">
                                    <ul>
                                        <li><a target="_blank" class="fab fa-facebook-f"
                                                href="https://www.facebook.com/dexignzone/"></a></li>
                                        <li><a target="_blank" class="fab fa-instagram"
                                                href="https://www.instagram.com/dexignzone/"></a></li>
                                        <li><a target="_blank" class="fab fa-twitter"
                                                href="https://twitter.com/dexignzones"></a></li>
                                        <li><a target="_blank" class="fab fa-youtube"
                                                href="https://www.youtube.com/channel/UCGL8V6uxNNMRrk3oZfVct1g"></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> --}}
                        </div>
                    </div>


                </div>
                <div class="col-xl-4 col-lg-4">
                    <aside class="side-bar sticky-top right ">

                        <div class="widget-title">
                            <h4 class="title">Informations sur l'emploi</h4>
                        </div>

                        <div class="widget widget_categories style-2">
                            <ul>

                                <li>
                                    <div class="info-inner">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span class="title">DATE LIMITE</span>
                                        <div class="info-discription">
                                            {{ \Carbon\Carbon::parse($emploi->date_fin_emplois)->locale('fr')->translatedFormat('d F Y') }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-inner">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span class="title">EMPLACEMENT</span>
                                        <div class="info-discription">{{ $emploi->region->nom_regions }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-inner">
                                        <i class="fas fa-user-tie"></i>
                                        <span class="title">TITRE D'EMPLOI</span>
                                        <div class="info-discription">{{ $emploi->titre_emplois }}</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-inner">
                                        <i class="fas fa-clock"></i>
                                        <span class="title">EXPÉRIENCE</span>
                                        <div class="info-discription">
                                            {{ $emploi->niveauglobalexperience->nom_niveau_global_experience ?? 'N/A' }}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-inner">
                                        <i class="fas fa-suitcase"></i>
                                        <span class="title">TYPR DE CONTRAT</span>
                                        <div class="info-discription">
                                            {{ $emploi->typecontrat->nom_type_contrat ?? 'N/A' }}</div>
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="info-inner">
                                        <i class="fas fa-venus-mars"></i>
                                        <span class="title">GENDER</span>
                                        <div class="info-discription">Male</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-inner">
                                        <i class="fas fa-money-bill-wave"></i>
                                        <span class="title">OFFERED SALARY</span>
                                        <div class="info-discription">$2,500/ MONTH</div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>


                        {{-- <div class="widget widget_tag_cloud">
                            <div class="widget-title">
                                <h4 class="title">Popular Tags</h4>
                            </div>
                            <div class="tagcloud">
                                <a href="javascript:void(0);">General</a>
                                <a href="javascript:void(0);">Payment</a>
                                <a href="javascript:void(0);">Jobs </a>
                                <a href="javascript:void(0);">Application</a>
                                <a href="javascript:void(0);">Work</a>
                                <a href="javascript:void(0);">Recruiting</a>
                                <a href="javascript:void(0);">Income</a>
                                <a href="javascript:void(0);">Employer</a>
                            </div>
                        </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details -->
    <section class="">
        <div class="container">
            <div class="row ">
                <div class="col-xl-8 col-lg-8 ">
                    <div id="candidatpostuler" class=" mt-2">
                        <form wire:submit.prevent="submit" enctype="multipart/form-data" class="needs-validation">

                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            {{-- Étape 1 --}}
                            @if ($step === 1)
                                <div class="card shadow-sm p-4 border-0">
                                    <h4 class="text-primary fw-bold mb-3">
                                        <i class="fa fa-id-card me-2"></i>Étape 1 : Informations personnelles
                                    </h4>

                                    <div class="row">
                                        {{-- Nom --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nom</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                <input type="text" wire:model.defer="nom_candidat"
                                                    class="form-control" placeholder="Entrez votre nom">
                                            </div>
                                            @error('nom_candidat')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Prénom --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Prénom</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                <input type="text" wire:model.defer="prenom_candidat"
                                                    class="form-control" placeholder="Entrez votre prénom">
                                            </div>
                                            @error('prenom_candidat')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Email --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                <input type="email" wire:model.defer="email" class="form-control"
                                                    placeholder="exemple@mail.com">
                                            </div>
                                            @error('email')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Téléphone --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Téléphone</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                <input type="text" wire:model.defer="tel_candidat"
                                                    class="form-control" placeholder="+223 70 00 00 00">
                                            </div>
                                            @error('tel_candidat')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Sexe --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Sexe</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                                                <select wire:model.defer="sexe_candidat" class="form-select">
                                                    <option value="">-- Sélectionner --</option>
                                                    <option value="M">Homme</option>
                                                    <option value="F">Femme</option>
                                                </select>
                                            </div>
                                            @error('sexe_candidat')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Date de naissance --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Date de naissance</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fa fa-calendar-days"></i></span>
                                                <input type="date" wire:model.defer="datenaissance_candidat"
                                                    class="form-control">
                                            </div>
                                            @error('datenaissance_candidat')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- CV --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">CV (PDF ou DOC)</label>
                                            <input type="file" wire:model="cv_candidat" class="form-control">
                                            @error('cv_candidat')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-end mt-4">
                                        @if ($dateExpiree)
                                            <div class="alert alert-warning">
                                                La date limite pour postuler à cette offre est dépassée.
                                            </div>
                                        @else
                                            <button type="button" wire:click="nextStep" class="btn btn-primary">
                                                Suivant <i class="fa fa-arrow-right ms-1"></i>
                                            </button>
                                        @endif

                                    </div>
                                </div>

                                {{-- Étape 2 --}}
                            @elseif ($step === 2)
                                <div class="card shadow-sm p-4 border-0">
                                    <h4 class="text-primary fw-bold mb-3">
                                        <i class="fa fa-briefcase me-2"></i>Étape 2 : Informations professionnelles
                                    </h4>

                                    <div class="row">
                                        {{-- Niveau d'étude --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Niveau d'étude</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fa fa-graduation-cap"></i></span>
                                                <select wire:model.defer="niveau_etude_id" class="form-select">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($niveaux_etude as $label)
                                                        <option value="{{ $label->id }}">
                                                            {{ $label->nom_niveau_etude }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('niveau_etude_id')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Niveau d'expérience --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Niveau d'expérience</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-chart-bar"></i></span>
                                                <select wire:model.defer="niveau_global_experience_id"
                                                    class="form-select">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($niveaux_experience as $label)
                                                        <option value="{{ $label->id }}">
                                                            {{ $label->nom_niveau_global_experience }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('niveau_global_experience_id')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Métier --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Métier</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-suitcase"></i></span>
                                                <select wire:model.defer="metier_id" class="form-select">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($metiers as $label)
                                                        <option value="{{ $label->id }}">{{ $label->nom_metier }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('metier_id')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Lettre de motivation --}}
                                    <div class="accordion mt-4" id="accordionLettreMotivation">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingLettreMotivation">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseLettreMotivation" aria-expanded="false"
                                                    aria-controls="collapseLettreMotivation">
                                                    Lettre de motivation (facultatif)
                                                </button>
                                            </h2>
                                            <div id="collapseLettreMotivation" class="accordion-collapse collapse"
                                                aria-labelledby="headingLettreMotivation"
                                                data-bs-parent="#accordionLettreMotivation">
                                                <div class="accordion-body">
                                                    <textarea wire:model.defer="lettre_motivation" id="lettre_motivation" rows="6" class="form-control"
                                                        placeholder="Exprimez votre motivation..."></textarea>
                                                    @error('lettre_motivation')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($dateExpiree)
                                        <div class="alert alert-warning">
                                            La date limite pour postuler à cette offre est dépassée.
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" wire:click="previousStep"
                                                class="btn btn-outline-secondary">
                                                <i class="fa fa-arrow-left me-1"></i> Précédent
                                            </button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check-circle me-1"></i> Soumettre
                                            </button>
                                        </div>
                                    @endif

                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
