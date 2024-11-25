<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Bienvenue !!!</title>
    <!-- HSP icon -->
    <link rel="icon" href="/HSP/assets/img/toolbox_container_repair_box_tool_box_toolboxes_icon_189312.ico"
          type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts OSWALD -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="../../assets/css/mdb.min.css" />
    <link rel="stylesheet" href="../../assets/css/all.css">
    <link rel="stylesheet" href="../../assets/css/status.css">

</head>

<body>
<!-- Start your project here-->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2">
                <img
                    src="/HSP/assets/img/freepik-export-202410281551095LzP.ico"
                    height="16"
                    alt="HSP Logo"
                    loading="lazy"
                    style="margin-top: -1px;"
                />
            </a>

            <!-- Toggle button -->
            <button
                data-mdb-collapse-init
                class="navbar-toggler"
                type="button"
                data-mdb-target="#navbarButtonsExample"
                aria-controls="navbarButtonsExample"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/HSP/index.php">HSP</a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <!--Lien vers la page connection-->
                    <a href="/HSP/vue/auth/connection.php">
                        <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2">
                            Connexion
                        </button>
                    </a>

                    <!--Lien vers la page inscription-->
                    <div class="dropdown">
                        <a
                            class="btn btn-primary dropdown-toggle"
                            href="#"
                            role="button"
                            id="dropdownMenuLink"
                            data-mdb-dropdown-init
                            data-mdb-ripple-init
                            aria-expanded="false"
                        >
                            Inscription
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="/HSP/vue/auth/eleve/inscription.php">Eleve</a></li>
                            <li><a class="dropdown-item" href="/HSP/vue/auth/professeur/inscriptionProf.php">Professeur</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>

<main>

    <div class="box">
        <div class="status-container" id="status">
            <h1>Bonjour</h1>
            <p>
                Votre compte est en cour de validation.
            </p>
            <p>
                Vous receverez un mail si oui ou non vous etes inscrit.
            </p>
            <p>
                Merci de votre comprehension.
            </p>
            <p>
                A Bientot !
            </p>
        </div>
    </div>

</main>

<footer></footer>
<!-- End your project here-->

<!-- MDB -->
<script type="text/javascript" src="/HSP/assets/js/mdb.umd.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>

</html>
