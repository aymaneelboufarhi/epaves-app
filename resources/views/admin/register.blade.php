@extends('admin.app')

@section('title', 'Register')

@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

        <!-- Register Card -->
        <div class="card px-sm-6 px-0">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center mb-6">
                    <a href="index.html" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <!-- SVG logo here -->
                        </span>
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="text text-danger">{{ $error }}</div>
                            @endforeach 
                        @endif
                    </a>
                </div>
                <!-- /Logo -->
                @isset($status) 
                    {{ $status }}
                @endisset

                <form id="formAuthentication" class="mb-6" action="./register" method="POST">
                    @csrf
                    <!-- Nom -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-name"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Enter your Nom" aria-label="Nom" required>
                        </div>
                    </div>

                    <!-- Prénom -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-prenom"><i
                                    class="bx bx-user-circle"></i></span>
                            <input type="text" class="form-control form-control-lg" id="prenom" name="prenom"
                                placeholder="Enter your prenom" aria-label="Prenom" required>
                        </div>
                    </div>

                    <!-- Matricule -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-matricule"><i
                                    class="bx bx-id-card"></i></span>
                            <input type="text" class="form-control form-control-lg" id="matricule" name="matricule"
                                placeholder="Enter your Matricule" aria-label="Matricule" required>
                        </div>
                    </div>

                    <!-- Entité Attachée -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-entite_attache"><i
                                    class="bx bx-building"></i></span>
                            <input type="text" class="form-control form-control-lg" id="entite_attache"
                                name="entite_attache" placeholder="Enter your Entite Attache"
                                aria-label="Entité Attachée">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-email"><i class="bx bx-envelope"></i></span>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Enter your Email" aria-label="Email" required>
                        </div>
                    </div>

                    <!-- Téléphone -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-telephone"><i class="bx bx-phone"></i></span>
                            <input type="text" class="form-control form-control-lg" id="telephone" name="telephone"
                                placeholder="Enter your Telephone" aria-label="Telephone" required>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-role"><i
                                    class="bx bx-user-circle"></i></span>
                            <select class="form-control form-control-lg" id="role" name="role" aria-label="Role"
                                required>
                                <option value="administrateur">Administrateur</option>
                                <option value="agent">Agent</option>
                            </select>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control form-control-lg" name="password"
                                placeholder="············" aria-describedby="password" required>
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <button type="Submit" class="btn btn-primary d-grid w-100 mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection