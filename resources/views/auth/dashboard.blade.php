@extends('auth.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center fw-bold fs-5 py-3"
                 style="background: linear-gradient(90deg, #20c997, #6f42c1);">
                <i class="bi bi-speedometer2"></i> Dashboard
            </div>

            <div class="card-body text-center p-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success shadow-sm rounded-pill py-2 px-4 mb-4 fw-semibold">
                        <i class="bi bi-check-circle-fill"></i> {{ $message }}
                    </div>
                @else
                    <div class="alert alert-info shadow-sm rounded-pill py-2 px-4 mb-4 fw-semibold">
                        <i class="bi bi-person-check-fill"></i> You are logged in!
                    </div>
                @endif

                <h4 class="fw-bold mb-3">Welcome, {{ Auth::user()->nama ?? 'User' }} 👋</h4>
                <p class="text-muted mb-4">
                    This is your personalized dashboard. From here, you can manage your account and explore available features.
                </p>

                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-2 shadow-sm">
                        <i class="bi bi-person-circle"></i> Profile
                    </a>
                    <a href="#" class="btn btn-outline-success rounded-pill px-4 py-2 shadow-sm">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-gradient text-white rounded-pill px-4 py-2 shadow-sm">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gradient Button Style -->
<style>
    .btn-gradient {
        background: linear-gradient(90deg, #20c997, #6f42c1);
        border: none;
        transition: 0.3s ease;
    }
    .btn-gradient:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }
</style>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
