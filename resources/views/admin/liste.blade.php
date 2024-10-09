@extends('admin.app')

@section('title', 'Register')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Grand Titre -->
    <h2 class="mb-4">Liste des Utilisateurs</h2>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Admin</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered"> <!-- Ajout de la classe 'table-bordered' -->
                <thead class="table-primary">

                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Matricule</th>
                        <th>Entite Attache</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @php
                        $ide = 1;
                    @endphp
                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $ide }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->prenom }}</td>
                                            <td>{{ $user->matricule }}</td>
                                            <td>{{ $user->entite_attache }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telephone }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="/update/{{ $user->id }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Update</a>
                                                        <a class="dropdown-item" href="/delete-user/{{ $user->id }}"><i
                                                                class="bx bx-trash me-1"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $ide += 1;
                                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection