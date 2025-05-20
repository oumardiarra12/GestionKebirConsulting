<div class="p-4 bg-white rounded shadow">
    <div class="d-flex justify-content-between mb-3">
        <h2 class="h5 fw-bold"></h2>
        <button wire:click="openModal" class="btn btn-primary">
            + Ajouter
        </button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Niveaux d'Étude</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle mb-0">
                        <thead>
                            <tr>
                                <th><strong>ID</strong></th>
                                <th><strong>NOM</strong></th>
                                <th class="text-center"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($niveauEtudes as $niveau)
                            <tr>
                                <td>{{ $niveau->id }}</td>
                    <td>{{ $niveau->nom_niveau_etude }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button
                                            wire:click="edit({{ $niveau->id }})"
                                            class="btn btn-warning btn-sm me-2"
                                            data-bs-toggle="tooltip"
                                            title="Modifier">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button
                                            onclick="confirm('Êtes-vous sûr de vouloir supprimer Ce Niveau ?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $niveau->id }})"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="tooltip"
                                            title="Supprimer">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted">Aucune langue trouvée.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$niveauEtudes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    @if($isModalOpen)
        <div class="modal d-block" tabindex="-1" style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $niveauEtude_id ? 'Modifier' : 'Ajouter' }} un Niveau d'Étude</h5>
                        <button type="button" wire:click="closeModal" class="btn-close"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nom du Niveau</label>
                                <input type="text" wire:model="nom_niveau_etude" class="form-control">
                                @error('nom_niveau_etude') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
