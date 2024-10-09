@extends('Agent.NavBar')

@section('title', 'Liste des Rapatriements')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="mb-4">Liste des Rapatriements</h2>

    <!-- Affichage des messages de succès ou d'erreur -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tableau des rapatriements -->
    @if(isset($rapatriements) && $rapatriements->count() > 0)
        <div class="card">
            <h5 class="card-header">Liste des Rapatriements</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Épave ID</th>
                            <th>Gare de Récupération</th>
                            <th>Nom Client</th>
                            <th>Prénom Client</th>
                            <th>CIN Client</th>
                            <th>Email Client</th>
                            <th>Téléphone Client</th>
                            <th>OD</th>
                            <th>Train</th>
                            <th>Date et Heure du Voyage</th>
                            <th>Copie du Billet</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        @foreach($rapatriements as $rapatriement)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rapatriement->epave_id }}</td>
                                            <td>{{ $rapatriement->gare_recuperation }}</td>
                                            <td>{{ $rapatriement->nom_client }}</td>
                                            <td>{{ $rapatriement->prenom_client }}</td>
                                            <td>{{ $rapatriement->cin_client }}</td>
                                            <td>{{ $rapatriement->email_client }}</td>
                                            <td>{{ $rapatriement->telephone_client }}</td>
                                            <td>{{ $rapatriement->od_client }}</td>
                                            <td>{{ $rapatriement->train_client }}</td>
                                            <td>{{ $rapatriement->date_heure_voyage }}</td>
                                            <td>
                                                @if ($rapatriement->copie_billet)
                                                    <a href="{{ Storage::url($rapatriement->copie_billet) }}" target="_blank">Voir le billet</a>
                                                @else
                                                    Pas de billet
                                                @endif
                                            </td>
                                            @php
                                                $statusClass = '';
                                                switch ($rapatriement->statut) {
                                                    case 'en cours':
                                                        $statusClass = 'status-en-cours';
                                                        break;
                                                    case 'complété':
                                                        $statusClass = 'status-complete';
                                                        break;
                                                    case 'annulé':
                                                        $statusClass = 'status-annule';
                                                        break;
                                                }
                                            @endphp
                                            <td class="{{ $statusClass }}">{{ $rapatriement->statut }}</td>
                                            <td>
                                                <a href="{{ route('rapatriement.edit', $rapatriement->id) }}"
                                                    class="btn btn-primary mb-2">Modifier</a>
                                                <form action="{{ route('rapatriement.destroy', $rapatriement->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapatriement ?')">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-warning">Aucun rapatriement trouvé.</div>
    @endif
</div>
@endsection