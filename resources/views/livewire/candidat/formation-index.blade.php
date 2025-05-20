<div>
    <button wire:click="create" class="bg-blue-600 text-white px-4 py-2 rounded">Ajouter une formation</button>

    @if ($formVisible)
        <div class="fixed inset-0  bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-lg">
                <h2 class="text-xl font-bold mb-4">
                    {{ $formationId ? 'Modifier Formation' : 'Ajouter Formation' }}
                </h2>

                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block font-semibold">Diplôme</label>
                        <input type="text" wire:model.defer="diplome_formation" class="w-full border rounded p-2">
                        @error('diplome_formation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-semibold">Établissement</label>
                        <input type="text" wire:model.defer="etablissement_formation" class="w-full border rounded p-2">
                        @error('etablissement_formation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-semibold">Date de début</label>
                        <input type="date" wire:model.defer="date_debut_formation" class="w-full border rounded p-2">
                        @error('date_debut_formation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    @if (!$encours_formation)
                        <div>
                            <label class="block font-semibold">Date de fin</label>
                            <input type="date" wire:model.defer="date_fin_formation" class="w-full border rounded p-2">
                            @error('date_fin_formation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    {{-- <div class="flex items-center gap-2">
                        <input type="checkbox" wire:model="encours_formation" class="form-checkbox">
                        <label>Formation en cours</label>
                    </div> --}}

                    <div class="flex justify-end space-x-2">
                        <button type="button" wire:click="$set('formVisible', false)" class="px-4 py-2 bg-gray-300 rounded">Annuler</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            {{ $formationId ? 'Mettre à jour' : 'Enregistrer' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="mt-6 space-y-4">
        @foreach ($abonne->formations()->get() as $formation)
        <div class="border p-4 rounded shadow-sm flex justify-between items-start bg-white">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">
                    {{ $formation->diplome_formation }}
                </h3>
                <p class="text-gray-600">
                    {{ $formation->etablissement_formation }}
                </p>
                <p class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($formation->date_debut_formation)->format('M Y') }} -
                    {{ $formation->encours_formation ? 'En cours' : \Carbon\Carbon::parse($formation->date_fin_formation)->format('M Y') }}
                </p>
            </div>
            <div class="flex gap-2">
                <button
                    wire:click="edit({{ $formation->id }})"
                    class="text-blue-600 hover:underline font-medium text-sm"
                >
                    Modifier
                </button>
                <button
                    wire:click="delete({{ $formation->id }})"
                    class="text-red-600 hover:underline font-medium text-sm"
                >
                    Supprimer
                </button>
            </div>
        </div>

        @endforeach
    </div>
</div>
