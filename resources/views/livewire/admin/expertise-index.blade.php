<!-- resources/views/livewire/expertise-crud.blade.php -->
<div class="p-4 bg-white rounded shadow-sm">
    <div class="d-flex justify-content-between mb-2">
        <h4></h4>
        <button class="btn btn-primary" wire:click="openModal">Ajouter</button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
  <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Expertises</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle">
                        <thead >
                            <tr>
                                <th style="min-width: 200px;"><strong>Nom Expertise</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expertises as $expertise)
                                <tr>
                                    <td>{{ $expertise->nom_expertise }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="edit({{ $expertise->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"
                                                title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer cet Expertise ?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $expertise->id }})"
                                                class="btn btn-sm btn-danger shadow"
                                                title="Supprimer">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">ucune expertise trouvée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                     <div>
    {{ $expertises->links() }}
</div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Bootstrap -->
    <div class="modal fade @if($modal) show d-block @endif" tabindex="-1" style="@if($modal) display: block; @endif background-color: rgba(0,0,0,0.5);">
        <div class="modal-dialog">
            <form wire:submit.prevent="store" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $expertise_id ? 'Modifier' : 'Ajouter' }} Expertise</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nom Expertise</label>
                        <input type="text" wire:model.defer="nom_expertise" class="form-control @error('nom_expertise') is-invalid @enderror">
                        @error('nom_expertise') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                    <button type="submit" class="btn btn-primary">{{ $expertise_id ? 'Mettre à jour' : 'Sauvegarder' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
