<div class="page-content">
    <!-- Banner -->
    <div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark py-5"
        style="background-image: url(assets/images/banner/bnr1.jpg); margin-top: 90px;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h4 class="text-white fw-bold mb-3">Finaliser la Candidature</h4>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"
                                class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active text-white fw-semibold" aria-current="page">Finaliser la
                            Candidature</li>
                    </ol>
                </nav>
                <!-- Breadcrumb End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <div class="container mt-5 mb-5">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="submit" class="bg-white p-4 shadow rounded-3">
            {{-- Lettre de motivation --}}
            <div class="accordion mb-4" id="accordionLettreMotivation">
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header" id="headingLettreMotivation">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseLettreMotivation" aria-expanded="false"
                            aria-controls="collapseLettreMotivation">
                            Lettre de motivation (facultatif)
                        </button>
                    </h2>
                    <div id="collapseLettreMotivation" class="accordion-collapse collapse"
                        aria-labelledby="headingLettreMotivation" data-bs-parent="#accordionLettreMotivation">
                        <div class="accordion-body">
                            <textarea wire:model.defer="lettre_motivation" id="lettre_motivation" rows="6"
                                class="form-control border border-secondary-subtle rounded" placeholder="Exprimez votre motivation..."></textarea>
                            @error('lettre_motivation')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                </div>
            </div>

            {{-- Rémunérations --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Rémunérations souhaitées</label>
                <select class="form-select" wire:model="selectedRenumerations">
                    <option value="">-- Sélectionner une option --</option>
                    @foreach ($renumerations as $renum)
                        <option value="{{ $renum->id }}">{{ $renum->nom_renumeration }} FCFA</option>
                    @endforeach
                </select>
                @error('selectedRenumerations')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- Case à cocher pour activer l'upload de CV --}}
            <div x-data="{ showCV: false }" class="mt-3">
                <div class="form-check mb-3">
                    <input type="checkbox" id="toggleCvUpload" class="form-check-input" x-model="showCV">
                    <label for="toggleCvUpload" class="form-check-label">CV (facultatif)</label>
                </div>

                {{-- Champ d’upload du CV --}}
                <div x-show="showCV" x-transition>
                    <div class="mb-3 border border-secondary rounded p-3">
                        <label for="cv" class="form-label fw-bold">
                            <i class="fas fa-upload me-2"></i> Téléchargez votre CV
                        </label>
                        <input type="file" wire:model="cv" id="cv" class="form-control">
                    </div>
                    @error('cv')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror

                    @if ($cv)
                        <div class="mt-2">
                            <i class="bi bi-paperclip me-1"></i> Fichier sélectionné :
                            <strong>{{ $cv->getClientOriginalName() }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bi bi-send-fill me-2"></i>Soumettre la candidature
                </button>
            </div>
        </form>
    </div>
</div>
