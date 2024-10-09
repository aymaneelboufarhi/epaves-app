<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Include necessary CSS files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/chadi.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-icons.css') }}" />
</head>

<body>
    <!-- Login Form Container -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center mb-4">
                    <a href="#" class="app-brand-link gap-2">
                        <img src="{{ asset('assets/img/favicon/logo.png') }}" alt="Logo"
                            style="width: 130px; height: auto;">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Login Form -->
                <form id="formAuthentication" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="matricule" class="form-label">Matricule</label>
                        <input type="text" class="form-control" id="matricule" name="matricule"
                            placeholder="Entrez votre matricule" autofocus required>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Mot de passe</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="············" aria-describedby="password" required>
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                            <label class="form-check-label" for="remember-me">
                                Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Connexion</button>
                </form>
                <!-- /Login Form -->

                <!-- Affichage des erreurs de connexion -->
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Include necessary JS files -->
    <script src="{{ asset('assets/vendor/js/core.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/theme-default.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/chadi.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>