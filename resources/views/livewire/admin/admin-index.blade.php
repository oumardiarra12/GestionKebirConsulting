<div class="container py-4">
    <!-- Button to trigger modal -->
    <button class="btn btn-primary mb-4" wire:click="create">Ajouter Admin</button>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Utilisateurs</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>Nom</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Téléphone</strong></th>
                                <th><strong></strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($administrateurs as $admin)
                            <tr wire:key="admin-{{ $admin->id }}">

                                <td><div class="d-flex align-items-center"> <img
                                    src="{{ $admin->photo_admin ? Storage::url($admin->photo_admin) : asset('images/default-avatar.png') }}"
                                    alt="Photo de {{ $admin->nom_admin }}"
                                    class="rounded-circle"
                                    style="width: 40px; height: 40px; object-fit: cover;"> <span class="w-space-no">{{ $admin->nom_admin }}</span></div></td>
                                <td>{{ $admin->email }}	</td>
                                <td>{{ $admin->tel_admin }}</td>

                                <td>
                                    <div class="d-flex">
                                        <button wire:click="edit({{ $admin->id }})" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button onclick="confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?') || event.stopImmediatePropagation()" wire:click="delete({{ $admin->id }})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade @if($isModalOpen) show d-block @endif" tabindex="-1" style="@if($isModalOpen) display: block; background-color: rgba(0,0,0,0.5); @endif">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form wire:submit.prevent="{{ $adminId ? 'update' : 'store' }}">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $adminId ? 'Modifier Admin' : 'Ajouter Admin' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nom_admin" class="form-label">Nom</label>
                                <input type="text" id="nom_admin" wire:model="nom_admin" class="form-control">
                                @error('nom_admin') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" wire:model="email" class="form-control">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tel_admin" class="form-label">Téléphone</label>
                                <input type="text" id="tel_admin" wire:model="tel_admin" class="form-control">
                                @error('tel_admin') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" id="password" wire:model="password" class="form-control">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label for="description_admin" class="form-label">Description</label>
                                <textarea id="description_admin" wire:model="description_admin" class="form-control"></textarea>
                                @error('description_admin') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label for="photo_admin" class="form-label">Photo</label>
                                <input type="file" id="photo_admin" wire:model="photo_admin" class="form-control">
                                @error('photo_admin') <small class="text-danger">{{ $message }}</small> @enderror

                                @if ($photo_admin)
                                <img src="{{ $photo_admin->temporaryUrl() }}" class="img-thumbnail mt-2" width="100" alt="Preview">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                        <button type="submit" class="btn btn-primary">{{ $adminId ? 'Mettre à jour' : 'Ajouter' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
