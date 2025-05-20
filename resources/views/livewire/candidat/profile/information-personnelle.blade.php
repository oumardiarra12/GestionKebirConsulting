<div>

    <div>
        <form wire:submit.prevent="save">
            {{-- Erreurs globales --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- PHOTO & CV -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Photo et CV</h5>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        {{-- Photo du candidat --}}
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Photo du candidat</label>
                            <div class="d-flex align-items-start gap-3">
                                <label for="photo" class="position-relative" style="cursor: pointer;">
                                    @php
                                        use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
                                        $isTemporary = $photo_candidat instanceof TemporaryUploadedFile;
                                    @endphp

                                    @if ($photo_candidat)
                                        <img src="{{ $isTemporary ? $photo_candidat->temporaryUrl() : Storage::url($photo_candidat) }}"
                                            class="img-thumbnail"
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="small text-muted text-center mt-1">Changer la photo</div>
                                    @else
                                        <div class="d-flex justify-content-center align-items-center border border-secondary border-dashed rounded"
                                            style="width: 150px; height: 150px;">
                                            <span class="text-muted text-center">Cliquer<br>pour choisir</span>
                                        </div>
                                    @endif
                                    <input type="file" id="photo" wire:model="photo_candidat" accept="image/*"
                                        class="d-none @error('photo_candidat') is-invalid @enderror">
                                </label>
                                <div class="flex-grow-1">
                                    <p class="small text-muted">Formats : PNG, JPG, JPEG, GIF</p>
                                    @if ($photo_candidat)
                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                            wire:click="removePhoto">Retirer</button>
                                    @endif
                                    @error('photo_candidat')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- CV du candidat --}}
                        <div class="col-md-6">
                            <label for="cv" class="form-label">Mon CV</label>
                            <div class="d-flex align-items-start gap-3">
                                <label for="cv" class="position-relative" style="cursor: pointer;">
                                    <div class="d-flex justify-content-center align-items-center border border-secondary border-dashed rounded"
                                        style="width: 150px; height: 150px;">
                                        @if ($cv_candidat)
                                            <i class="bi bi-file-earmark-pdf-fill fs-1 text-danger"></i>
                                        @else
                                            <span class="text-muted text-center">Cliquer<br>pour choisir</span>
                                        @endif
                                        <input type="file" id="cv" wire:model="cv_candidat" accept=".pdf"
                                            class="d-none @error('cv_candidat') is-invalid @enderror">
                                    </div>
                                </label>
                                <div class="flex-grow-1">
                                    @if ($cv_candidat)
                                        <p class="small text-muted">
                                            {{ is_string($cv_candidat) ? $cv_candidat : 'CV sélectionné' }}</p>
                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                            wire:click="removeCV">Retirer le CV</button>
                                    @endif
                                    @error('cv_candidat')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROFIL DU CANDIDAT -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Profil du candidat</h5>
                </div>
                <div class="card-body">
                    {{-- Niveau d'étude --}}
                    <div class="mb-4">
                        <label class="form-label">Niveau d'étude</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($niveaux_etude as $niveau)
                                <label class="form-check">
                                    <input type="radio" class="form-check-input" wire:model.lazy="niveau_etude_id"
                                        value="{{ $niveau->id }}">
                                    {{ $niveau->nom_niveau_etude }}
                                </label>
                            @endforeach
                        </div>
                        @error('niveau_etude_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Formations --}}
                    <hr>
                    <h6>Formations</h6>
                    @foreach ($formations as $index => $formation)
                        <div class="card p-3 mb-3 border-start border-3 border-primary">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label class="form-label small">Date début</label>
                                    <input type="date" class="form-control"
                                        wire:model.defer="formations.{{ $index }}.date_debut_formation">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small">Date fin</label>
                                    <input type="date" class="form-control"
                                        wire:model.defer="formations.{{ $index }}.date_fin_formation"
                                        @if ($formation['encours_formation']) disabled @endif>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"
                                            wire:model="formations.{{ $index }}.encours_formation">
                                        <label class="form-check-label small">En cours</label>
                                    </div>
                                </div>
                                <div class="col-md-3 text-end">
                                    <button class="btn btn-outline-danger btn-sm"
                                        wire:click.prevent="retirerFormation({{ $index }})">Retirer</button>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Diplôme"
                                        wire:model.defer="formations.{{ $index }}.diplome_formation">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Établissement"
                                        wire:model.defer="formations.{{ $index }}.etablissement_formation">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="3" placeholder="Description"
                                        wire:model.defer="formations.{{ $index }}.description_formation"></textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-sm btn-primary mb-4" wire:click="ajouterFormation">+
                        Ajouter une formation</button>

                    {{-- Niveau global d'expérience --}}
                    <div class="mb-4">
                        <label class="form-label">Niveau global d'expérience</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($niveaux_global_experience as $niveau)
                                <label class="form-check">
                                    <input type="radio" class="form-check-input"
                                        wire:model.lazy="niveau_global_experience_id" value="{{ $niveau->id }}">
                                    {{ $niveau->nom_niveau_global_experience }}
                                </label>
                            @endforeach
                        </div>
                        @error('niveau_global_experience_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Expériences professionnelles --}}
                    <hr>
                    <h6>Expériences professionnelles</h6>
                    @foreach ($experiences as $index => $experience)
                        <div class="card p-3 mb-3 border-start border-3 border-success">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label class="form-label small">Date début</label>
                                    <input type="date" class="form-control"
                                        wire:model.defer="experiences.{{ $index }}.date_debut_experience">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small">Date fin</label>
                                    <input type="date" class="form-control"
                                        wire:model.defer="experiences.{{ $index }}.date_fin_experience"
                                        @if ($experience['encours_experience']) disabled @endif>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"
                                            wire:model="experiences.{{ $index }}.encours_experience">
                                        <label class="form-check-label small">En cours</label>
                                    </div>
                                </div>
                                <div class="col-md-3 text-end">
                                    <button class="btn btn-outline-danger btn-sm"
                                        wire:click.prevent="retirerExperience({{ $index }})">Retirer</button>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Poste"
                                        wire:model.defer="experiences.{{ $index }}.poste_experience">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Entreprise"
                                        wire:model.defer="experiences.{{ $index }}.entreprise_experience">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="3" placeholder="Description"
                                        wire:model.defer="experiences.{{ $index }}.description_poste"></textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-sm btn-primary mb-3" wire:click="ajouterExperience">+
                        Ajouter une expérience</button>

                    {{-- Bouton final --}}
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-4 py-2">Enregistrer et continuer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
