<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #4361ee;
            --light-bg: #f8f9fa;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        body {
            background-color: var(--light-bg);
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
            padding: 2rem 0;
        }

        .dashboard-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .card-icon {
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .page-title {
            position: relative;
            padding-bottom: 1rem;
            margin-bottom: 3rem;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .btn-dashboard {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn {
            border: 2px solid #dc3545;
            color: #dc3545;
            font-weight: 500;
        }

        .logout-btn:hover {
            background: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h1 class="page-title animate__animated animate__fadeInDown">Tableau de Bord</h1>
            </div>

            <!-- Carte Utilisateurs -->
            <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__fadeIn animate-delay-1">
                <div class="dashboard-card p-4 text-center">
                    <div class="card-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h3 class="h5 mb-3">Gestion Utilisateurs</h3>
                    <p class="text-muted mb-4">Gestion des comptes et permissions</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-dashboard">
                        <i class="bi bi-arrow-right me-1"></i> Accéder
                    </a>
                </div>
            </div>

            <!-- Carte Notes -->
            <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__fadeIn animate-delay-2">
                <div class="dashboard-card p-4 text-center">
                    <div class="card-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h3 class="h5 mb-3">Gestion des Notes</h3>
                    <p class="text-muted mb-4">Consultation et modification</p>
                    <a href="{{ route('notes.index') }}" class="btn btn-success btn-dashboard">
                        <i class="bi bi-arrow-right me-1"></i> Accéder
                    </a>
                </div>
            </div>

            <!-- Carte Convocations -->
            <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__fadeIn animate-delay-3">
                <div class="dashboard-card p-4 text-center">
                    <div class="card-icon">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <h3 class="h5 mb-3">Convocations</h3>
                    <p class="text-muted mb-4">Planification et suivi</p>
                    <a href="{{ route('filieres.index') }}" class="btn btn-warning btn-dashboard">
                        <i class="bi bi-arrow-right me-1"></i> Accéder
                    </a>
                </div>
            </div>

            <!-- Bouton Déconnexion -->
            <div class="col-12 text-center mt-4 animate__animated animate__fadeIn">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-lg logout-btn">
                        <i class="bi bi-power me-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>