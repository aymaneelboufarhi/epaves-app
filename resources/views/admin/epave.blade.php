@extends('admin.app')

@section('title', 'Liste des Épaves')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Grand Titre -->
    <h2 class="mb-4">Liste des Épaves</h2>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Admin</h5>
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
                        <th>UUID</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @php
                        $ide = 1;
                    @endphp
                    @foreach($epaves as $epave)
                                        <tr>
                                            <td>{{ $ide }}</td>
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
                                                @if($epave->photos)
                                                    <div class="photos">
                                                        @foreach($epave->photos as $photo)
                                                            <img src="{{ asset('storage/' . $photo) }}" alt="Photo de l'épave"
                                                                style="width: 100px; height: auto;">
                                                        @endforeach
                                                    </div>
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
                                            <td class="{{ $statusClass }}">
                                                {{ $epave->statut }}
                                            </td>
                                            <td>{{ $epave->uuid }}</td> <!-- Affichage de l'UUID -->
                                        </tr>
                                        @php
                                            $ide += 1;
                                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection