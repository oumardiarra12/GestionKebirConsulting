<div>
    <h3 class="text-lg font-bold mb-2">Langues</h3>

    <div class="flex space-x-2 mb-4">
        <select wire:model="selectedLangueId" class="border rounded p-1">
            <option value="">-- Sélectionner une langue --</option>
            @foreach($languesDisponibles as $langue)
                <option value="{{ $langue->id }}">{{ $langue->nom_langue }}</option>
            @endforeach
        </select>
        <select wire:model="niveau" class="border rounded p-1">
            <option value="">-- Sélectionner un Niveau --</option>
            <option value="débutant">Débutant</option>
            <option value="intermédiaire">Intermédiaire</option>
            <option value="avance">Avance</option>
        </select>


        <button wire:click="ajouterLangue" class="bg-blue-500 text-white px-3 py-1 rounded">Ajouter</button>
    </div>

    @error('selectedLangueId') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('niveau') <div class="text-red-500">{{ $message }}</div> @enderror

    <ul class="list-disc pl-5">
        @foreach($languesCandidat as $langue)
            <li class="mb-1">
                {{ $langue->nom_langue }} - {{ $langue->pivot->niveau }}
                <button wire:click="supprimerLangue({{ $langue->id }})" class="text-red-500 ml-2">Supprimer</button>
            </li>
        @endforeach
    </ul>
</div>
