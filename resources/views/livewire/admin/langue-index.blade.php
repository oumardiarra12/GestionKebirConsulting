<div class="p-4 bg-white rounded shadow-sm">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <!-- Table des langues -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des langues</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle mb-0">
                        <thead>
                            <tr>
                                <th><strong>Nom de la langue</strong></th>
                                <th class="text-center"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($langues as $langue)
                            <tr>
                                <td>{{ $langue->nom_langue }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button
                                            wire:click="edit({{ $langue->id }})"
                                            class="btn btn-warning btn-sm me-2"
                                            data-bs-toggle="tooltip"
                                            title="Modifier">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button
                                            onclick="confirm('Êtes-vous sûr de vouloir supprimer cette langue ?') || event.stopImmediatePropagation()"
                                            wire:click="delete({{ $langue->id }})"
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
                        {{$langues->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button pour ouvrir le modal -->
    <button wire:click="openModal" class="btn btn-success mt-3">Ajouter une langue</button>

    <!-- Modal -->
    @if($isOpen)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $langue_id ? 'Modifier la langue' : 'Ajouter une langue' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nom_langue" class="form-label">Nom de la langue</label>
                            <input type="text" wire:model="nom_langue" id="nom_langue" class="form-control" placeholder="Nom de la langue">
                            @error('nom_langue') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                        <button type="button" wire:click="{{ $langue_id ? 'update' : 'store' }}" class="btn btn-primary">
                            {{ $langue_id ? 'Mettre à jour' : 'Ajouter' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
