<div class="p-4 bg-white rounded shadow">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-semibold"></h2>
        <button class="btn btn-primary mb-3" wire:click="showCreateModal" >
            Ajouter Rémunération
        </button>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Liste des Rémunérations</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  align-middle">
                        <thead>
                            <tr>
                                <th style="min-width: 200px;"><strong>#</strong></th>
                                <th style="min-width: 200px;"><strong>Nom</strong></th>
                                <th style="min-width: 120px;"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($renumerations as $renum)
                                <tr>
                                    <td>{{ $renum->id }}</td>
                                    <td>{{ $renum->nom_renumeration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button wire:click="edit({{ $renum->id }})"
                                                class="btn btn-sm btn-warning shadow me-2"  title="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button
                                                onclick="confirm('Êtes-vous sûr de vouloir supprimer cet Etape ?') || event.stopImmediatePropagation()"
                                                wire:click="delete({{ $renum->id }})"
                                                class="btn btn-sm btn-danger shadow" title="Supprimer">
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
                     {{$renumerations->links()}}
                   </div>
                </div>
            </div>
        </div>
    </div>


    {{ $renumerations->links() }}
$@if ($isModalOpen)
  <!-- Modal -->
  <div class="modal d-block" tabindex="-1" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog">
        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEditMode ? 'Modifier' : 'Ajouter' }} Rémunération</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nom de la rémunération</label>
                        <input type="text" class="form-control" wire:model.defer="nom_renumeration">
                        @error('nom_renumeration')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-success">{{ $isEditMode ? 'Mettre à jour' : 'Enregistrer' }}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click="resetFields">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif

</div>
