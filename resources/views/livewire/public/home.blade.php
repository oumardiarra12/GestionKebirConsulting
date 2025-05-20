<div>
    <div class="main-bnr bg-light">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-7 col-md-12">
                {{-- <h6 class="sub-title wow fadeInUp" data-wow-delay="0.4s">We Have 208,000+ Live Jobs</h6> --}}
                <h1 id="text"
                    class="display-4 fw-semibold text-primary text-center mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                    Le bon job. <br>Le bon candidat. <br><span class="text-success">Au bon moment.</span>
                </h1>
                <p class=" text text-primary wow fadeInUp font-w500" data-wow-delay="0.8s">Tapez votre mot-clé, puis
                    cliquez sur Rechercher pour trouver l'emploi idéal. </p>
                <div class="bnr-search-bar wow fadeInUp" data-wow-delay="1.0s">
                    <div class="row align-items-center justify-content-center">
                        {{-- <div class="col-xl-9 col-lg-8 col-md-9 col-sm-12">
									<div class="row center-line">
										<div class="col-lg-6 col-md-6 col-sm-6 ">
											<div class="search-bar">
												<span>
													<i class="fa-solid fa-magnifying-glass"></i>
												</span>
												<div class="icon-content w-100">
													<input name="dzEmail" required="required" class="form-control" placeholder="Job Title, Keywords..." type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="search-bar">
												<span>
													<i class="fa-solid fa-location-dot"></i>
												</span>
												<div class="icon-content w-100">
													<input name="dzEmail" required="required" class="form-control" placeholder="City Or Postcode" type="text">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-lg-4 col-md-3 col-sm-12  text-lg-end text-md-center text-center">
									<a class="btn btn-primary w-100" href="javascript:void(0);">Find Jobs</a>
								</div> --}}
                        <div class="card p-4 mb-5 border-0 shadow-sm bg-light">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="searchTitre" class="form-label">🔍 Titre de l'emploi</label>
                                    <input wire:model.live="searchTitre" type="text" id="searchTitre"
                                        class="form-control" placeholder="Ex: Développeur Web">
                                </div>
                                <div class="col-md-4">
                                    <label for="metier" class="form-label">🧑‍💼 Métier</label>
                                    <select wire:model.live="metier" id="metier" class="form-select">
                                        <option value="">Tous les métiers</option>
                                        @foreach ($metiers as $m)
                                            <option value="{{ $m->id }}">{{ $m->nom_metier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="secteur" class="form-label">🏢 Secteur</label>
                                    <select wire:model.live="secteur" id="secteur" class="form-select">
                                        <option value="">Tous les secteurs</option>
                                        @foreach ($secteurs as $s)
                                            <option value="{{ $s->id }}">{{ $s->nom_secteur }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <h6 class="bottom-contact wow fadeInUp" data-wow-delay="1.2s">
							<span>Popular Searches: </span>
							<a href="javascript:void(0);">Designer,</a>
							<a href="javascript:void(0);">Senor,</a>
							<a href="javascript:void(0);">Architecture,</a>
							<a href="javascript:void(0);">IOS,</a>
							<a href="javascript:void(0);">Etc.</a>
						</h6> --}}
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12">
                <div class="banner-media">
                    <img class="media wow bounceInRight" data-wow-delay="1.4s"
                        src="/frontend/assets/images/home-banner/media-men.png" alt="">
                    {{-- <ul class="bnr-blocks">
								<li>
									<div class="bnr-block wow fadeInUp anm" data-wow-delay="1.6s" data-speed-x="-1" data-speed-scale="-1">
										<i class="fa-solid fa-envelope"></i>
										<span class="block-text">Work Inquiry From <br> All Tufon</span>
									</div>
								</li>
								<li>
									<div class="bnr-block wow fadeInUp anm" data-wow-delay="1.6s" data-speed-x="-2" data-speed-scale="-1">
										<i class="fa-solid fa-briefcase"></i>
										<span class="block-text">Creative Agency <br> Startup</span>
									</div>
								</li>

							</ul> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        {{-- Loader --}}
        <div wire:loading.delay class="text-center my-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
        </div>

        {{-- Liste des offres --}}
        {{-- <div class="row  g-4">
    @forelse($emplois as $offre)
        <div class="col">
            <a href="{{ route('candidat.offredetail', $offre->id) }}" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition rounded-3">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-primary mb-2">
                            <i class="bi bi-briefcase-fill me-2"></i> {{ $offre->titre_emplois }}
                        </h5>

                        <p class="text-muted mb-3">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $offre->lieu_emplois }}
                        </p>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge rounded-pill bg-primary-subtle text-white">
                                <i class="bi bi-file-earmark-text me-1"></i> {{ $offre->typecontrat->nom_type_contrat ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-secondary-subtle text-white">
                                <i class="bi bi-layers me-1"></i> {{ $offre->secteur->nom_secteur ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-info-subtle text-white">
                                <i class="bi bi-award me-1"></i> {{ $offre->niveauglobalexperience->nom_niveau_global_experience ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-success-subtle text-white">
                                <i class="bi bi-mortarboard me-1"></i> {{ $offre->niveauetude->nom_niveau_etude ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-warning-subtle text-white">
                                <i class="bi bi-person-workspace me-1"></i> {{ $offre->metier->nom_metier ?? '-' }}
                            </span>
                        </div>

                        <hr class="my-3">

                        <div class="small text-muted d-flex flex-wrap gap-3">
                            <span><i class="bi bi-calendar-check me-1"></i><strong>Début :</strong>
                                {{ \Carbon\Carbon::parse($offre->date_debut_emplois)->format('d/m/Y') }}
                            </span>
                            <span><i class="bi bi-calendar-x me-1"></i><strong>Fin :</strong>
                                {{ \Carbon\Carbon::parse($offre->date_fin_emplois)->format('d/m/Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle me-2"></i> Aucune offre d'emploi trouvée selon les critères.
            </div>
        </div>
    @endforelse
</div> --}}





        {{-- Pagination --}}
        {{-- <div class="d-flex justify-content-center mt-5">
        {{ $emplois->links() }}
    </div> --}}
    </div>
    <section class="content-inner overflow-hidden position-relative">
        <div class="container">
            <div class="section-head text-center">
                <h6 class="text wow fadeInUp" data-wow-delay="0.6s">Méthode de travail</h6>
                <h2 class="title wow fadeInUp" data-wow-delay="0.8s">Comment cela fonctionne</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="icon-bx-wraper style-1 bg-clr-sky wow bounceInLeft" data-wow-delay="1.2s">
                        <div class="icon-media">
                            <img src="{{ asset('frontend/assets/images/icon/pic1.png') }}" alt="image"
                                class="rounded">
                        </div>
                        <div class="icon-content">
                            <h4 class="title">Créez votre compte</h4>
                            <p class="text">Inscription rapide et accès à des centaines d'offres d'emploi adaptées à
                                votre profil, débutant ou expérimenté, pour trouver l'opportunité idéale.</p>
                        </div>
                        <h3 class="count">01</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="icon-bx-wraper style-1 bg-clr-pink wow bounceInUp" data-wow-delay="1.0s">
                        <div class="icon-media">
                            <img src="{{ asset('frontend/assets/images/icon/pic2.png') }}" alt="image"
                                class="rounded">
                        </div>
                        <div class="icon-content">
                            <h4 class="title">Trouvez l’emploi qui vous correspond</h4>
                            <p class="text">Saisissez votre chance et construisez la carrière dont vous rêvez.</p>
                        </div>
                        <h3 class="count">02</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="icon-bx-wraper style-1 bg-clr-green wow bounceInRight" data-wow-delay="1.2s">
                        <div class="icon-media">
                            <img src="{{ asset('frontend/assets/images/icon/pic3.png') }}" alt="image"
                                class="rounded">
                        </div>
                        <div class="icon-content">
                            <h4 class="title">Uploader votre CV</h4>
                            <p class="text">Ajoutez votre CV pour permettre aux recruteurs de découvrir votre
                                parcours, vos compétences et vos expériences.</p>
                        </div>
                        <h3 class="count">03</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <section class="content-inner overflow-hidden position-relative bg-light">
    <div class="container">
        <div class="section-head text-center">
            <h6 class="text wow fadeInUp" data-wow-delay="0.6s">Toutes les offres d'emploi</h6>
            <h2 class="title wow fadeInUp" data-wow-delay="0.8s">Trouvez votre carrière, vous la méritez</h2>
        </div>

        <div class="row">
            @forelse($emplois as $offre)
                @php
    $dateFin = \Carbon\Carbon::parse($offre->date_fin_emplois);
    $resteJours = round(now()->floatDiffInDays($dateFin, false));
@endphp


                <div class="col-xl-4 col-md-6">
                    <div class="job-bx style-1 wow fadeInUp" data-wow-delay="1.0s">
                        <div class="d-flex m-b25 justify-content-between">
                            <ul>
                                <li>
                                    @if ($resteJours > 0)
                                        <span class="badge bg-success">{{ $resteJours }} jour(s) restant(s)</span>
                                    @elseif ($resteJours === 0)
                                        <span class="badge bg-warning">Dernier jour</span>
                                    @else
                                        <span class="badge bg-danger">Expiré</span>
                                    @endif
                                </li>
                                <li>
                                    <a class="job-time" href="javascript:void(0);">
                                        {{ $offre->typecontrat->nom_type_contrat ?? '-' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="job-contant">
                            <h6 class="job-title"><a href="{{ route('candidat.offredetail', $offre->id) }}">
                                Nous recrutons un(e) {{ $offre->titre_emplois }}</a></h6>
                            <p class="text">{{ $offre->lieu_emplois }}</p>
                        </div>
                        <div class="jobs-amount">
                            <a class="btn btn-primary" href="{{ route('candidat.offredetail', $offre->id) }}">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i> Aucune offre d'emploi trouvée selon les critères.
                    </div>
                </div>
            @endforelse
        </div>

        @if ($emplois->count() >= $limit)
            <div class="text-center mt-4">
                <button wire:click="loadMore" class="btn btn-outline-primary">Afficher plus</button>
            </div>
        @endif
    </div>
</section>

    <div class="container">
			<section class="footer-action wow fadeInUp" data-wow-delay="1.0s">
				<div class="inner-content wow fadeInUp" data-wow-delay="1.2s">
					<div class="row justify-content-between align-items-center">
						<div class="text-center text-xl-start col-xl-7 m-lg-b20">
							<h2 class="title">Connectons-nous pour construire votre avenir professionnel</h2>
						</div>
						<div class="text-center text-xl-end col-xl-5">
							<a class="btn btn-light btn-lg" href="{{route('inscrire')}}">Créer un compte gratuit</a>
						</div>
					</div>
				</div>
			</section>
		</div>
        <section class="content-inner overflow-hidden position-relative bg-light mt-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Ce que disent nos clients</h2>
      <p class="text-muted">Des témoignages qui illustrent notre engagement et notre expertise au Mali</p>
    </div>

    <div class="row g-4">
      <!-- Témoignage 1 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <p class="card-text fst-italic">"Grâce à ce cabinet, nous avons recruté des talents de qualité en un temps record. Professionnalisme et écoute sont au rendez-vous."</p>
          </div>
          <div class="card-footer bg-transparent border-0 d-flex align-items-center">
            <img src="{{asset('frontend/assets/images/avatar/avatar1.jpg')}}" width="50" height="50" alt="client" class="rounded-circle me-3">
            <div>
              <h6 class="mb-0">Fatou Diarra</h6>
              <small class="text-muted">Directrice RH, BamakoTech</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Témoignage 2 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <p class="card-text fst-italic">"Une équipe réactive, à l'écoute de nos besoins spécifiques. Nous recommandons fortement ce cabinet de recrutement au Mali."</p>
          </div>
          <div class="card-footer bg-transparent border-0 d-flex align-items-center">
            <img src="{{asset('frontend/assets/images/avatar/avatar1.jpg')}}" width="50" height="50" alt="client" class="rounded-circle me-3">
            <div>
              <h6 class="mb-0">Moussa Traoré</h6>
              <small class="text-muted">CEO, AgroMali</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Témoignage 3 -->
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body">
            <p class="card-text fst-italic">"Nous avons trouvé des profils rares et compétents. Ce cabinet nous a vraiment aidés à structurer notre processus de recrutement."</p>
          </div>
          <div class="card-footer bg-transparent border-0 d-flex align-items-center">
              <img src="{{asset('frontend/assets/images/avatar/avatar1.jpg')}}" width="50" height="50" alt="client" class="rounded-circle me-3">
            <div>
              <h6 class="mb-0">Awa Konaté</h6>
              <small class="text-muted">Manager RH, Sotrama Digital</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
