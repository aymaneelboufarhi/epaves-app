<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Modifier l'Épave</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/chadi.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" /> <!-- Custom CSS -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
</head>

<body>
    <div class="container-xxl flex-grow-1 container-p-y d-flex justify-content-center">
        <div class="card" style="width: 60%; padding: 20px;">
            <h2 class="mb-4 text-center">Modifier l'Épave</h2>

            <div class="card-body">
                <form action="{{ route('epave.update', $epave->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- All form fields go here -->
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <input type="text" class="form-control" id="categorie" name="categorie"
                            value="{{ $epave->categorie }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="lieu_decouverte" class="form-label">Lieu de Découverte</label>
                        <input type="text" class="form-control" id="lieu_decouverte" name="lieu_decouverte"
                            value="{{ $epave->lieu_decouverte }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_heure_decouverte" class="form-label">Date et Heure de Découverte</label>
                        <input type="datetime-local" class="form-control" id="date_heure_decouverte"
                            name="date_heure_decouverte" value="{{ $epave->date_heure_decouverte }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            required>{{ $epave->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="localisation" class="form-label">Localisation</label>
                        <input type="text" class="form-control" id="localisation" name="localisation"
                            value="{{ $epave->localisation }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="couleur" class="form-label">Couleur</label>
                        <input type="text" class="form-control" id="couleur" name="couleur"
                            value="{{ $epave->couleur }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="dimensions" class="form-label">Dimensions</label>
                        <input type="text" class="form-control" id="dimensions" name="dimensions"
                            value="{{ $epave->dimensions }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="signes_distinctifs" class="form-label">Signes Distinctifs</label>
                        <textarea class="form-control" id="signes_distinctifs" name="signes_distinctifs" rows="3"
                            required>{{ $epave->signes_distinctifs }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-control" id="statut" name="statut" required>
                            <option value="enregistré" {{ $epave->statut == 'enregistré' ? 'selected' : '' }}>Enregistré
                            </option>
                            <option value="en transit" {{ $epave->statut == 'en transit' ? 'selected' : '' }}>En Transit
                            </option>
                            <option value="récupéré" {{ $epave->statut == 'récupéré' ? 'selected' : '' }}>Récupéré
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>