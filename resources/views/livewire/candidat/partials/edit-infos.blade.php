<form wire:submit.prevent="save" class="p-3">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" wire:model.defer="nom_candidat">
            @error('nom_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Prénom</label>
            <input type="text" class="form-control" wire:model.defer="prenom_candidat">
            @error('prenom_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" wire:model.defer="email">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Date de naissance</label>
            <input type="date" class="form-control" wire:model.defer="datenaissance_candidat">
            @error('datenaissance_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Lieu de naissance</label>
            <input type="text" class="form-control" wire:model.defer="lieunaissance_candidat">
            @error('lieunaissance_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Sexe</label>
            <select class="form-control" wire:model.defer="sexe_candidat">
                <option value="">Sélectionner</option>
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select>
            @error('sexe_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Nationalité</label>
            <input type="text" class="form-control" wire:model.defer="nationalite_candidat">
            @error('nationalite_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Téléphone</label>
        <input type="text" class="form-control" wire:model.defer="tel_candidat">
        @error('tel_candidat') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Situation matrimoniale</label>
            <select class="form-control" wire:model.defer="situationmatrimoniale_candidat">
                <option value="">Sélectionner</option>
                <option value="celibataire">Célibataire</option>
                <option value="marie">Marié(e)</option>

            </select>
            @error('situationmatrimoniale_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Nombre d'enfants</label>
            <input type="number" class="form-control" wire:model.defer="nombreenfant_candidat" min="0">
            @error('nombreenfant_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Adresse</label>
        <textarea class="form-control" rows="2" wire:model.defer="adresse_candidat"></textarea>
        @error('adresse_candidat') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">URL LinkedIn</label>
        <input type="url" class="form-control" wire:model.defer="urllinkedln_candidat">
        @error('urllinkedln_candidat') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control" wire:model="photo_candidat">
            @if ($this->photoUrl)
                <div class="mt-2">
                    <img src="{{ $this->photoUrl }}" class="img-thumbnail" width="150">
                    <button type="button" class="btn btn-sm btn-danger mt-1" wire:click="removePhoto">Supprimer</button>
                </div>
            @endif
            @error('photo_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">CV</label>
            <input type="file" class="form-control" wire:model="cv_candidat">
            @if ($this->cvUrl)
                <div class="mt-2">
                    <a href="{{ $this->cvUrl }}" target="_blank">Voir le CV</a>
                    <button type="button" class="btn btn-sm btn-danger mt-1" wire:click="removeCv">Supprimer</button>
                </div>
            @endif
            @error('cv_candidat') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" wire:model.defer="password">
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Confirmer mot de passe</label>
            <input type="password" class="form-control" wire:model.defer="password_confirmation">
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" type="submit">Enregistrer</button>
    </div>
</form>
