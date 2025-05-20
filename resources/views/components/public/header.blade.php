<!-- Header -->
<header class="site-header mo-left header header-white">
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container clearfix">

                <!-- Website Logo -->
                <div class="logo-header">
                    <a href="{{ route('home') }}" class="logo-dark">
                        <img src="{{ asset('storage/' . $entreprise->logo_entreprise) }}"
                            alt="{{ $entreprise->nom_entreprise }}"
                            style="max-height: 64px; width: 80px; object-fit: cover !important; border-radius: 50%; overflow: hidden;" />

                    </a>
                </div>

                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Extra Nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        @guest('candidat')
                            <a class="btn btn-darks btn-lg btn-shadows" href="{{ route('candidat.login') }}">Se connecter</a>
                            <a class="btn btn-darks btn-lg btn-shadows" href="{{ route('inscrire') }}">S'inscrire</a>
                        @else
                            <div class="dropdown ms-auto">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                   {{Auth::guard('candidat')->user()->nom_candidat}}  {{Auth::guard('candidat')->user()->prenom_candidat}}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('candidat.profile') }}">Profil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                       <livewire:candidat.candidat-logout/>
                                    </li>
                                </ul>
                            </div>
                            {{-- <a class="btn btn-dark btn-lg btn-shadow" href="{{ route('candidat.profile') }}">
                                Profil
                            </a> --}}

                            <!-- Déconnexion sécurisée -->
                            {{-- <livewire:candidat.candidat-logout/> --}}
                            {{-- <form action="#" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-lg btn-shadow">
                                    Déconnexion
                                </button>
                            </form> --}}
                        @endguest
                    </div>
                </div>

                <!-- Header Nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header d-lg-none">
                        <a href="{{ route('home') }}" class="logo-dark">
                            <img src="{{ asset('/frontend/assets/images/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar navbar-left">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('apropos') }}">À propos</a></li>
                        <li><a href="{{ route('candidat.listeoffre') }}">Nos offres d’emploi</a></li>
                        <li><a href="{{ route('nosservice') }}">Nos services</a></li>

                        {{-- <li class="sub-menu-down">
                            <a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="#">Liste des blogs</a></li>
                                <li><a href="#">Grille des blogs</a></li>
                                <li><a href="#">Détail du blog</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- Main Header End -->
</header>
<!-- Header End -->
