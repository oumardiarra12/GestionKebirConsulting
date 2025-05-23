<div class="container mt-4 mb-4">
    <!-- Banner  -->
    <div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark"
        style="background-image: url(assets/images/banner/bnr1.jpg);margin-top:9px;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h4 class="text-white">Edit Profil</h4>
                <!-- Breadcrumb Row -->
                <nav aria-label="breadcrumb" class="breadcrumb-row m-t15">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edition de Profile</li>
                    </ul>
                </nav>
                <!-- Breadcrumb Row End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- Onglets -->
    <div class="d-flex gap-2 mt-4" role="tablist">
        <button wire:click="setActiveTab('info')" type="button"
            class="btn btn-outline-primary {{ $activeTab === 'info' ? 'active' : '' }}" role="tab">
            Informations
        </button>

        <button wire:click="setActiveTab('critiere')" type="button"
            class="btn btn-outline-primary {{ $activeTab === 'critiere' ? 'active' : '' }}" role="tab">
            Critère
        </button>

        <button wire:click="setActiveTab('competences')" type="button"
            class="btn btn-outline-primary {{ $activeTab === 'competences' ? 'active' : '' }}" role="tab">
            Compétences
        </button>

        <button wire:click="setActiveTab('donnees')" type="button"
            class="btn btn-outline-primary {{ $activeTab === 'donnees' ? 'active' : '' }}" role="tab">
            Données
        </button>

        <button wire:click="setActiveTab('options')" type="button"
            class="btn btn-outline-primary {{ $activeTab === 'options' ? 'active' : '' }}" role="tab">
            Options
        </button>
    </div>

    <!-- Contenu des onglets -->
    <div class="tab-content mt-4">
        @if ($activeTab === 'info')
            <livewire:candidat.profile.information-personnelle  :candidat="$candidat" :wire:key="'info-'.$candidat->id" />
        @elseif ($activeTab === 'critiere')
            <livewire:candidat.profile.critiere :candidat="$candidat" ?? '' :wire:key="'critiere-'.$candidat->id" />
        @elseif ($activeTab === 'competences')
            <livewire:candidat.profile.competences :candidat="$candidat" ?? '' :wire:key="'competences-'.$candidat->id" />
        @elseif ($activeTab === 'donnees')
            <livewire:candidat.profile.donnees :candidat="$candidat" ?? '' :wire:key="'donnees-'.$candidat->id" />
        @elseif ($activeTab === 'options')
            <livewire:candidat.profile.options :candidat="$candidat" ?? '' :wire:key="'options-'.$candidat->id" />
        @endif
    </div>
</div>
