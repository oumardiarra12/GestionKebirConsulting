<div class="container mt-4" x-data>
    <div class="row">
        <div class="col-xl-12">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('emplois.index') }}" class="btn btn-primary">Liste des Emplois</a>
                <h4>{{ $emploiId ? 'Modifier' : 'Créer' }} une offre d’emploi</h4>
            </div>

            <form wire:submit.prevent="save" class="row g-3">
                <div class="col-xl-8">
                    <div class="mb-3">
                        <label for="titre_emplois" class="form-label">Titre</label>
                        <input type="text" wire:model.defer="titre_emplois" class="form-control" placeholder="Saisir le titre">
                        @error('titre_emplois') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Date début</label>
                            <input type="date" wire:model.defer="date_debut_emplois" class="form-control">
                            @error('date_debut_emplois') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Date fin</label>
                            <input type="date" wire:model.defer="date_fin_emplois" class="form-control">
                            @error('date_fin_emplois') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea wire:model.defer="description_emplois" class="form-control" rows="32"></textarea>
                        @error('description_emplois') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="sticky-top" style="top: 80px;">
                        <div class="card">
                            <div class="card-header">Informations supplémentaires</div>
                            <div class="card-body">

                                <!-- Métier -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Métier</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('metier_id', $($el).val()))"
                                            data-placeholder="Sélectionner un métier">
                                        <option value="">Sélectionner</option>
                                        @foreach ($metiers as $metier)
                                            <option value="{{ $metier->id }}" @selected($metier->id == $metier_id)>
                                                {{ $metier->nom_metier }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('metier_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Secteur -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Secteur</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('secteur_id', $($el).val()))">
                                        <option value="">Sélectionner</option>
                                        @foreach ($secteurs as $secteur)
                                            <option value="{{ $secteur->id }}" @selected($secteur->id == $secteur_id)>
                                                {{ $secteur->nom_secteur }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('secteur_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Niveau d'étude -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Niveau d'étude</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('niveau_etude_id', $($el).val()))">
                                        <option value="">Sélectionner</option>
                                        @foreach ($niveauxEtudes as $niveau)
                                            <option value="{{ $niveau->id }}" @selected($niveau->id == $niveau_etude_id)>
                                                {{ $niveau->nom_niveau_etude }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('niveau_etude_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Type de contrat -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Type de contrat</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('type_contrat_id', $($el).val()))">
                                        <option value="">Sélectionner</option>
                                        @foreach ($typesContrats as $type)
                                            <option value="{{ $type->id }}" @selected($type->id == $type_contrat_id)>
                                                {{ $type->nom_type_contrat}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type_contrat_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Niveau d'expérience -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Niveau d'expérience</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('niveau_global_experience_id', $($el).val()))">
                                        <option value="">Sélectionner</option>
                                        @foreach ($niveauxExperience as $niveau)
                                            <option value="{{ $niveau->id }}" @selected($niveau->id == $niveau_global_experience_id)>
                                                {{ $niveau->nom_niveau_global_experience }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('niveau_global_experience_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Rémunération -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Rémunération</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('renumeration_id', $($el).val()))">
                                        <option value="">Sélectionner</option>
                                        @foreach ($renumerations as $renumeration)
                                            <option value="{{ $renumeration->id }}" @selected($renumeration->id == $renumeration_id)>
                                                {{ $renumeration->nom_renumeration }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('renumeration_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Région -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Région</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('region_id', $($el).val()))">
                                        <option value="">Sélectionner</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}" @selected($region->id == $region_id)>
                                                {{ $region->nom_regions }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('region_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Partenaire -->
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">Partenaire</label>
                                    <select class="form-select select2"
                                            x-init="$($el).select2().on('change', e => @this.set('partenaire_id', $($el).val()))">
                                        <option value="">Sélectionner</option>
                                        @foreach ($partenaires as $partenaire)
                                            <option value="{{ $partenaire->id }}" @selected($partenaire->id == $partenaire_id)>
                                                {{ $partenaire->nom_partenaire }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('partenaire_id') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <!-- Statut -->
                                <div class="mb-3">
                                    <label class="form-label">Statut</label>
                                    <select wire:model.defer="status_emploi" class="form-select">
                                        <option value="">Sélectionner</option>
                                        <option value="Publier">Publier</option>
                                        <option value="Brouillon">Brouillon</option>
                                        <option value="Cloture">Clôturé</option>
                                    </select>
                                    @error('status_emploi') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        {{ $emploiId ? 'Mettre à jour' : 'Créer' }}
                    </button>
                    <a href="{{ route('emplois.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
