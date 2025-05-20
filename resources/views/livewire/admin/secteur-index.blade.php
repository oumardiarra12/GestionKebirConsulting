<div class="p-4 bg-white rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h5 text-secondary"></h2>
        <button wire:click="openModal" class="btn btn-primary">+ Ajouter</button>
    </div>

    @if (session()->has('message'))
        <div class="text-success mb-3">{{ session('message') }}</div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Secteurs</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle">
                        <thead >
                            <tr>
                                <th style="min-width: 200px;"><strong>Nom</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($secteurs as $secteur)
                                <tr>
                                    <td>{{ $secteur->nom_secteur }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="edit({{ $secteur->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"
                                                title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer ce Type de Contrat ?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $secteur->id }})"
                                                class="btn btn-sm btn-danger shadow"
                                                title="Supprimer">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">Aucun type de contrat trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$secteurs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal --}}
    @if ($isOpen)
        <div class="modal d-block" tabindex="-1" style="background: rgba(0, 0, 0, 0.4);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $secteur_id ? 'Modifier' : 'Créer' }} un secteur</h5>
                        <button type="button" wire:click="closeModal" class="btn-close"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nom_secteur" class="form-label">Nom du secteur</label>
                                <input type="text" id="nom_secteur" wire:model="nom_secteur" class="form-control">
                                @error('nom_secteur') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_secteur" class="form-label">Description</label>
                                <textarea id="description_secteur" wire:model="description_secteur" rows="3" class="form-control"></textarea>
                                @error('description_secteur') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                            <button type="submit" class="btn btn-primary">
                                {{ $secteur_id ? 'Mettre à jour' : 'Créer' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
