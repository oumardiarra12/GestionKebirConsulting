<div >
   <!-- Banner  -->
			<div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark" style="background-image: url(assets/images/banner/bnr1.jpg);margin-top:9px;">
				<div class="container">
					<div class="dz-bnr-inr-entry">
						<h4 class="text-white">📋 Liste des Offres d'Emploi</h4>
						<!-- Breadcrumb Row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row m-t15">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
								<li class="breadcrumb-item active" aria-current="page">Liste d'emplois</li>
							</ul>
						</nav>
						<!-- Breadcrumb Row End -->
					</div>
				</div>
			</div>
			<!-- Banner End -->
    {{-- <h2 class="mb-4 fw-semibold text-center">📋 Liste des Offres d'Emploi</h2> --}}

    {{-- Filtres --}}
    <div class="card p-4 mb-5 border-0 shadow-sm bg-light">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="searchTitre" class="form-label">🔍 Titre de l'emploi</label>
                <input wire:model.live="searchTitre" type="text" id="searchTitre" class="form-control"
                    placeholder="Ex: Développeur Web">
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

    {{-- Loader --}}
    <div wire:loading.delay class="text-center my-5">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
    </div>

    {{-- Liste des offres --}}
  <section class="content-inner overflow-hidden position-relative bg-light">
        <div class="container">
            <div class="row">
                @forelse($offres as $offre)
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
                                            <span class="badge bg-success">{{ $resteJours }} jour(s)
                                                restant(s)</span>
                                        @elseif ($resteJours === 0)
                                            <span class="badge bg-warning">Dernier jour</span>
                                        @else
                                            <span class="badge bg-danger">Expiré</span>
                                        @endif
                                    </li>
                                    <li><a class="job-time"
                                            href="javascript:void(0);">{{ $offre->typecontrat->nom_type_contrat ?? '-' }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-contant">
                                <h6 class="job-title "><a href="job-detail.html">Nous recrutons un(e)
                                        {{ $offre->titre_emplois }}</a></h6>
                                <p class="text">{{ $offre->lieu_emplois }}</p>
                            </div>
                            <div class="jobs-amount">
                                <h6 class="amount"></span></h6>
                                <a class="btn btn-primary" href="{{ route('candidat.offredetail', $offre->id) }}"><i
                                        class="fa-solid fa-chevron-right"></i></a>
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
        </div>
    </section>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-5">
        {{ $offres->links() }}
    </div>
</div>
