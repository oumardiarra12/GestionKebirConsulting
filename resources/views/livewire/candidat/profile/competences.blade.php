<div>
    <div class="card shadow-sm rounded">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Ajouter une compétence</h5>
        </div>

        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form wire:submit.prevent="save">
                {{-- Nom compétence --}}
                <div class="mb-3">
                    <label for="nom_competence" class="form-label">Nom de la compétence</label>
                    <textarea wire:model.defer="nom_competence" class="form-control @error('nom_competence') is-invalid @enderror" id="nom_competence" rows="2" placeholder="Ex: Communication, Leadership..."></textarea>
                    @error('nom_competence') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <hr>

                {{-- Langues --}}
                <div class="mb-3">
                    <label class="form-label">Langues maîtrisées</label>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <select class="form-select" wire:model="langue_id">
                                <option value="">Choisir une langue</option>
                                @foreach ($langues as $langue)
                                    <option value="{{ $langue->id }}">{{ $langue->nom_langue }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select class="form-select" wire:model="niveau">
                                <option value="">Choisir niveau</option>
                                <option value="débutant">Débutant</option>
                                <option value="intermédiaire">Intermédiaire</option>
                                <option value="avance">Avancé</option>
                            </select>
                        </div>

                        <div class="col-md-2 d-grid">
                            <button type="button" class="btn btn-outline-primary"
                                wire:click="addLangue"
                                wire:loading.attr="disabled"
                                wire:target="addLangue">
                                <span wire:loading.remove wire:target="addLangue">Ajouter</span>
                                <span wire:loading wire:target="addLangue">...</span>
                            </button>
                        </div>
                    </div>
                </div>

                @if(count($languesTemp) > 0)
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Langue</th>
                                    <th>Niveau</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($languesTemp as $index => $item)
                                    <tr>
                                        <td>{{ $item['nom_langue'] }}</td>
                                        <td>{{ ucfirst($item['niveau']) }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-danger"
                                                wire:click="removeLangue({{ $index }})"
                                                wire:loading.attr="disabled">
                                                Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <hr>

                {{-- Expertises --}}
                <div class="mb-3">
                    <label for="expertises" class="form-label">Expertises associées</label>
                    <select id="expertises" class="form-select" wire:model.defer="selectedExpertises" multiple>
                        @foreach ($allExpertises as $expertise)
                            <option value="{{ $expertise->id }}">{{ $expertise->nom_expertise }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success px-4"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove>Enregistrer et continuer</span>
                        <span wire:loading>Enregistrement...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
