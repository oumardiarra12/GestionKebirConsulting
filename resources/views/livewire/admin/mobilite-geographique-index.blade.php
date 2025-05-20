<div>
    <div class="d-flex justify-content-between mb-3">
        <input wire:model.debounce.500ms="search" type="text" class="form-control w-25" placeholder="Rechercher...">
        <button class="btn btn-primary" wire:click="showCreateModal">Ajouter</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mobilites as $item)
                <tr>
                    <td>{{ $item->nom_mobilite_geographique }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="showEditModal({{ $item->id }})">Modifier</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $item->id }})">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $mobilites->links() }}

    <!-- Modal -->
    @if($modalFormVisible)
    <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5)">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>{{ $isEdit ? 'Modifier' : 'Ajouter' }} Mobilité</h5>
                    <button type="button" class="btn-close" wire:click="resetForm"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'create' }}">
                        <div class="mb-3">
                            <label>Nom Mobilité</label>
                            <input type="text" wire:model.defer="nom_mobilite_geographique" class="form-control">
                            @error('nom_mobilite_geographique') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">{{ $isEdit ? 'Mettre à jour' : 'Enregistrer' }}</button>
                        <button type="button" class="btn btn-secondary" wire:click="resetForm">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
