<div class="card border-0 shadow rounded-4 mb-4">
    <div class="card-body p-4">
        <h4 class="mb-4 text-primary fw-bold border-bottom pb-2 d-flex align-items-center gap-2">
            <i class="fas fa-user-circle"></i> Profil du Candidat
        </h4>

        {{-- Photo & CV en haut --}}
        <div class="row g-4 mb-4 align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <small class="text-uppercase text-secondary fw-bold">Photo</small><br>
                @if ($candidat->photo_candidat)
                    <img src="{{ asset('storage/' . $candidat->photo_candidat) }}"
                        alt="Photo du candidat"
                        class="rounded-circle border shadow-sm mt-2"
                        style="width: 140px; height: 140px; object-fit: cover;">
                @else
                    <em class="text-muted">Non disponible</em>
                @endif
            </div>

            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">CV</small><br>
                @if ($candidat->cv_candidat)
                    <a href="{{ asset('storage/' . $candidat->cv_candidat) }}" target="_blank"
                        class="btn btn-outline-primary btn-sm mt-2 d-flex align-items-center gap-2">
                        <i class="fas fa-file-alt"></i> Voir le CV
                    </a>
                @else
                    <em class="text-muted">Non disponible</em>
                @endif
            </div>
        </div>

        <hr class="my-4">

        <div class="row g-4">
            {{-- Nom & Prénom --}}
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Nom</small>
                <p class="fs-5 text-dark">{{ $candidat->nom_candidat }}</p>
            </div>
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Prénom</small>
                <p class="fs-5 text-dark">{{ $candidat->prenom_candidat }}</p>
            </div>

            {{-- Date & Lieu de naissance --}}
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Date de naissance</small>
                <p class="fs-6 text-muted">{{ \Carbon\Carbon::parse($candidat->datenaissance_candidat)->format('d/m/Y') }}</p>
            </div>
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Lieu de naissance</small>
                <p class="fs-6 text-muted">{{ $candidat->lieunaissance_candidat }}</p>
            </div>

            {{-- Sexe & Nationalité --}}
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Sexe</small>
                <p class="fs-6 text-muted">{{ $candidat->sexe_candidat }}</p>
            </div>
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Nationalité</small>
                <p class="fs-6 text-muted">{{ $candidat->nationalite_candidat }}</p>
            </div>

            {{-- Email & Téléphone --}}
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Email</small>
                <p class="fs-6">
                    <a href="mailto:{{ $candidat->email }}" class="text-decoration-none text-primary">
                        <i class="fas fa-envelope me-1"></i>{{ $candidat->email }}
                    </a>
                </p>
            </div>
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Téléphone</small>
                <p class="fs-6"><i class="fas fa-phone me-1"></i>{{ $candidat->tel_candidat }}</p>
            </div>

            {{-- Situation matrimoniale & Adresse --}}
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Situation matrimoniale</small>
                <p class="fs-6 text-muted">{{ $candidat->situationmatrimoniale_candidat }}</p>
            </div>
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Adresse</small>
                <p class="fs-6 text-muted">{{ $candidat->adresse_candidat }}</p>
            </div>

            {{-- Enfants & Mot de passe --}}
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Nombre d'enfants</small>
                <p class="fs-6 text-muted">{{ $candidat->nombreenfant_candidat }}</p>
            </div>
            <div class="col-md-6">
                <small class="text-uppercase text-secondary fw-bold">Mot de passe</small>
                <p class="fs-6 text-muted">••••••••</p>
            </div>

            {{-- LinkedIn --}}
            <div class="col-md-12 mt-3">
                <small class="text-uppercase text-secondary fw-bold">LinkedIn</small><br>
                @if ($candidat->urllinkedln_candidat)
                    <a href="{{ $candidat->urllinkedln_candidat }}" target="_blank" class="text-decoration-none text-primary d-flex align-items-center gap-2">
                        <i class="fab fa-linkedin fa-lg"></i>
                        <span class="text-truncate" style="max-width: 280px;">{{ $candidat->urllinkedln_candidat }}</span>
                    </a>
                @else
                    <em class="text-muted">Non renseigné</em>
                @endif
            </div>
        </div>
    </div>
</div>
