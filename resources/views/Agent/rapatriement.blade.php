@extends('Agent.NavBar')

@section('title', 'Rapatriement')

@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

        <!-- Rapatriement Card -->
        <div class="card px-sm-6 px-0">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center mb-6">
                    <a href="{{ route('rapatriement.create') }}" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <!-- SVG logo here -->
                        </span>
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Form Errors -->
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text text-danger">{{ $error }}</div>
                    @endforeach 
                @endif

                <!-- Form -->
                <form id="formRapatriement" class="mb-6" action="{{ route('rapatriement.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Épave ID -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-epave_id"><i
                                    class="bx bx-id-card"></i></span>
                            <input type="text" class="form-control form-control-lg" id="epave_id" name="epave_id"
                                placeholder="ID de l'Épave" aria-label="Épave ID" required>
                        </div>
                    </div>

                    <!-- Gare de Récupération -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-gare_recuperation"><i
                                    class="bx bx-train"></i></span>
                            <input type="text" class="form-control form-control-lg" id="gare_recuperation"
                                name="gare_recuperation" placeholder="Gare de Récupération"
                                aria-label="Gare de Récupération" required>
                        </div>
                    </div>

                    <!-- Nom du Client -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-nom_client"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control form-control-lg" id="nom_client" name="nom_client"
                                placeholder="Nom du Client" aria-label="Nom du Client" required>
                        </div>
                    </div>

                    <!-- Prénom du Client -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-prenom_client"><i
                                    class="bx bx-user-circle"></i></span>
                            <input type="text" class="form-control form-control-lg" id="prenom_client"
                                name="prenom_client" placeholder="Prénom du Client" aria-label="Prénom du Client"
                                required>
                        </div>
                    </div>

                    <!-- CIN du Client -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-cin_client"><i
                                    class="bx bx-id-card"></i></span>
                            <input type="text" class="form-control form-control-lg" id="cin_client" name="cin_client"
                                placeholder="CIN du Client" aria-label="CIN du Client" required>
                        </div>
                    </div>

                    <!-- Email du Client -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-email_client"><i
                                    class="bx bx-envelope"></i></span>
                            <input type="email" class="form-control form-control-lg" id="email_client"
                                name="email_client" placeholder="Email du Client" aria-label="Email du Client" required>
                        </div>
                    </div>

                    <!-- Téléphone du Client -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-telephone_client"><i
                                    class="bx bx-phone"></i></span>
                            <input type="text" class="form-control form-control-lg" id="telephone_client"
                                name="telephone_client" placeholder="Téléphone du Client"
                                aria-label="Téléphone du Client" required>
                        </div>
                    </div>

                    <!-- OD -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-od_client"><i class="bx bx-map"></i></span>
                            <input type="text" class="form-control form-control-lg" id="od_client" name="od_client"
                                placeholder="OD" aria-label="OD" required>
                        </div>
                    </div>

                    <!-- Train -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-train_client"><i
                                    class="bx bx-train"></i></span>
                            <input type="text" class="form-control form-control-lg" id="train_client"
                                name="train_client" placeholder="Train" aria-label="Train" required>
                        </div>
                    </div>

                    <!-- Date et Heure du Voyage -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-date_heure_voyage"><i
                                    class="bx bx-calendar"></i></span>
                            <input type="datetime-local" class="form-control form-control-lg" id="date_heure_voyage"
                                name="date_heure_voyage" aria-label="Date et Heure du Voyage" required>
                        </div>
                    </div>

                    <!-- Copie du Billet -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-copie_billet"><i
                                    class="bx bx-file"></i></span>
                            <input type="file" class="form-control form-control-lg" id="copie_billet"
                                name="copie_billet">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary d-grid w-100 mt-3">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection