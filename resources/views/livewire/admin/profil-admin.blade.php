<div class="container my-4 bg-white p-4 rounded shadow-sm">
    <h2 class="h5 fw-bold text-dark">Modifier le profil</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nom</label>
            <input type="text" wire:model.defer="nom_admin" class="form-control" />
            @error('nom_admin') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" wire:model.defer="email" class="form-control" />
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Téléphone</label>
            <input type="text" wire:model.defer="tel_admin" class="form-control" />
            @error('tel_admin') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Description</label>
            <textarea wire:model.defer="description_admin" class="form-control" rows="3"></textarea>
            @error('description_admin') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Photo actuelle</label><br>
            @if ($photo_admin)
                <img src="{{ Storage::url($photo_admin) }}" alt="Photo" class="rounded-circle mt-2" width="80" height="80">
            @endif
        </div>

        <div class="col-12">
            <label class="form-label">Changer la photo</label>
            <input type="file" wire:model="new_photo_admin" class="form-control" />
            @error('new_photo_admin') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Nouveau mot de passe</label>
            <input type="password" wire:model.defer="password" class="form-control" />
            @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label">Confirmer le mot de passe</label>
            <input type="password" wire:model.defer="password_confirmation" class="form-control" />
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                Sauvegarder
            </button>
        </div>
    </form>
</div>
