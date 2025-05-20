<div class="p-4 bg-white rounded shadow">
    <div class="col-md d-flex align-items-end p-4">
    <button wire:click="resetFilters" class="btn btn-outline-secondary ">
        Réinitialiser les filtres
    </button>
</div>
    <!-- Filtres -->
    <div class="row mb-4">
        <div class="col-md">
            <select wire:model.live="niveauglobalexperience" class="form-select">
                <option value="">-- Niveau d'expérience --</option>
                @foreach($niveauexperiences as $niveauexperience)
                    <option value="{{ $niveauexperience->id }}">{{ $niveauexperience->nom_niveau_global_experience }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md">
            <select wire:model.live="secteur" class="form-select">
                <option value="">-- Secteur --</option>
                @foreach($secteurs as $sect)
                    <option value="{{ $sect->id }}">{{ $sect->nom_secteur }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md">
            <select wire:model.live="metier" class="form-select">
                <option value="">-- Métier --</option>
                @foreach($metiers as $met)
                    <option value="{{ $met->id }}">{{ $met->nom_metier }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md">
            <select wire:model.live="sexe_candidat" class="form-select">
                <option value="">-- Sexe --</option>
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select>
        </div>
        <div class="col-md">
            <select wire:model.live="niveauetude" class="form-select">
                <option value="">-- Niveau d'étude --</option>
                @foreach($niveauetudes as $niveauetude)
                    <option value="{{ $niveauetude->id }}">{{ $niveauetude->nom_niveau_etude }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Liste des candidats -->
    <div class="row">
        @forelse($candidats as $candidat)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-primary">{{ $candidat->prenom_candidat }} {{ $candidat->nom_candidat }}</h5>
                            <p class="mb-1"><i class="bi bi-envelope"></i> {{ $candidat->email }}</p>
                            <p class="mb-1"><i class="bi bi-telephone"></i> {{ $candidat->tel_candidat }}</p>

                            @php
                                $niveauExp = $candidat->candidatnges->first();
                                $niveauEtude = $candidat->niveauetudes->first();
                                 $metier = $candidat->metiers->first();
                                  $secteur = $candidat->secteurs->first();
                            @endphp

                            @if($niveauExp)
                                <span class="badge bg-info text-white mb-1">{{ $niveauExp->nom_niveau_global_experience }}</span>
                            @endif

                            @if($niveauEtude)
                                <span class="badge bg-secondary mb-2">{{ $niveauEtude->nom_niveau_etude }}</span>
                            @endif
                              @if($secteur)
                                <span class="badge bg-primary mb-2">{{ $secteur->nom_secteur }}</span>
                            @endif
                             @if($metier)
                                <span class="badge bg-danger mb-2">{{ $metier->nom_metier }}</span>
                            @endif



                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <a href="{{route('detailcandidat',$candidat->id)}}" class="btn btn-outline-primary btn-sm">
                                Détails
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Aucun candidat trouvé avec les filtres actuels.</div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $candidats->links() }}
    </div>
</div>
