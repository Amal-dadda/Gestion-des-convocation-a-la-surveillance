<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestion des convocation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menu.index') }}">Menu</a>

                </li>



                <li class="nav-item">
                    <a class="nav-link" href="{{ route('filiere.index') }}">Liste des filéres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('exam.index') }}">Liste examens</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="categorie.php">liste des categorie</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="produits.php">liste produit</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/gestion des convocations/signout.php">Deconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>