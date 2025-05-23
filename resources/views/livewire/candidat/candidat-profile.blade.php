<div>
    <!-- Bannière -->
    {{-- <div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark"
        style="background-image: url(assets/images/banner/bnr1.jpg); margin-top:9px;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h4 class="text-white">Profil de {{ $nom_candidat }} {{ $prenom_candidat }}</h4>
                <nav aria-label="breadcrumb" class="breadcrumb-row mt-3">
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> --}}

    <!-- Contenu principal -->
    {{-- <div class="container py-5 bg-white rounded shadow-sm">
        <!-- En-tête -->
        <div
            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between mb-4 pb-3 border-bottom">
            <h2 class="h4 fw-bold text-dark mb-3 mb-sm-0">
                <i class="fas fa-user-circle me-2 text-primary"></i> Dossier du candidat
            </h2>
            <a href="{{ route('candidat.editprofile') }}" class="btn btn-outline-primary">
                <i class="fas fa-pen-square me-1"></i> Modifier le profil
            </a>
        </div>

        <div class="row g-4">
            <!-- Colonne gauche -->
            <div class="col-lg-8">
                <!-- Infos personnelles -->
                <div class="card border-0 shadow-sm p-4">
                    <div class="row g-4 align-items-center">
                        <!-- Photo -->
                        <div class="col-md-4 text-center">
                            @php use Illuminate\Support\Facades\Storage; @endphp
                            @if ($photo_candidat && Storage::disk('public')->exists($photo_candidat))
                                <img src="{{ asset('storage/' . $photo_candidat) }}" alt="Photo du candidat"
                                    class="rounded-circle shadow-sm"
                                    style="width: 130px; height: 130px; object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-muted shadow"
                                    style="width: 130px; height: 130px;">
                                    <i class="fas fa-user fs-1"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Infos -->
                        <div class="col-md-8">
                            @php
                                $infos = [
                                    'Nom' => $nom_candidat,
                                    'Prénom' => $prenom_candidat,
                                    'Date de naissance' => $datenaissance_candidat,
                                    'Lieu de naissance' => $lieunaissance_candidat,
                                    'Sexe' => $sexe_candidat,
                                    'Nationalité' => $nationalite_candidat,
                                    'Email' => $email,
                                    'Téléphone' => $tel_candidat,
                                    'Situation matrimoniale' => $situationmatrimoniale_candidat,
                                    'Adresse' => $adresse_candidat,
                                    'Nombre d’enfants' => $nombreenfant_candidat,
                                ];
                            @endphp

                            <div class="row g-2 text-dark small">
                                @foreach ($infos as $label => $valeur)
                                    <div class="col-sm-6">
                                        <span class="fw-semibold text-muted">{{ $label }} :</span>
                                        {{ $valeur ?? '—' }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bloc CV -->
                <div class="card border-0 shadow-sm mt-4 p-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-file-alt me-2 text-primary"></i>Curriculum Vitae
                    </h5>
                    @if ($cv_candidat)
                        <a href="{{ asset('storage/' . $cv_candidat) }}" target="_blank"
                            class="text-decoration-none text-primary">
                            <i class="fas fa-eye me-1"></i> Voir le CV
                        </a>
                    @else
                        <p class="text-muted mb-0">Aucun CV disponible.</p>
                    @endif
                </div>

                <!-- Bloc Relations -->
                <div class="card border-0 shadow-sm mt-4 p-4">
                    <!-- Formations -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            <i class="fas fa-graduation-cap me-2 text-success"></i>Formations
                        </h5>
                        <ul class="ps-3 mb-0">
                            @forelse($abonne->formations as $formation)
                                <li class="mb-2">
                                    <strong>{{ $formation->diplome_formation }}</strong> –
                                    {{ $formation->etablissement_formation }}
                                    <small class="text-muted d-block">({{ $formation->date_debut_formation }} -
                                        {{ $formation->date_fin_formation }})</small>
                                </li>
                            @empty
                                <li class="text-muted">Aucune formation renseignée.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Expériences -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            <i class="fas fa-briefcase me-2 text-warning"></i>Expériences professionnelles
                        </h5>
                        <ul class="ps-3 mb-0">
                            @forelse($abonne->experiences as $exp)
                                <li class="mb-2">
                                    <strong>{{ $exp->poste_experience }}</strong> chez
                                    {{ $exp->entreprise_experience }}
                                    <small class="text-muted d-block">({{ $exp->date_debut_experience }} -
                                        {{ $exp->date_fin_experience }})</small>
                                </li>
                            @empty
                                <li class="text-muted">Aucune expérience renseignée.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Langues -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            <i class="fas fa-language me-2 text-info"></i>Langues parlées
                        </h5>
                        <ul class="ps-3 mb-0">
                            @forelse($abonne->langues as $langue)
                                <li>{{ $langue->nom_langue }} <span
                                        class="text-muted">({{ $langue->pivot->niveau }})</span></li>
                            @empty
                                <li class="text-muted">Aucune langue renseignée.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Compétences -->
                    <div>
                        <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            <i class="fas fa-bolt me-2 text-danger"></i>Compétences clés
                        </h5>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($abonne->competences as $comp)
                                <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                                    {{ $comp->nom_competence }}
                                </span>
                            @empty
                                <p class="text-muted">Aucune compétence renseignée.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne droite (réservée à l'avenir) -->
            <div class="col-lg-4">
                <!-- Carte résumé du candidat -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3 text-primary">
                            <i class="fas fa-info-circle me-2"></i>Résumé
                        </h5>
                        <ul class="list-unstyled mb-0 text-dark small">
                            <li class="mb-2"><i class="fas fa-user me-2 text-muted"></i><strong>Nom :</strong>
                                {{ $nom_candidat }} {{ $prenom_candidat }}</li>
                            <li class="mb-2"><i class="fas fa-calendar me-2 text-muted"></i><strong>Naissance
                                    :</strong> {{ $datenaissance_candidat }}</li>
                            <li class="mb-2"><i class="fas fa-venus-mars me-2 text-muted"></i><strong>Sexe :</strong>
                                {{ $sexe_candidat }}</li>
                            <li class="mb-2"><i class="fas fa-phone me-2 text-muted"></i><strong>Téléphone :</strong>
                                {{ $tel_candidat }}</li>
                            <li class="mb-2"><i class="fas fa-envelope me-2 text-muted"></i><strong>Email :</strong>
                                {{ $email }}</li>
                            <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-muted"></i><strong>Adresse
                                    :</strong> {{ $adresse_candidat }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Bouton Télécharger le CV -->
                @if ($cv_candidat)
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-download fa-2x text-success mb-3"></i>
                            <h6 class="fw-bold">Télécharger le CV</h6>
                            <a href="{{ asset('storage/' . $cv_candidat) }}" class="btn btn-success btn-sm mt-2"
                                download>
                                <i class="fas fa-file-pdf me-1"></i> Télécharger
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Tu peux ajouter une carte résumé, des documents joints, etc. -->
            </div>
        </div>
    </div> --}}
    <div x-data="{
        tab: '{{ $tab }}',
        sidebarOpen: window.innerWidth >= 768,
        changeTab(newTab) {
            this.tab = newTab;
            this.sidebarOpen = window.innerWidth >= 768;
            $wire.set('tab', newTab);
        }
    }" class="container-fluid py-4">

        <!-- Bouton Mobile -->
        <div class="d-md-none mb-3 text-end">
            <button class="btn btn-primary" @click="sidebarOpen = !sidebarOpen">
                <i class="fas fa-bars"></i> Menu
            </button>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-3" :class="{ 'd-none': !sidebarOpen && window.innerWidth < 768 }">
                <div class="list-group shadow-sm rounded">
                    <template
                        x-for="(label, key) in {
                    'infos': 'Informations',
                    'formations': 'Formations',
                    'experiences': 'Expériences',
                    'competences': 'Compétences',
                    'langues': 'Langues',
                    'secteurs': 'Secteurs',
                    'metiers': 'Métiers',
                    'etudes': 'Niveaux d\'études',
                    'contrats': 'Types de contrat',
                    'disponibilites': 'Disponibilités',
                    'regions': 'Régions',
                    'mobilite': 'Mobilité géographique',
                    'renumerations': 'Rémunérations'
                }"
                        :key="key">
                        <a href="#" class="list-group-item list-group-item-action"
                            :class="{ 'active': tab === key }" @click.prevent="changeTab(key)" x-text="label">
                        </a>
                    </template>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                    <h4 class="fw-bold text-primary mb-0">
                        <i class="fas fa-user-circle me-2"></i> Profil du Candidat
                    </h4>
                    <button wire:click="toggleEdit" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-1"></i> {{ $editMode ? 'Annuler' : 'Modifier' }}
                    </button>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Spinner de chargement -->
                <div wire:loading wire:target="tab" class="text-center my-4">
                    <div class="spinner-border text-primary" role="status"></div>
                </div>

                <!-- Contenu dynamique -->
                <div wire:loading.remove>
                    @switch($tab)
                        @case('infos')
                            @if ($editMode)
                               @livewire('candidat.partials.edit-infos')

                            @else
                                @livewire('candidat.partials.show-infos')

                            @endif
                        @break

                        @case('formations')
                            @livewire('candidat.partials.formation')

                        @break

                        @case('experiences')
                            {{-- @include('partials.experiences') --}}
                            experience
                        @break

                        @case('competences')
                            {{-- @include('partials.competences') --}}
                            competence
                        @break

                        @case('langues')
                            {{-- @include('partials.langues') --}}
                            langue
                        @break

                        @case('secteurs')
                            @includeWhen($candidat->secteurs->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->secteurs,
                                'nom' => 'nom_secteur',
                            ])
                        @break

                        @case('metiers')
                            @includeWhen($candidat->metiers->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->metiers,
                                'nom' => 'nom_metier',
                            ])
                        @break

                        @case('etudes')
                            @includeWhen($candidat->niveauetudes->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->niveauetudes,
                                'nom' => 'nom_niveau_etude',
                            ])
                        @break

                        @case('contrats')
                            @includeWhen($candidat->typecontrats->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->typecontrats,
                                'nom' => 'nom_type_contrat',
                            ])
                        @break

                        @case('disponibilites')
                            @includeWhen($candidat->disponibilites->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->disponibilites,
                                'nom' => 'nom_disponibilite',
                            ])
                        @break

                        @case('regions')
                            @includeWhen($candidat->regions->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->regions,
                                'nom' => 'nom_region',
                            ])
                        @break

                        @case('mobilite')
                            @includeWhen($candidat->mobilitegeographique->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->mobilitegeographique,
                                'nom' => 'nom_mobilite_geographique',
                            ])
                        @break

                        @case('renumerations')
                            @includeWhen($candidat->renumerations->isNotEmpty(), 'partials.liste', [
                                'items' => $candidat->renumerations,
                                'nom' => 'nom_renumeration',
                            ])
                        @break

                        @default
                            <p>Section non trouvée.</p>
                    @endswitch
                </div>

                @if ($editMode)
                    <div class="mt-4 text-end">
                        <button wire:click="save" class="btn btn-success px-4">
                            <i class="fas fa-save me-1"></i> Enregistrer
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
