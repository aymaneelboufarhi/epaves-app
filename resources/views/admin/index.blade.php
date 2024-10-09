@extends('admin.app')

@section('title', 'Dashboard')

@section('content')
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="User Avatar"
                            class="w-px-40 h-auto rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Admin Avatar"
                                            class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth::user()->prenom }}
                                        {{ Auth::user()->name }}</span>
                                    <small class="text-muted">{{ Auth::user()->role }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.index') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>

                    <div class="dropdown-divider"></div>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Banner -->
    <div class="card mb-4">
        <div class="card-body text-center">
            <h4 class="card-title">Welcome to Your Dashboard, {{ Auth::user()->prenom }} {{ Auth::user()->name }}</h4>
            <p class="card-text">Manage your tasks, view statistics, and keep track of your team.</p>
        </div>
    </div>

    <!-- Dashboard Widgets -->
    <div class="row">
        <!-- Widget 1 -->
        <div class="col-md-4">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">You have <strong>50</strong> registered users.</p>
                </div>
            </div>
        </div>
        <!-- Widget 2 -->
        <div class="col-md-4">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Active Projects</h5>
                    <p class="card-text">There are <strong>12</strong> ongoing projects.</p>
                </div>
            </div>
        </div>
        <!-- Widget 3 -->
        <div class="col-md-4">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Pending Requests</h5>
                    <p class="card-text">You have <strong>5</strong> pending requests.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notifications</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Reminder: Project X deadline is next week.</li>
                        <li class="list-group-item">New user registration: John Doe.</li>
                        <li class="list-group-item">System maintenance scheduled for Friday.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/ Notifications -->

</div>
<!--/ Content -->
@endsection