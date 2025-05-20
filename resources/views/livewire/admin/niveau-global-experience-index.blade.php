<!-- resources/views/livewire/niveau-global-experience-crud.blade.php -->

<div class="p-4 bg-white rounded shadow">

    <div class="container mt-4">
        <button class="btn btn-primary mb-3" wire:click="showCreateModal">
            Ajouter Niveau Global
        </button>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Liste des Niveaux Experiences</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  align-middle">
                            <thead >
                                <tr>
                                    <th style="min-width: 200px;"><strong>ID</strong></th>
                                    <th style="min-width: 200px;"><strong>Nom</strong></th>
                                    <th style="min-width: 120px;"><strong>Actions</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($niveaux as $niveau)
                                    <tr>
                                        <td>{{ $niveau->id }}</td>
                                        <td>{{ $niveau->nom_niveau_global_experience }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button wire:click="edit({{ $niveau->id }})"
                                                    class="btn btn-sm btn-warning shadow me-2"
                                                    title="Modifier">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button
                                                    onclick="confirm('Êtes-vous sûr de vouloir supprimer ce Niveau Exeperience ?') || event.stopImmediatePropagation()"
                                                    wire:click="delete({{ $niveau->id }})"
                                                    class="btn btn-sm btn-danger shadow"
                                                    title="Supprimer">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{ $niveaux->links() }}
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted">Aucun type de contrat trouvé.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$niveaux->links()}}
                    </div>
                </div>
            </div>
        </div>


    </div>
    @if($showModal)
    <!-- Modal -->
    <div class="modal d-block" tabindex="-1" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog">
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="niveauModalLabel">
                            {{ $isEdit ? 'Modifier' : 'Ajouter' }} Niveau Global
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nom du niveau global</label>
                            <input type="text" wire:model.defer="nom_niveau_global_experience" class="form-control">
                            @error('nom_niveau_global_experience') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Annuler</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $isEdit ? 'Mettre à jour' : 'Enregistrer' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>


