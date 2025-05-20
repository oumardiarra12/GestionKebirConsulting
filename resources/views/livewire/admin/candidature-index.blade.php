<div class="p-4 bg-white rounded shadow-sm" x-data="{
    draggedId: null,
    draggedElement: null,
    highlightColumn: null,
    showModal: @entangle('showModal').defer
}">
<h2>Offre d'Emploi de {{$titreposte}}</h2>
    <!-- Filtres -->
    <div class="row mb-4">
        {{-- <div class="col-md-6">
            <label class="form-label fw-semibold" for="rechercheTitreEmploi">Rechercher par titre d'emploi :</label>
            <input type="text" id="rechercheTitreEmploi" class="form-control" placeholder="Tapez un titre d'emploi..."
                wire:model.lazy="rechercheTitreEmploi" />
        </div> --}}
        <div class="col-md-6">
            <label class="form-label fw-semibold" for="filtreNiveauExperience">Filtrer par niveau d'expérience :</label>
            <select id="filtreNiveauExperience" class="form-select" wire:model.lazy="filtreNiveauExperience">
                <option value="">Tous les niveaux</option>
                @foreach ($niveauxExperience as $niveau)
                    <option value="{{ $niveau['nom_niveau_global_experience'] }}">
                        {{ $niveau['nom_niveau_global_experience'] }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row g-4">
        @foreach ($etapes as $key => $config)
            <div class="col-md-3">
                <h5 class="text-{{ $config['color'] }} fw-bold border-bottom pb-2">{{ $config['label'] }}</h5>
                <div class="border rounded-3 p-3 min-vh-50 bg-{{ $config['bg'] }} shadow-sm"
                    :class="{ 'border-3 border-{{ $config['color'] }}': highlightColumn === '{{ $key }}' }"
                    x-on:dragover.prevent="highlightColumn = '{{ $key }}'"
                    x-on:dragleave="highlightColumn = null"
                    x-on:drop.prevent="
                        $wire.changerEtape(draggedId, '{{ $key }}');
                        highlightColumn = null;
                        draggedId = null;
                        draggedElement = null;
                    ">
                    @forelse ($candidaturesParEtape[$key] ?? [] as $candidature)
                        <div class="card border-0 shadow-sm mb-3 bg-white" draggable="true"
                            x-on:dragstart="
                                draggedId = {{ $candidature['id'] }};
                                draggedElement = $el;
                                $el.classList.add('opacity-50');
                            "
                            x-on:dragend="
                                if (draggedElement) {
                                    draggedElement.classList.remove('opacity-50');
                                }
                                draggedElement = null;
                            ">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-person-circle fs-4 text-{{ $config['color'] }} me-2"></i>
                                    <h6 class="mb-0">{{ $candidature['candidat']['prenom_candidat'] }}
                                        {{ $candidature['candidat']['nom_candidat'] }}</h6>
                                </div>
                                <ul class="list-unstyled small text-muted mb-2">
                                    <li><i class="bi bi-person me-1"></i></i>
                                        {{ $candidature['candidat']['sexe_candidat'] == 'M' ? 'Homme' : 'Femme' }}</li>
                                    <li><i
                                            class="bi bi-telephone me-1"></i>{{ $candidature['candidat']['tel_candidat'] }}
                                    </li>
                                    <li><i class="bi bi-award me-1"></i>
                                        {{ $candidature['candidat']['candidatnges'][0]['nom_niveau_global_experience'] ?? 'Non défini' }}
                                    </li>
                                    <li><i class="bi bi-briefcase me-1"></i>
                                        {{ $candidature['emplois']['titre_emplois'] ?? 'N/A' }}</li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        @if($config['label']=='🎯 Sélectionnées')
                                        <button class="btn btn-sm btn-outline-secondary me-1"
                                            wire:click="changerStatus({{ $candidature['id'] }}, '{{ $candidature['status_candidature'] === 'accepter' ? 'refuser' : 'accepter' }}')"
                                            title="Changer le statut de la candidature">
                                            {{ $candidature['status_candidature'] === 'accepter' ? 'Refuser' : 'Accepter' }}
                                        </button>
                                        @endif
                                        <a href="{{ route('detailcandidat', $candidature['candidat']['id']) }}"
                                            class="btn btn-sm btn-outline-primary me-1"
                                            aria-label="Détail candidat">Détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-light border text-muted text-center">Aucune candidature</div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Rejet -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rejetModalLabel" aria-hidden="true"
        x-show="showModal" x-cloak x-transition x-on:keydown.escape.window="showModal = false">
        <div class="modal-dialog modal-dialog-centered" role="document" @click.away="showModal = false">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="rejetModalLabel">Confirmation de Rejet</h5>
                    <button type="button" class="btn-close btn-close-white" @click="showModal = false"
                        aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment rejeter cette candidature ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" @click="showModal = false">Annuler</button>
                    <button type="button" class="btn btn-danger" wire:click="rejeterCandidature">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</div>
