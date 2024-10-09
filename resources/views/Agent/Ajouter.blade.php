@extends('Agent.NavBar')
@section('title', 'Ajouter')

@section('content')

<form action="{{ route('Agent.Ajouter.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}"> <!-- Ajout du champ user_id -->

    <!-- Le reste de votre formulaire reste inchangé -->
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Détails de l'Épave</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <!-- Categorie -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-categorie"><i class="bx bx-category"></i></span>
                    <input type="text" class="form-control" name="categorie" placeholder="Catégorie"
                        aria-label="Catégorie" required>
                </div>
                <!-- Type de Lieu de Découverte -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-type_lieu_decouverte"><i
                            class="bx bx-map"></i></span>
                    <select class="form-control" name="type_lieu_decouverte" aria-label="Type de Lieu de Découverte"
                        required>
                        <option value="train">Train</option>
                        <option value="gare">Gare</option>
                    </select>
                </div>
                <!-- Lieu de Découverte -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-lieu_decouverte"><i
                            class="bx bx-location"></i></span>
                    <input type="text" class="form-control" name="lieu_decouverte" placeholder="Lieu de Découverte"
                        aria-label="Lieu de Découverte" required>
                </div>
                <!-- Date et Heure de Découverte -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-date_heure_decouverte"><i
                            class="bx bx-calendar"></i></span>
                    <input type="datetime-local" class="form-control" name="date_heure_decouverte"
                        aria-label="Date et Heure de Découverte" required>
                </div>
                <!-- Description -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text"></span>
                    <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                </div>
                <!-- Localisation -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-localisation"><i class="bx bx-map-pin"></i></span>
                    <input type="text" class="form-control" name="localisation" placeholder="Localisation"
                        aria-label="Localisation" required>
                </div>
                <!-- Couleur -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-couleur"><i class="bx bx-brush"></i></span>
                    <input type="text" class="form-control" name="couleur" placeholder="Couleur" aria-label="Couleur"
                        required>
                </div>
                <!-- Dimensions -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-dimensions"><i class="bx bx-expand"></i></span>
                    <input type="text" class="form-control" name="dimensions" placeholder="Dimensions"
                        aria-label="Dimensions" required>
                </div>
                <!-- Signes Distinctifs -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text"></span>
                    <textarea class="form-control" name="signes_distinctifs" aria-label="Signes Distinctifs"
                        placeholder="Signes Distinctifs"></textarea>
                </div>
                <!-- Photos -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-image"></i></span>
                    <input type="file" class="form-control" name="photos[]" aria-label="Photos" multiple>
                </div>
                <!-- Statut -->
                <div class="input-group input-group-merge">
                    <span class="input-group-text" id="basic-addon-statut"><i class="bx bx-tag"></i></span>
                    <select class="form-control" name="statut" aria-label="Statut" required>
                        <option value="enregistré">Enregistré</option>
                        <option value="en transit">En transit</option>
                        <option value="récupéré">Récupéré</option>
                    </select>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary d-grid w-100 mt-3">Enregistrer</button>
            </div>
        </div>
    </div>
</form>

@endsection