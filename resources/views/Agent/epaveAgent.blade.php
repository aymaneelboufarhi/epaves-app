@extends('Agent.NavBar')

@section('title', 'Liste des Épaves')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="mb-4">Liste des Épaves</h2>

    @if(isset($epaves) && $epaves->count() > 0)
        <div class="card">
            <h5 class="card-header">Liste des Épaves</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Catégorie</th>
                            <th>Type de Lieu de Découverte</th>
                            <th>Lieu de Découverte</th>
                            <th>Date et Heure de Découverte</th>
                            <th>Description</th>
                            <th>Localisation</th>
                            <th>Couleur</th>
                            <th>Dimensions</th>
                            <th>Signes Distinctifs</th>
                            <th>Photos</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($epaves as $epave)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $epave->categorie }}</td>
                                            <td>{{ $epave->type_lieu_decouverte }}</td>
                                            <td>{{ $epave->lieu_decouverte }}</td>
                                            <td>{{ $epave->date_heure_decouverte }}</td>
                                            <td>{{ $epave->description }}</td>
                                            <td>{{ $epave->localisation }}</td>
                                            <td>{{ $epave->couleur }}</td>
                                            <td>{{ $epave->dimensions }}</td>
                                            <td>{{ $epave->signes_distinctifs }}</td>
                                            <td>
                                                @if(is_array($epave->photos) && !empty($epave->photos))
                                                    @foreach($epave->photos as $photo)
                                                        <img src="{{ asset('storage/' . $photo) }}" alt="Photo de l'épave"
                                                            style="width: 100px; height: auto;">
                                                    @endforeach
                                                @endif
                                            </td>
                                            @php
                                                $statusClass = '';
                                                switch ($epave->statut) {
                                                    case 'enregistré':
                                                        $statusClass = 'status-enregistre';
                                                        break;
                                                    case 'en transit':
                                                        $statusClass = 'status-en-transit';
                                                        break;
                                                    case 'récupéré':
                                                        $statusClass = 'status-recupere';
                                                        break;
                                                }
                                            @endphp
                                            <td class="{{ $statusClass }}">{{ $epave->statut }}</td>
                                            <td>
                                                <!-- Bouton Modifier -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editEpaveModal{{ $epave->id }}">
                                                    Modifier
                                                </button>

                                                <!-- Bouton Supprimer -->
                                                <form action="{{ route('epave.destroy', $epave->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette épave?');">
                                                        Supprimer
                                                    </button>
                                                </form>

                                                <!-- Modal Modifier -->
                                                <div class="modal fade" id="editEpaveModal{{ $epave->id }}" tabindex="-1"
                                                    aria-labelledby="editEpaveModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editEpaveModalLabel">Modifier l'Épave</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('epave.update', $epave->id) }}" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <!-- Tous les champs de formulaire ici -->
                                                                    <div class="mb-3">
                                                                        <label for="categorie" class="form-label">Catégorie</label>
                                                                        <input type="text" class="form-control" id="categorie"
                                                                            name="categorie" value="{{ $epave->categorie }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="lieu_decouverte" class="form-label">Lieu de
                                                                            Découverte</label>
                                                                        <input type="text" class="form-control" id="lieu_decouverte"
                                                                            name="lieu_decouverte" value="{{ $epave->lieu_decouverte }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="date_heure_decouverte" class="form-label">Date et Heure
                                                                            de Découverte</label>
                                                                        <input type="datetime-local" class="form-control"
                                                                            id="date_heure_decouverte" name="date_heure_decouverte"
                                                                            value="{{ $epave->date_heure_decouverte }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="description" class="form-label">Description</label>
                                                                        <textarea class="form-control" id="description" name="description"
                                                                            rows="3" required>{{ $epave->description }}</textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="localisation" class="form-label">Localisation</label>
                                                                        <input type="text" class="form-control" id="localisation"
                                                                            name="localisation" value="{{ $epave->localisation }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="couleur" class="form-label">Couleur</label>
                                                                        <input type="text" class="form-control" id="couleur" name="couleur"
                                                                            value="{{ $epave->couleur }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="dimensions" class="form-label">Dimensions</label>
                                                                        <input type="text" class="form-control" id="dimensions"
                                                                            name="dimensions" value="{{ $epave->dimensions }}" required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="signes_distinctifs" class="form-label">Signes
                                                                            Distinctifs</label>
                                                                        <textarea class="form-control" id="signes_distinctifs"
                                                                            name="signes_distinctifs" rows="3"
                                                                            required>{{ $epave->signes_distinctifs }}</textarea>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="statut" class="form-label">Statut</label>
                                                                        <select class="form-control" id="statut" name="statut" required>
                                                                            <option value="enregistré" {{ $epave->statut == 'enregistré' ? 'selected' : '' }}>Enregistré</option>
                                                                            <option value="en transit" {{ $epave->statut == 'en transit' ? 'selected' : '' }}>En Transit</option>
                                                                            <option value="récupéré" {{ $epave->statut == 'récupéré' ? 'selected' : '' }}>Récupéré</option>
                                                                        </select>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-warning">Aucune épave trouvée.</div>
    @endif
</div>
@endsection