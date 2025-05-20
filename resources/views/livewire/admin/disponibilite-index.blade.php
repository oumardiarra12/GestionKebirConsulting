<div class="p-4 bg-white rounded shadow-sm">
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-semibold"></h2>
        <button class="btn btn-primary mb-2"  wire:click="create">
            Ajouter Disponibilité
        </button>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Disponibilites</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle">
                        <thead >
                            <tr>
                                <th style="min-width: 200px;"><strong>#</strong></th>
                                <th style="min-width: 200px;"><strong>Nom Disponibilité</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($disponibilites as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->nom_disponibilite }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="edit({{$d->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"
                                                title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer ce Disponibilite ?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{$d->id }})"
                                                class="btn btn-sm btn-danger shadow"
                                                title="Supprimer">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">Aucun type de Disponibilite trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom Disponibilité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disponibilites as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->nom_disponibilite }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalDisponibilite" wire:click="edit({{ $d->id }})">Modifier</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $d->id }})" onclick="confirm('Confirmer la suppression ?') || event.stopImmediatePropagation()">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    {{ $disponibilites->links() }}
    @if ($showModal)
    <!-- Modal -->
    <div class="modal d-block" tabindex="-1" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog">
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $isEdit ? 'Modifier' : 'Ajouter' }} Disponibilité</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom disponibilité</label>
                            <input type="text" wire:model.defer="nom_disponibilite" class="form-control">
                            @error('nom_disponibilite') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Mettre à jour' : 'Ajouter' }}</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>

