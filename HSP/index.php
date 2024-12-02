<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/temp.css">

    <title>Document</title>
</head>
<body>
<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#">Logo HSP</a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 active" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">LOMP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#">Lieu</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="/HSP/vue/auth/formLogin.php" class="login-button">Connexion</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown">
                <!-- Dropdown toggle button -->
                <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Inscription
                </button>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="/HSP/vue/auth/eleve/formRegisterEleve.php">Etudiant</a></li>
                    <li><a class="dropdown-item" href="vue/auth/professeur/formRegisterPro.php">Professeur</a></li>
                    <li><a class="dropdown-item" href="vue/auth/entreprise/formRegisterEntreprise.php">Partenaire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Navbar FIN-->
</header>
<main class="mt-5 pt-5">
    <section class="container text-center my-5">
        <h1 class="mb-4">Bienvenue à l'Hôpital Sud Paris (HSP)</h1>
        <p class="lead">
            Créée en 1954, La Générale des hôpitaux (GDH) est le premier groupe de cliniques et hôpitaux privés en
            France.
            Découvrez nos services, nos valeurs, et notre engagement envers l'excellence médicale.
        </p>
    </section>
    <!-- Cards Section -->
    <section class="container cards">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Chirurgie">
                    <div class="card-body">
                        <h5 class="card-title">Pôle de Chirurgie</h5>
                        <p class="card-text">Des équipements modernes et des chirurgiens expérimentés pour des soins de
                            qualité.</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Médecine">
                    <div class="card-body">
                        <h5 class="card-title">Pôle de Médecine</h5>
                        <p class="card-text">Une équipe médicale dédiée à votre bien-être et à votre santé.</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Cancérologie">
                    <div class="card-body">
                        <h5 class="card-title">Pôle de Cancérologie</h5>
                        <p class="card-text">Un accompagnement personnalisé pour les patients atteints de cancer.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Card 4 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Maternité">
                    <div class="card-body">
                        <h5 class="card-title">Pôle de Maternité</h5>
                        <p class="card-text">Un suivi complet pour les futures mamans et leurs bébés.</p>
                    </div>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Imagerie Médicale">
                    <div class="card-body">
                        <h5 class="card-title">Pôle d'Imagerie Médicale</h5>
                        <p class="card-text">Des technologies avancées pour des diagnostics précis.</p>
                    </div>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Urgences">
                    <div class="card-body">
                        <h5 class="card-title">Service d'Urgences</h5>
                        <p class="card-text">Disponible 24h/24 et 7j/7 pour répondre à vos besoins urgents.</p>
                    </div>
                </div>
            </div>
        </div>
        Pour nous contacter , veuillez cliquer ici !
    </section>
    <section class="footer">
        <div class="container text-center">
            <p>&copy; 2024 Hôpital Sud Paris (HSP). Tous droits réservés.</p>
        </div>
    </section>
</main>
<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
