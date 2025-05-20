<div class="p-4 bg-white rounded shadow-sm">
    <h2 class="text-center">Gestion des Régions</h2>

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
    @endif

    <button class="btn btn-primary mb-3" wire:click="openModal">
        Ajouter une région
    </button>
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
                                <th style="min-width: 200px;"><strong>Nom Region</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($regions as $region)
                                <tr>
                                     <td>{{ $region->nom_regions }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="edit({{ $region->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"
                                                title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer cette Region ?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $region->id }})"
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
                                    <td colspan="2" class="text-center text-muted">Aucune Region trouvé.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                   <div>
                     {{$regions->links()}}
                   </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade @if($isModalOpen) show d-block @endif" tabindex="-1" role="dialog" @if($isModalOpen) style="background: rgba(0,0,0,0.5);" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $region_id ? 'Modifier' : 'Ajouter' }} une région</h5>
                        <button type="button" class="btn-close" wire:click="closeModal">
                            {{-- <span>&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" wire:model="nom_regions">
                            @error('nom_regions') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" wire:model="description_regions"></textarea>
                            @error('description_regions') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

