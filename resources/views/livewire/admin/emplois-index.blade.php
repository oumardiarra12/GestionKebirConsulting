<div class="row">
    <div class="col-12">
        {{-- FILTRES --}}
        <div class="card ">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-filter me-2"></i>Filtres
                </h5>
                <a href="javascript:void(0);" class="btn btn-sm btn-secondary" wire:click="resetFields">
                    Réinitialiser
                </a>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" wire:model.live="search"
                            placeholder="Rechercher un titre d'emploi...">
                    </div>

                    <div class="col-md-3">
                        <select class="form-select" wire:model.live="secteur_id">
                            <option value="">Tous les secteurs</option>
                            @foreach ($secteurs as $secteur)
                                <option value="{{ $secteur->id }}">{{ $secteur->nom_secteur }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="form-select" wire:model.live="metier_id">
                            <option value="">Tous les métiers</option>
                            @foreach ($metiers as $metier)
                                <option value="{{ $metier->id }}">{{ $metier->nom_metier }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="form-select" wire:model.live="status_emploi">
                            <option value="">Tous les statuts</option>
                            @foreach ($statusOptions as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


        {{-- TABLEAU DES OFFRES --}}
        <div class="card">
            <div class="card-header d-flex">
                <h5><i class="fas fa-briefcase me-2"></i>Liste des offres d'emploi</h5>
                     {{-- BOUTON AJOUT --}}
        <div class="mb-3">
            <a href="{{ route('emplois.create') }}" class="btn btn-primary">
                + Nouvelle offre d'emploi
            </a>
        </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Métier</th>
                            <th>Secteur</th>
                            <th>Date début</th>
                            <th>Statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emplois as $emploi)
                            <tr>
                                <td>{{ $emploi->id }}</td>
                                <td>{{ $emploi->titre_emplois }}</td>
                                <td>{{ $emploi->metier->nom_metier ?? '-' }}</td>
                                <td>{{ $emploi->secteur->nom_secteur ?? '-' }}</td>
                                <td>{{ $emploi->date_debut_emplois ? \Carbon\Carbon::parse($emploi->date_debut_emplois)->format('d/m/Y') : '-' }}</td>
                                <td>
                                    @switch($emploi->status_emploi)
                                        @case('Publier')
                                            <span class="badge bg-success">Publié</span>
                                            @break
                                        @case('Brouillon')
                                            <span class="badge bg-secondary">Brouillon</span>
                                            @break
                                        @case('Cloture')
                                            <span class="badge bg-warning text-dark">Cloture</span>
                                            @break
                                        @default
                                            <span class="badge bg-light">-</span>
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    @if ($emploi->status_emploi=='Publier')
                                          <a href="{{ route('emplois.candidatures', $emploi->id) }}" class="btn btn-sm btn-info">
                                       Candidatures
                                    </a>
                                    @endif

                                    <a href="{{ route('emplois.edit', $emploi->id) }}" class="btn btn-sm btn-warning">
                                        Éditer
                                    </a>
                                    <button wire:click="deleteEmploi({{ $emploi->id }})"
                                        onclick="confirm('Confirmer la suppression ?') || event.stopImmediatePropagation()"
                                        class="btn btn-sm btn-danger">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Aucune offre trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- PAGINATION --}}
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <small>
                            Page {{ $emplois->currentPage() }} sur {{ $emplois->lastPage() }} —
                            Affichage de {{ $emplois->count() }} offres sur {{ $emplois->total() }}
                        </small>
                    </div>
                    <div>
                        {{ $emplois->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>


    </div>
</div>
