<div class="container mt-4">
    <button class="btn btn-primary mb-3" wire:click="showModalForm">Ajouter Métier</button>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Métiers</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle">
                        <thead >
                            <tr>
                                <th style="min-width: 200px;"><strong>Nom Métier</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($metiers as $metier)
                                <tr>
                                    <td>{{ $metier->nom_metier }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="showEditModal({{ $metier->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"
                                                title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer ce Niveau Exeperience ?') || event.stopImmediatePropagation()"
                                                wire:click="deleteMetier({{ $metier->id }})"
                                                class="btn btn-sm btn-danger shadow"
                                                title="Supprimer">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- {{ $metiers->links() }} --}}
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">Aucun type de contrat trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$metiers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal --}}
    <div class="modal fade @if($modalFormVisible) show d-block @endif" tabindex="-1" role="dialog" style="@if($modalFormVisible) display:block; background-color: rgba(0,0,0,0.5); @endif">
        <div class="modal-dialog" role="document" wire:ignore.self>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateMode ? 'Modifier Métier' : 'Créer Métier' }}</h5>
                    <button type="button" class="btn-close" wire:click="$set('modalFormVisible', false)"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveMetier">
                        <div class="mb-3">
                            <label>Nom Métier</label>
                            <input type="text" class="form-control @error('nom_metier') is-invalid @enderror" wire:model.defer="nom_metier">
                            @error('nom_metier') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                        <button type="button" class="btn btn-secondary" wire:click="$set('modalFormVisible', false)">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

