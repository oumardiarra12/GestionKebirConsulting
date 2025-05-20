<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Liste des partenaires</h4>
        <div class="d-flex gap-2">
            <input type="text" class="form-control" placeholder="Recherche..." wire:model.live="search" />
            <button class="btn btn-primary" wire:click="openModal">Ajouter</button>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($partenaires as $p)
                    <tr>
                        <td>{{ $p->nom_partenaire }}</td>
                        <td>{{ $p->email_partenaire }}</td>
                        <td>{{ $p->tel_partenaire }}</td>
                        <td>
                            @if ($p->logo_partenaire)
                                <img src="{{ Storage::url($p->logo_partenaire) }}" width="50">
                            @endif
                        </td>
                        <td>
                            <button wire:click="edit({{ $p->id }})"
                                class="btn btn-sm btn-warning">Modifier</button>
                            <button wire:click="delete({{ $p->id }})" class="btn btn-sm btn-danger"
                                onclick="confirm('Confirmer la suppression ?') || event.stopImmediatePropagation()">Supprimer</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun partenaire trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $partenaires->links() }}
    </div>

    {{-- Modal --}}
    @if ($modal)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form wire:submit.prevent="store">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $partenaire_id ? 'Modifier' : 'Ajouter' }} Partenaire</h5>
                            <button type="button" class="btn-close" wire:click="closeModal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control" wire:model.defer="nom_partenaire">
                                    @error('nom_partenaire')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" wire:model.defer="email_partenaire">
                                    @error('email_partenaire')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" wire:model.defer="tel_partenaire">
                                    @error('tel_partenaire')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" class="form-control" wire:model.defer="adresse_partenaire">
                                    @error('adresse_partenaire')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Site web</label>
                                    <input type="text" class="form-control" wire:model.defer="siteweb_partenaire">
                                    @error('siteweb_partenaire')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Type</label>
                                    <input type="text" class="form-control" wire:model.defer="type_partenaire">
                                    @error('type_partenaire')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Logo</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="file" class="form-control" wire:model="new_logo_partenaire">
                                        @if ($logo_partenaire && !$new_logo_partenaire)
                                            <img src="{{ Storage::url($logo_partenaire) }}" width="60"
                                                height="60" class="rounded border">
                                        @endif
                                    </div>
                                    @error('new_logo_partenaire')
                                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary">Fermer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
