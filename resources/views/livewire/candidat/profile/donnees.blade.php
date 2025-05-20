<div class="container mt-4">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="bg-white p-4 shadow rounded">
        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <label for="nom_candidat" class="form-label">Nom</label>
                <input type="text" id="nom_candidat" wire:model.defer="nom_candidat" class="form-control">
                @error('nom_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="prenom_candidat" class="form-label">Prénom</label>
                <input type="text" id="prenom_candidat" wire:model.defer="prenom_candidat" class="form-control">
                @error('prenom_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="datenaissance_candidat" class="form-label">Date de naissance</label>
                <input type="date" id="datenaissance_candidat" wire:model.defer="datenaissance_candidat" class="form-control">
                @error('datenaissance_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="lieunaissance_candidat" class="form-label">Lieu de naissance</label>
                <input type="text" id="lieunaissance_candidat" wire:model.defer="lieunaissance_candidat" class="form-control">
                @error('lieunaissance_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <label for="sexe_candidat" class="form-label">Sexe</label>
                <select id="sexe_candidat" wire:model.defer="sexe_candidat" class="form-select">
                    <option value="">-- Choisir --</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
                @error('sexe_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="nationalite_candidat" class="form-label">Nationalité</label>
                <input type="text" id="nationalite_candidat" wire:model.defer="nationalite_candidat" class="form-control">
                @error('nationalite_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="tel_candidat" class="form-label">Téléphone</label>
                <input type="text" id="tel_candidat" wire:model.defer="tel_candidat" class="form-control">
                @error('tel_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="adresse_candidat" class="form-label">Adresse</label>
                <input type="text" id="adresse_candidat" wire:model.defer="adresse_candidat" class="form-control">
                @error('adresse_candidat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                Enregistrer et continuer
            </button>
        </div>
    </form>
</div>
