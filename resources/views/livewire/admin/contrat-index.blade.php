<div class="p-4 bg-white rounded shadow">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-bold">Types de contrat</h2>
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
                <h4 class="card-title mb-0">Liste des Types de Contrats</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table   align-middle">
                        <thead>
                            <tr>
                                <th style="min-width: 200px;"><strong>Nom</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($typeContrats as $contrat)
                                <tr>
                                    <td>{{ $contrat->nom_type_contrat }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="edit({{ $contrat->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"
                                                title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer ce Type de Contrat ?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $contrat->id }})"
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
    {{ $typeContrats->links() }}
</div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    @if($isModalOpen)
    <div class="modal d-block" tabindex="-1" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $typeContratId ? 'Modifier' : 'Ajouter' }} Type de contrat</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="store">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" wire:model.defer="nom_type_contrat" class="form-control">
                            @error('nom_type_contrat')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea wire:model.defer="description_type_contrat" rows="4" class="form-control"></textarea>
                            @error('description_type_contrat')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $typeContratId ? 'Mettre à jour' : 'Enregistrer' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
