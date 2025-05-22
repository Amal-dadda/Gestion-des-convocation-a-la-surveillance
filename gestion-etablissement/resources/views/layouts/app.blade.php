<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des examens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --dark-color: #212529;
            --light-color: #f8f9fa;
        }

        .navbar-custom {
            background: linear-gradient(135deg, var(--dark-color) 0%, #1a1a1a 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 0.5rem;
            font-size: 1.8rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white !important;
            background: rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            border: 2px solid #ff0019;
            color: rgb(255, 0, 0);
            font-weight: 500;
            transition: all 0.3s ease;
            margin-left: 0.5rem;
        }

        .logout-btn:hover {
            background-color: #ff0019;
            transform: translateY(-2px);
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('http://127.0.0.1:8000/admin/dashboard') }}">
                Admin
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('filieres.index') }}">
                            <i class="bi bi-building me-1"></i> Filières
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surveillants.index') }}">
                            <i class="bi bi-people me-1"></i> Gérer Enseignants
                        </a>
                    </li>
                </ul>

                <div class="d-flex">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="btn logout-btn">
                            <i class="bi bi-box-arrow-right me-1"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>