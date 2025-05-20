{{-- resources/views/auth/verify-email.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification de l'email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">
    <div class="bg-white p-4 rounded shadow-sm w-100" style="max-width: 500px;">
        <h1 class="h4 fw-bold mb-3 text-center">Vérification de votre adresse email</h1>
        <p class="mb-4 text-secondary">Nous avons envoyé un lien de vérification à votre adresse email. Veuillez vérifier votre boîte de réception.</p>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary w-100">
                Renvoyer l’email de vérification
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
