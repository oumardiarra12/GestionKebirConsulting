<!DOCTYPE html>
<html lang="fr">
@php
    $entreprise = Cache::remember('entreprise_cache', 60*60, fn () => DB::table('entreprises')->first());
@endphp
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $entreprise->nom_entreprise ?? 'Gestion Kebir Consulting' }}</title>
    <meta name="description" content="Plateforme d'administration pour la gestion des offres et candidatures.">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="Jobick : Job Admin Dashboard">
    <meta property="og:description" content="Tableau de bord pour la gestion de job posting et candidature.">
    <meta property="og:image" content="{{ asset('storage/'.$entreprise->logo_entreprise) }}">
    <meta name="format-detection" content="telephone=no">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('storage/'.$entreprise->logo_entreprise) }}">

    <!-- Google Fonts (préchargement) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" media="all">

    <!-- CSS (essentiel en premier) -->
    <link href="{{ asset('/frontend/assets/vendor/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/assets/vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">

    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/skin/skin-1.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/sweetalert2.min.css') }}">

    @livewireStyles
</head>

<body>
    <div class="page-wraper">
        @include('components.public.header')

        <main class="page-content">
            {{ $slot }}
        </main>

        @include('components.public.footer')
    </div>

    @livewireScripts

    <!-- JS Scripts - chargés à la fin pour performances -->
    <script src="{{ asset('/frontend/assets/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/js/anm.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/vendor/wow/wow.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/vendor/swiper/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/vendor/magnific-popup/magnific-popup.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/js/dz.carousel.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/js/dz.ajax.js') }}" defer></script>
    <script src="{{ asset('/frontend/assets/js/custom.js') }}" defer></script>
     <script src="{{ asset('frontend/assets/js/toastr.min.js') }}" defer></script>
      <script src="{{ asset('frontend/assets/js/sweetalert2.all.min.js') }}" defer></script>
    <script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: "{{ session('success') }}",
            confirmButtonText: 'Fermer'
        });
    @endif
</script>
</body>
</html>
