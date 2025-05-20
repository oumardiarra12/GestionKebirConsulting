<div>
       <!-- Banner -->
    <div class="dz-bnr-inr dz-bnr-inr-sm text-center overlay-primary-dark py-5" style="background-image: url(assets/images/banner/bnr1.jpg); margin-top: 9px;">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h4 class="text-white fw-bold mb-3">Nos Services</h4>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li class="breadcrumb-item active text-white fw-semibold" aria-current="page">Nos Services</li>
                    </ol>
                </nav>
                <!-- Breadcrumb End -->
            </div>
        </div>
    </div>
    <!-- Banner End -->
   <div class="container my-5">
    <h1 class="text-center mb-4">🏢 Nos Services – Kebir Consulting</h1>
    <p class="text-center fs-5">
        Chez Kebir Consulting, nous nous positionnons comme un partenaire stratégique en Ressources Humaines au service de la performance des entreprises. Grâce à une approche humaine, rigoureuse et agile, nous accompagnons nos clients dans toutes les étapes de la gestion du capital humain.
    </p>

    @php
        $services = [
            [
                'icon' => '🎯',
                'title' => 'Recrutement Permanent et Temporaire',
                'items' => [
                    'Recrutement de cadres, techniciens, ouvriers qualifiés',
                    'Recrutement de masse pour des campagnes spécifiques',
                    'Intégration rapide des ressources dans vos équipes',
                ],
            ],
            [
                'icon' => '🤝',
                'title' => 'Mise à Disposition de Personnel',
                'items' => [
                    'Gestion administrative et contractuelle par nos soins',
                    'Suivi de performance et accompagnement sur site',
                    'Flexibilité pour les projets à court, moyen ou long terme',
                ],
            ],
            [
                'icon' => '🧩',
                'title' => 'Externalisation de la Gestion RH',
                'items' => [
                    'Suivi administratif des employés',
                    'Gestion des contrats, fiches de paie, déclarations sociales',
                    'Suivi disciplinaire et gestion des performances',
                    'Conseil en conformité légale et réglementaire',
                ],
            ],
            [
                'icon' => '📊',
                'title' => 'Conseil en Organisation RH & Gestion des Talents',
                'items' => [
                    'Audit RH et diagnostic organisationnel',
                    'Élaboration de politiques RH et de grilles de compétences',
                    'Stratégies de fidélisation et d’engagement des talents',
                    'Accompagnement à la transformation organisationnelle',
                ],
            ],
            [
                'icon' => '🎓',
                'title' => 'Formation & Développement des Compétences',
                'items' => [
                    'Développement des soft skills',
                    'Formations techniques adaptées à vos métiers',
                    'Accompagnement à la montée en compétences',
                    'Évaluations post-formation et plans d’action',
                ],
            ],
            [
                'icon' => '🔒',
                'title' => 'Création et Gestion de CVthèque Professionnelle',
                'items' => [
                    'Centraliser toutes les candidatures reçues',
                    'Filtrer selon diplôme, expérience, compétences',
                    'Exporter ou imprimer des profils complets en PDF',
                    'Réduire considérablement les délais de traitement',
                ],
            ],
        ];
    @endphp

    <div class="row">
        @foreach ($services as $service)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">{{ $service['icon'] }} {{ $service['title'] }}</h4>
                        <ul class="mt-3 ps-3">
                            @foreach ($service['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pourquoi choisir Kebir Consulting --}}
    <section class="mt-5">
        <h3 class="text-center mb-3">💡 Pourquoi Choisir Kebir Consulting ?</h3>
        <ul class="list-group list-group-flush text-center">
            @foreach ([
                'Proximité : Une parfaite connaissance des réalités du marché malien',
                'Réactivité : Une réponse rapide et adaptée à vos besoins',
                'Fiabilité : Un processus de recrutement éprouvé et conforme aux standards de qualité',
                'Confidentialité : Une gestion éthique et responsable des données',
            ] as $reason)
                <li class="list-group-item">{{ $reason }}</li>
            @endforeach
        </ul>
    </section>

    {{-- Formation & Support --}}
    <section class="mt-5">
        <h3 class="text-center mb-3">📘 Formation & Support</h3>
        <ul class="list-group list-group-flush text-center">
            @foreach ([
                'Formation des utilisateurs (candidats, administrateurs RH)',
                'Fourniture de guides utilisateurs clairs et accessibles',
                'Support technique présentiel ou à distance',
            ] as $support)
                <li class="list-group-item">{{ $support }}</li>
            @endforeach
        </ul>
    </section>

    {{-- Conclusion --}}
    <div class="text-center mt-5">
        <h4 class="fw-bold">✨ Conclusion</h4>
        <p class="fs-5">
            Kebir Consulting, c’est bien plus qu’un cabinet de recrutement. C’est un partenaire stratégique qui vous aide à construire des équipes performantes, engagées et en phase avec vos objectifs.
        </p>
    </div>
</div>

</div>
