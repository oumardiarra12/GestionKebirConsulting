<div class="container mt-4">
    <form wire:submit.prevent="save">
        {{-- Disponibilité --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Disponibilité du candidat</h5>
            </div>
            <div class="card-body">
                @foreach ($disponibilites as $dispo)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="disponibilite"
                            id="dispo_{{ $dispo->id }}" wire:model="selectedDisponibilite"
                            value="{{ $dispo->id }}">
                        <label class="form-check-label" for="dispo_{{ $dispo->id }}">
                            {{ $dispo->nom_disponibilite }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Métiers et Secteurs --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Métiers et secteurs</h5>
            </div>
            <div class="card-body row g-4">
                {{-- Métiers --}}
                <div class="col-md-6">
                    <label class="form-label">Sélectionner un métier</label>
                    <select wire:model="selectedMetier" wire:change="addMetier($event.target.value)"
                        class="form-select mb-2">
                        <option value="">-- Choisir un métier --</option>
                        @foreach ($allMetiers as $metier)
                            <option value="{{ $metier->id }}">{{ $metier->nom_metier }}</option>
                        @endforeach
                    </select>

                    @if ($metiers)
                        <ul class="list-group">
                            @foreach ($metiers as $id)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $allMetiers->find($id)?->nom_metier }}
                                    <button type="button" wire:click="removeMetier({{ $id }})"
                                        class="btn btn-sm btn-outline-danger btn-close" aria-label="Retirer"></button>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- Secteurs --}}
                <div class="col-md-6">
                    <label class="form-label">Sélectionner un secteur</label>
                    <select wire:model="selectedSecteur" wire:change="addSecteur($event.target.value)"
                        class="form-select mb-2">
                        <option value="">-- Choisir un secteur --</option>
                        @foreach ($allSecteurs as $secteur)
                            <option value="{{ $secteur->id }}">{{ $secteur->nom_secteur }}</option>
                        @endforeach
                    </select>

                    @if ($secteurs)
                        <ul class="list-group">
                            @foreach ($secteurs as $id)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $allSecteurs->find($id)?->nom_secteur }}
                                    <button type="button" wire:click="removeSecteur({{ $id }})"
                                        class="btn btn-sm btn-outline-danger btn-close" aria-label="Retirer"></button>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        {{-- Mobilités --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Mobilité géographique</h5>
            </div>
            <div class="card-body row">
                @foreach ($mobilitesDisponibles as $mobilite)
                    <div class="col-md-4">
                        <div class="form-check mb-2">
                            <input type="checkbox" wire:model="mobilitesSelectionnees"
                                value="{{ $mobilite->id }}" class="form-check-input"
                                id="mobilite_{{ $mobilite->id }}">
                            <label class="form-check-label" for="mobilite_{{ $mobilite->id }}">
                                {{ $mobilite->nom_mobilite_geographique }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Types de contrat --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Types de contrat</h5>
            </div>
            <div class="card-body">
                @foreach ($typesContrat as $type)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox"
                            wire:model="selectedTypes" value="{{ $type->id }}"
                            id="type_{{ $type->id }}">
                        <label class="form-check-label" for="type_{{ $type->id }}">
                            {{ $type->nom_type_contrat }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Rémunération --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Rémunération souhaitée</h5>
            </div>
            <div class="card-body">
                <select wire:model="renumeration_id" id="renumeration" class="form-select">
                    <option value="">-- Choisir --</option>
                    @foreach ($renumerations as $renum)
                        <option value="{{ $renum->id }}">{{ $renum->nom_renumeration }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Bouton submit --}}
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Enregistrer et continuer</button>
        </div>

        {{-- Message de confirmation --}}
        @if (session()->has('message'))
            <div class="alert alert-success mt-3 text-center">
                {{ session('message') }}
            </div>
        @endif
    </form>
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            const select = $('#expertises');
            select.select2();

            select.on('change', function () {
                let data = $(this).val();
                @this.set('selectedExpertises', data);
            });

            Livewire.hook('message.processed', () => {
                select.select2();
            });
        });
    </script>
@endpush
