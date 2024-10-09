@extends('Agent.NavBar')

@section('title', 'Recherche d\'Épaves')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="mb-4">Recherche d'Épaves</h2>

    <!-- Formulaire de recherche avancée -->
    <form action="{{ route('epave.search') }}" method="GET" class="mb-4">
        <div class="row">
            <!-- Champs de recherche -->
            <div class="col-md-4 mb-3">
                <label for="uuid" class="form-label">UUID</label>
                <input type="text" name="uuid" class="form-control" placeholder="Entrez l'UUID de l'épave"
                    value="{{ request('uuid') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" class="form-control" placeholder="Entrez l'ID de l'épave"
                    value="{{ request('id') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <input type="text" name="categorie" class="form-control" placeholder="Entrez la catégorie"
                    value="{{ request('categorie') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="type_lieu_decouverte" class="form-label">Type de Lieu de Découverte</label>
                <input type="text" name="type_lieu_decouverte" class="form-control"
                    placeholder="Entrez le type de lieu de découverte" value="{{ request('type_lieu_decouverte') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="lieu_decouverte" class="form-label">Lieu de Découverte</label>
                <input type="text" name="lieu_decouverte" class="form-control"
                    placeholder="Entrez le lieu de découverte" value="{{ request('lieu_decouverte') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="date_heure_decouverte" class="form-label">Date et Heure de Découverte</label>
                <input type="datetime-local" name="date_heure_decouverte" class="form-control"
                    value="{{ request('date_heure_decouverte') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Entrez la description"
                    value="{{ request('description') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="localisation" class="form-label">Localisation</label>
                <input type="text" name="localisation" class="form-control" placeholder="Entrez la localisation"
                    value="{{ request('localisation') }}">
            </div>
        </div>
        <div class="input-group mt-3">
            <button type="submit" class="btn btn-primary">Rechercher</button>
            <a href="{{ route('epave.search') }}" class="btn btn-secondary ms-2">Actualiser</a>
        </div>
    </form>


    <!-- Affichage des résultats de la recherche -->
    <div class="card mt-4">
        <h5 class="card-header">Résultats de la Recherche</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>UUID</th>
                        <th>Catégorie</th>
                        <th>Type de Lieu de Découverte</th>
                        <th>Lieu de Découverte</th>
                        <th>Date et Heure de Découverte</th>
                        <th>Description</th>
                        <th>Localisation</th>
                        <th>Photos</th>
                        <th>Statut</th>
                        <th>Agent</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @foreach($epaves as $epave)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $epave->uuid }}</td> <!-- Affichage de l'UUID -->
                            <td>{{ $epave->categorie }}</td>
                            <td>{{ $epave->type_lieu_decouverte }}</td>
                            <td>{{ $epave->lieu_decouverte }}</td>
                            <td>{{ $epave->date_heure_decouverte }}</td>
                            <td>{{ $epave->description }}</td>
                            <td>{{ $epave->localisation }}</td>
                            <td>
                                @if($epave->photos)
                                    @foreach($epave->photos as $photo)
                                        <img src="{{ asset('storage/' . $photo) }}" alt="Photo de l'épave"
                                            style="width: 100px; height: auto;">
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $epave->statut }}</td>
                            <td>
                                @if($epave->user)
                                    {{ $epave->user->prenom }} {{ $epave->user->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('epave.edit', $epave->id) }}" class="btn btn-warning">Modifier</a>
                                <a href="#" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#epaveModal{{ $epave->id }}">Voir Détails</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!-- Modals pour afficher les détails de l'épave -->
    @foreach($epaves as $epave)
        <div class="modal fade" id="epaveModal{{ $epave->id }}" tabindex="-1"
            aria-labelledby="epaveModalLabel{{ $epave->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="epaveModalLabel{{ $epave->id }}">Détails de l'Épave</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Informations de l'Épave</h4>
                        <p><strong>UUID:</strong> {{ $epave->uuid }}</p> <!-- Ajout de l'UUID -->
                        <p><strong>Catégorie:</strong> {{ $epave->categorie }}</p>
                        <p><strong>Type de Lieu de Découverte:</strong> {{ $epave->type_lieu_decouverte }}</p>
                        <p><strong>Lieu de Découverte:</strong> {{ $epave->lieu_decouverte }}</p>
                        <p><strong>Date et Heure de Découverte:</strong> {{ $epave->date_heure_decouverte }}</p>
                        <p><strong>Description:</strong> {{ $epave->description }}</p>
                        <p><strong>Localisation:</strong> {{ $epave->localisation }}</p>
                        <p><strong>Agent:</strong>
                            {{ $epave->user ? $epave->user->prenom . ' ' . $epave->user->name : 'N/A' }}</p>
                        <p><strong>Gare ou Entité d'Attache:</strong>
                            {{ $epave->user ? $epave->user->entite_attache : 'N/A' }}</p>

                        <h5>Photos</h5>
                        @if($epave->photos)
                            @foreach($epave->photos as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo de l'épave"
                                    style="width: 100px; height: auto;">
                            @endforeach
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" onclick="generatePDF({{ $epave->id }})">Enregistrer
                            Reçu</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Inclusion de jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        function generatePDF(epaveId) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Récupération des informations de l'épave à partir du DOM
            const modal = document.getElementById(`epaveModal${epaveId}`);
            const modalBody = modal.querySelector('.modal-body');

            const uuid = modalBody.querySelector('p:nth-child(2)').innerText; // Adjust index if needed
            const categorie = modalBody.querySelector('p:nth-child(3)').innerText;
            const typeLieu = modalBody.querySelector('p:nth-child(4)').innerText;
            const lieuDecouverte = modalBody.querySelector('p:nth-child(5)').innerText;
            const dateHeureDecouverte = modalBody.querySelector('p:nth-child(6)').innerText;
            const description = modalBody.querySelector('p:nth-child(7)').innerText;
            const localisation = modalBody.querySelector('p:nth-child(8)').innerText;
            const agent = modalBody.querySelector('p:nth-child(9)').innerText;
            const entiteAttache = modalBody.querySelector('p:nth-child(10)').innerText;

            // Ajout du titre du reçu dans le PDF
            doc.setFontSize(16); // Taille de la police pour le titre
            doc.text("Reçu de l'Épave", 105, 20, { align: "center" }); // Centrer le titre

            // Ajout du contenu dans le PDF
            doc.setFontSize(12); // Réduction de la taille de la police pour le contenu
            doc.text(uuid, 20, 40); // UUID
            doc.text(categorie, 20, 50);
            doc.text(typeLieu, 20, 60);
            doc.text(lieuDecouverte, 20, 70);
            doc.text(dateHeureDecouverte, 20, 80);
            doc.text(description, 20, 90);
            doc.text(localisation, 20, 100);
            doc.text(agent, 20, 110);
            doc.text(entiteAttache, 20, 120);

            // Ajout des photos (si elles existent)
            const photos = modalBody.querySelectorAll('img');
            if (photos.length > 0) {
                doc.text("Photos:", 20, 130); // Section des photos
                let yOffset = 140; // Position verticale de la première image
                photos.forEach((photo) => {
                    const imgData = photo.src; // Récupération de la source de l'image (doit être en base64)

                    doc.addImage(imgData, 'JPEG', 20, yOffset, 50, 50); // Ajout de l'image au PDF
                    yOffset += 60; // Déplacement vers le bas pour la prochaine image
                });
            }

            // Enregistrement du fichier PDF
            doc.save(`recu-epave-${epaveId}.pdf`);
        }
    </script>
</div>
@endsection