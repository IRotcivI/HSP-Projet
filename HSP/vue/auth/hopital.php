<?php
session_start();

if (empty($_SESSION)) {
    header('Location: /HSP/index.php');
    exit();
} else { ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hopital</title>
        <!-- HSP icon -->
        <link rel="icon" href="/HSP/assets/img/freepik-export-202410281551095LzP.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <!-- Google Fonts OSWALD -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <!-- MDB -->
        <link rel="stylesheet" href="../../assets/css/mdb.min.css" />
        <link rel="stylesheet" href="../../assets/css/all.css">
        <link rel="stylesheet" href="../../assets/css/hopital.css">
    </head>
    <body>
    <header>
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <div class="d-flex">
                    <!-- Brand -->
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="../menu.php" title="Menu">
                        <img src="/HSP/assets/img/freepik-export-202410281551095LzP.ico" height="20" alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
                        <small>Création de l'établissement</small>
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <?php
                if ($_SESSION['fonction'] == 'eleve'){ ?>
                    <ul class="navbar-nav flex-row d-none d-md-flex">
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../database.php" title="Annuaire">
                                <span><i class="fas fa-book-open"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../eleveEvenement.php" title="Evenement">
                                <span><i class="fas fa-calendar-day"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../eleveOffre.php" title="Offre">
                                <span><i class="fas fa-briefcase"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../forum/eleveForum.php?choix=eleve" title="Forum">
                                <span><i class="fas fa-comments"></i></span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
                if ($_SESSION['fonction'] == 'professeur'){ ?>
                    <ul class="navbar-nav flex-row d-none d-md-flex">
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../annuaireMedecin.php" title="Annuaire">
                                <span><i class="fas fa-graduation-cap"></i></span>
                            </a>
                        </li>

                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../creationEvenement.php" title="Creer evenement">
                                <span><i class="far fa-calendar-plus"></i></span>
                            </a>
                        </li>

                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../forum/eleveForum.php?choix=medecin" title="Forum">
                                <span><i class="fas fa-comments"></i></span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
                <!-- Center elements -->

                <!-- Right elements -->
                <ul class="navbar-nav flex-row">
                    <li>
                        <?php
                        if ($_SESSION['fonction'] == 'eleve') { ?>
                            <button type="button" class="btn btn-success" data-mdb-ripple-init disabled><?php echo $_SESSION['fonction']?></button>
                            <?php
                        }
                        if ($_SESSION['fonction'] == 'professeur') { ?>
                            <button type="button" class="btn btn-info" data-mdb-ripple-init disabled><?php echo $_SESSION['fonction']?></button>
                            <?php
                        }
                        if ($_SESSION['fonction'] == 'operateur') { ?>
                            <button type="button" class="btn btn-warning" data-mdb-ripple-init disabled><?php echo $_SESSION['fonction']?></button>
                            <?php
                        }
                        ?>
                    </li>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link d-sm-flex align-items-sm-center" href="../auth/profiles.php" title="Profil">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp" class="rounded-circle" height="22" alt="Black and White Portrait of a Man" loading="lazy" />
                            <strong class="d-none d-sm-block ms-1"><?php echo strtoupper($_SESSION['prenom']); ?></strong>
                        </a>
                    </li>

                    <li class="nav-item dropdown me-3 me-lg-1">
                        <a data-mdb-dropdown-init class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                            <i class="fas fa-chevron-circle-down fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                            if ($_SESSION['fonction'] == 'professeur') { ?>
                                <li><a class="dropdown-item" href="#">Tableau de(s) offre</a></li>
                                <?php
                            }
                            else { ?>
                                <li><a class="dropdown-item" href="#">Non disponible</a></li>
                                <?php
                            }
                            ?>
                            <li><a class="dropdown-item" href="/HSP/src/controller/traitMenu.php">Déconnection</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <main>
        <div class="box">
            <div class="inscription-container" id="inscription">
                <h1>Création</h1>

                <form method="post" action="/HSP/src/controller/traitHopital.php">
                    <input type="text" name="nom" placeholder="Nom de l'établissement">
                    <input type="text" name="adresse" placeholder="Voie/Rue">
                    <input type="number" name="cp" placeholder="Code postal">
                    <input type="url" name="site" placeholder="Page web">
                    <button type="submit" name="submit" class="btn btn-primary" data-mdb-ripple-init>Créer l'établissement </button>
                </form>

                <div class="faute">
                    <?php
                    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullurl, "hop=vide") !== false) {
                        echo "<p class='text-warning'>Vous n'avez pas rempli tout les champs !</p>";
                    }
                    elseif (strpos($fullurl, "hop=site") !== false) {
                        echo "<p class='text-danger'>Un autre établissement à possede cette url !!!</p>";
                    }
                    elseif (strpos($fullurl, "hop=reussi") !== false) {
                        echo "<p class='text-success'>Etablissement créer !</p>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </main>
    <footer>

    </footer>
    <!-- MDB -->
    <script type="text/javascript" src="../../assets/js/mdb.umd.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    </body>
    </html>
<?php
}
?>
