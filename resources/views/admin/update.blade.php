<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un Utilisateur</title>

    <!-- Essential CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Custom CSS, adjust the path if needed -->
</head>

<body>

    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">

            <!-- Register Card -->
            <div class="card px-sm-6 px-0" style="max-width: 700px; margin: auto; padding: 20px;">
                <div class="card-body">
                    <!-- Title -->
                    <h1 class="text-center mb-4"
                        style="background-color: #f8f9fa; padding: 10px; color: #007bff; font-size: 2rem;">
                        MODIFIER UN UTILISATEUR
                    </h1>

                    <!-- Errors -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form id="formAuthentication" class="mb-6" action="{{ route('update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $users->id }}">

                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                value="{{ $users->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control form-control-lg" id="prenom" name="prenom"
                                value="{{ $users->prenom }}">
                        </div>
                        <div class="mb-3">
                            <label for="matricule" class="form-label">Matricule</label>
                            <input type="text" class="form-control form-control-lg" id="matricule" name="matricule"
                                value="{{ $users->matricule }}">
                        </div>
                        <div class="mb-3">
                            <label for="entite_attache" class="form-label">Entité Attachée</label>
                            <input type="text" class="form-control form-control-lg" id="entite_attache"
                                name="entite_attache" value="{{ $users->entite_attache }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                value="{{ $users->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control form-control-lg" id="telephone" name="telephone"
                                value="{{ $users->telephone }}">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Rôle</label>
                            <select class="form-control form-control-lg" id="role" name="role">
                                <option value="administrateur" {{ $users->role == 'administrateur' ? 'selected' : '' }}>
                                    Administrateur
                                </option>
                                <option value="agent" {{ $users->role == 'agent' ? 'selected' : '' }}>
                                    Agent
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-lg d-grid w-100">Modifier Utilisateur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Essential JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script> <!-- Custom JS, adjust the path if needed -->
</body>

</html>