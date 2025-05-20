<div class="card shadow-sm mx-auto my-4" style="max-width: 700px;">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            @if ($isEdit)
                Édition de l'entreprise
            @else
                Détails de l'entreprise
            @endif
        </h4>
        <button wire:click.prevent="toggleEdit" class="btn btn-light btn-sm">
            {{ $isEdit ? 'Annuler' : 'Modifier' }}
        </button>
    </div>

    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="save" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nom de l'entreprise</label>
                <input type="text" wire:model.defer="form.nom_entreprise" class="form-control" @if($isView) disabled @endif>
                @error('form.nom_entreprise') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" wire:model.defer="form.email_entreprise" class="form-control" @if($isView) disabled @endif>
                @error('form.email_entreprise') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Téléphone</label>
                <input type="text" wire:model.defer="form.tel_entreprise" class="form-control" @if($isView) disabled @endif>
                @error('form.tel_entreprise') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <input type="text" wire:model.defer="form.addresse_entreprise" class="form-control" @if($isView) disabled @endif>
                @error('form.addresse_entreprise') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Forme Juridique</label>
                <input type="text" wire:model.defer="form.forme_juridique_entreprise" class="form-control" @if($isView) disabled @endif>
                @error('form.forme_juridique_entreprise') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea wire:model.defer="form.description_entreprise" rows="4" class="form-control" @if($isView) disabled @endif></textarea>
                @error('form.description_entreprise') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Logo</label>
                @if ($old_logo)
                    <div class="mb-2">
                        <img src="{{ Storage::url($old_logo) }}" alt="Logo actuel" class="img-thumbnail" style="height: 100px;">
                    </div>
                @endif
                @if ($isEdit)
                    <input type="file" wire:model="logo_entreprise" class="form-control">
                    @error('logo_entreprise') <div class="text-danger small">{{ $message }}</div> @enderror

                    @if ($logo_entreprise)
                        <div class="mt-2">
                            <img src="{{ $logo_entreprise->temporaryUrl() }}" alt="Aperçu logo" class="img-thumbnail" style="height: 100px;">
                        </div>
                    @endif
                @endif
            </div>

            @if ($isEdit)
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            @endif
        </form>
    </div>
</div>
