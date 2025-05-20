<div class="container mt-5" style="max-width: 480px;">
    <h3 class="mb-4 text-center fw-semibold">Changer mon email</h3>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <form wire:submit.prevent="changeEmail" novalidate>

        <div class="mb-4">
            <label for="current_email" class="form-label fw-medium">Email actuel <small class="text-muted">(vérification)</small></label>
            <input
                type="email"
                id="current_email"
                class="form-control @error('current_email') is-invalid @enderror"
                wire:model.defer="current_email"
                placeholder="Saisir votre email actuel"
                autocomplete="email"
            >
            @error('current_email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label fw-medium">Mot de passe <small class="text-muted">(vérification)</small></label>
            <input
                type="password"
                id="password"
                class="form-control @error('password') is-invalid @enderror"
                wire:model.defer="password"
                placeholder="Saisir votre mot de passe"
                autocomplete="current-password"
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="new_email" class="form-label fw-medium">Nouvel email</label>
            <input
                type="email"
                id="new_email"
                class="form-control @error('new_email') is-invalid @enderror"
                wire:model.defer="new_email"
                placeholder="Saisir votre nouvel email"
                required
                autocomplete="email"
            >
            @error('new_email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @error('auth')
            <div class="alert alert-danger py-2" role="alert">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2">Mettre à jour</button>
    </form>
</div>
