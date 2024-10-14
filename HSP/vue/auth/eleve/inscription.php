<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Inscription</title>
    <!-- HSP icon -->
    <link rel="icon" href="/HSP/assets/img/toolbox_container_repair_box_tool_box_toolboxes_icon_189312.ico"
          type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="/HSP/assets/css/mdb.min.css" />
    <link rel="stylesheet" href="/HSP/assets/css/ins.css" />
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
                <img src="/HSP/assets/img/toolbox_container_repair_box_tool_box_toolboxes_icon_189312.ico" height="16"
                     alt="HSP Logo" loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample"
                    aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a href="../connection.php">
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
        <div class="inscription-container" id="inscription">
            <h1>Inscription</h1>

            <form method="post" action="../../../src/controller/traitInscription.php">
                <input type="text" name="nom" placeholder="Nom" value="" >

                <input type="text" name="prenom" placeholder="Prenom" value="" >

                <input type="text" name="email" placeholder="Email" value="" >

                <input type="password" name="mdp" placeholder="Mot de Passe" value="" >
                <input type="password" name="mdp2" placeholder="Confirmer le mot de passe" >

                <button type="submit" name="submit" class="btn btn-primary" data-mdb-ripple-init>S'inscrire</button>

            </form>

            <div class="faute">
                <?php
                $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($fullurl, "inscription=vide") !== false) {
                    echo "<p class='faute'>Vous n'avez pas rempli tout les champs !</p>";
                }
                elseif (strpos($fullurl, "inscription=caractere") !== false) {
                    echo "<p class='faute'>Vous avez utilisé des caractéres invalides !</p>";
                }
                elseif (strpos($fullurl, "inscription=emailinvalide") !== false) {
                    echo "<p class='faute'>Email invalide !</p>";
                }
                elseif (strpos($fullurl, "inscription=passwordincorect") !== false) {
                    echo "<p class='faute'>Les mots de passe ne correspondent pas !</p>";
                }
                elseif (strpos($fullurl, "erreur=1") !== false) {
                    echo "<p class='faute'>Email dèja utilisé !</p>";
                }
                ?>
            </div>

            <div class="member">
                Vous avez déjà un compte ?
                <a href="../connection.php">Se connecter</a>
            </div>
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