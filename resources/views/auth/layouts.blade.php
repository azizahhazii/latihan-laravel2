<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | Custom Auth Layout</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        nav.navbar {
            background: linear-gradient(90deg, #007bff, #6610f2);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }
        nav a.navbar-brand {
            color: #fff !important;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        nav a.nav-link {
            color: #e0e0e0 !important;
            transition: all 0.3s ease;
        }
        nav a.nav-link:hover {
            color: #fff !important;
            text-decoration: underline;
        }
        .container {
            margin-top: 60px;
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">✨ Custom Auth</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active fw-bold text-white' : '' }}" 
                               href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('register') ? 'active fw-bold text-white' : '' }}" 
                               href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
