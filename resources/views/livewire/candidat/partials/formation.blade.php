<div class="container mt-4">
    <h4 class="mb-4 fw-bold text-primary">Formations</h4>

    <button
        class="btn btn-primary mb-4 d-flex align-items-center gap-2"
        data-bs-toggle="modal"
        data-bs-target="#formationModal"
        wire:click="resetForm"
    >
       <i class="fas fa-plus"></i> Ajouter une formation
    </button>

    <!-- Table des formations -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase text-secondary small">
                <tr>
                    <th>Diplôme</th>
                    <th>Établissement</th>
                    <th>Période</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($formations as $formation)
                    <tr>
                        <td class="fw-semibold">{{ $formation->diplome_formation }}</td>
                        <td>{{ $formation->etablissement_formation }}</td>
                        <td class="text-muted" style="min-width: 150px;">
                            {{ \Carbon\Carbon::parse($formation->date_debut_formation)->format('Y') }} -
                            {{ $formation->encours_formation ? 'En cours' : \Carbon\Carbon::parse($formation->date_fin_formation)->format('Y') }}
                        </td>
                        <td class="text-end">
                            <button
                                class="btn btn-sm btn-outline-warning me-2"
                                data-bs-toggle="modal"
                                data-bs-target="#formationModal"
                                wire:click="edit({{ $formation->id }})"
                                title="Modifier"
                            >
                               <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button
                                wire:click="delete({{ $formation->id }})"
                                class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Supprimer cette formation ?') || event.stopImmediatePropagation()"
                                title="Supprimer"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted fst-italic py-4">Aucune formation ajoutée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="formationModal" tabindex="-1" aria-labelledby="formationModalLabel" aria-hidden="true" x-data="{ encours: @entangle('encours_formation') }">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <form wire:submit.prevent="save" class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-primary fw-bold" id="formationModalLabel">
                        {{ $editing ? 'Modifier la formation' : 'Ajouter une formation' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="diplome_formation" class="form-label fw-semibold">Diplôme <span class="text-danger">*</span></label>
                            <input
                                id="diplome_formation"
                                type="text"
                                wire:model.defer="diplome_formation"
                                class="form-control @error('diplome_formation') is-invalid @enderror"
                                placeholder="Ex: Licence Informatique"
                                autocomplete="off"
                            >
                            @error('diplome_formation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="etablissement_formation" class="form-label fw-semibold">Établissement <span class="text-danger">*</span></label>
                            <input
                                id="etablissement_formation"
                                type="text"
                                wire:model.defer="etablissement_formation"
                                class="form-control @error('etablissement_formation') is-invalid @enderror"
                                placeholder="Ex: Université de Bamako"
                                autocomplete="off"
                            >
                            @error('etablissement_formation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="date_debut_formation" class="form-label fw-semibold">Date de début <span class="text-danger">*</span></label>
                            <input
                                id="date_debut_formation"
                                type="date"
                                wire:model.defer="date_debut_formation"
                                class="form-control @error('date_debut_formation') is-invalid @enderror"
                            >
                            @error('date_debut_formation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6" x-data>
                            <label for="date_fin_formation" class="form-label fw-semibold">Date de fin</label>
                            <input
                                id="date_fin_formation"
                                type="date"
                                wire:model.defer="date_fin_formation"
                                class="form-control @error('date_fin_formation') is-invalid @enderror"
                                :disabled="encours"
                                :class="{ 'bg-light': encours }"
                            >
                            @error('date_fin_formation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input
                                    id="encours_formation"
                                    type="checkbox"
                                    wire:model.defer="encours_formation"
                                    class="form-check-input"
                                    x-model="encours"
                                >
                                <label for="encours_formation" class="form-check-label fw-semibold">Formation en cours</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="description_formation" class="form-label fw-semibold">Description</label>
                            <textarea
                                id="description_formation"
                                wire:model.defer="description_formation"
                                class="form-control"
                                rows="3"
                                placeholder="Détails, matières, spécialités, etc."
                            ></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 pt-3 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="bi bi-check-lg"></i> {{ $editing ? 'Mettre à jour' : 'Ajouter' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('livewire:init', () => {
    Livewire.on('formation-saved', () => {
        const modalEl = document.getElementById('formationModal');
        const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();
    });
});
</script>
@endpush

