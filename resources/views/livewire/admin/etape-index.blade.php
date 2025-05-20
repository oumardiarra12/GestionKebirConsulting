<!-- resources/views/livewire/etape-crud.blade.php -->

<div class="p-4 bg-white rounded shadow">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-semibold"></h2>
        <button wire:click="openModal" class="btn btn-primary">Ajouter</button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des étapes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle">
                        <thead >
                            <tr>
                                <th style="min-width: 200px;"><strong>Nom</strong></th>
                                <th style="min-width: 200px;"><strong>Ordre</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($etapes as $etape)
                                <tr>
                                    <td>{{ $etape->nom_etape }}</td>
                                    <td>{{ $etape->order_etape }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="edit({{ $etape->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"
                                                title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer cet Etape ?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $etape->id }})"
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
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nom</th>
                    <th>Ordre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etapes as $etape)
                    <tr>
                        <td>{{ $etape->nom_etape }}</td>
                        <td>{{ $etape->order_etape }}</td>
                        <td>
                            <button wire:click="edit({{ $etape->id }})" class="btn btn-sm btn-outline-primary">Modifier</button>
                            <button onclick="confirm('Êtes-vous sûr de vouloir supprimer cet Étape ?') || event.stopImmediatePropagation()" wire:click="delete({{ $etape->id }})" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <!-- Modal -->
    @if($isOpen)
        <div class="modal d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $etape_id ? 'Modifier Étape' : 'Créer Étape' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <form wire:submit.prevent="store">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nom de l'étape</label>
                                <input type="text" wire:model.defer="nom_etape" class="form-control">
                                @error('nom_etape') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ordre</label>
                                <input type="number" wire:model.defer="order_etape" class="form-control">
                                @error('order_etape') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
