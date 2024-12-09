<?php
session_start();

if (empty($_SESSION)) {
    header('Location: /HSP/index.php');
    exit();
} else { ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/css/nav.css">
        <link rel="stylesheet" href="../../assets/css/cssMenu.css">
        <link rel="stylesheet" href="../../assets/css/profiles.css">

        <title>Document</title>
    </head>
    <body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand me-auto d-flex align-items-center" href="../newMenu.php">
                    <img src="/HSP/assets/img/freepik-export-202410281551095LzP.ico" height="24" alt="HSP Logo"/>
                    <span class="ms-2">Tableau de bord</span>
                </a>

                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                     aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                            <?php if ($_SESSION['fonction'] == 'eleve') { ?>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../newAnuaireProf.php"><i
                                            class="fas fa-book-open"></i>Annuaire</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../newEvent.php"><i
                                            class="fas fa-calendar-day"></i> Évènements</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../newOffre.php"><i
                                            class="fas fa-briefcase"></i> Offres</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="/HSP/vue/forum/newForum.php?choix="><i
                                            class="fas fa-comments"></i> Forum</a></li>
                            <?php } elseif ($_SESSION['fonction'] == 'professeur') { ?>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../annuaireMedecin.php"><i
                                            class="fas fa-graduation-cap"></i> Annuaire</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../creationEvenement.php"><i
                                            class="far fa-calendar-plus"></i> Créer un événement</a></li>
                            <?php } elseif ($_SESSION['fonction'] == 'operateur') { ?>
                                <li class="nav-item"><a class="nav-link mx-lg-2"
                                                        href="/HSP/vue/auth/validation.php?btn="><i
                                            class="fas fa-clipboard-list"></i> Validation</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- Status Badge -->
                <div class="status">
                    <?php if ($_SESSION['fonction'] == 'eleve') { ?>
                        <span class="badge-custom badge-success">Élève</span>
                    <?php } elseif ($_SESSION['fonction'] == 'professeur') { ?>
                        <span class="badge-custom badge-info">Professeur</span>
                    <?php } elseif ($_SESSION['fonction'] == 'operateur') { ?>
                        <span class="badge-custom badge-warning">Opérateur</span>
                    <?php } ?>
                </div>


                <!-- User Profile -->
                <a href="auth/profiles.php" class="login-button d-flex align-items-center">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp" class="rounded-circle me-2" height="22"
                         alt="Avatar">
                    <strong><?php echo strtoupper($_SESSION['prenom']); ?></strong>
                </a>

                <!-- Toggler Button -->
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Dropdown Options -->
                <div class="dropdown ms-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if ($_SESSION['fonction'] == 'professeur') { ?>
                            <li><a class="dropdown-item" href="#">Tableau des offres</a></li>
                        <?php } else { ?>
                            <li><a class="dropdown-item" href="#">Non disponible</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="/HSP/src/controller/traitMenu.php">Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="mt-5 pt-5">
        <section>
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?php echo $_SESSION['nom'] ." ". $_SESSION['prenom']; ?></h5>
                            <p class="text-muted mb-1"><?php echo strtoupper($_SESSION['fonction']); ?></p>
                            <p class="text-muted mb-3"><?php echo $_SESSION['email']; ?></p>
                            <form method="post" action="../../src/controller/traitModifHop.php">
                                <select name="hopital" class="btn btn-secondary dropdown-toggle">
                                    <?php
                                    $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                    $requete = $bdd->prepare("SELECT * FROM hopital");
                                    $requete->execute();
                                    $aff = $requete->fetchAll();
                                    foreach ($aff as $ligne) {
                                        ?>
                                        <option value="<?php echo $ligne['id']; ?>" name="hopital"><?php echo $ligne['nom']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <input type="hidden" value="<?php echo $_SESSION['id']; ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                            </form>
                            <a href="/HSP/vue/auth/hopital.php">
                                <button type="button" class="btn btn-primary btn-sm">Créer hopital</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <form method="post" action="../../src/controller/traitProfiles.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nom</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Prénom</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mobile</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">0 00 00 00 00</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Établissement</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">CHU Mozart</p>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-info" data-mdb-ripple-init>MODIFIER</button>
                            </div>
                        </form>
                        <div class="card-body">
                            <?php
                            $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                            if (strpos($fullurl, "profiles=ras") !== false) {
                                echo "<p class='text-warning'>Aucun de ces champs n'a été modifié !</p>";
                            }
                            elseif (strpos($fullurl, "profiles=caractere") !== false) {
                                echo "<p class='text-danger'>Vous avez utilisé des caractères invalides !</p>";
                            }
                            elseif (strpos($fullurl, "profiles=emailinvalide") !== false) {
                                echo "<p class='text-danger'>Email invalide !</p>";
                            }
                            elseif (strpos($fullurl, "inscription=passwordincorect") !== false) {
                                echo "<p class='text-danger'>Les mots de passe ne correspondent pas !</p>";
                            }
                            elseif (strpos($fullurl, "erreur=1") !== false) {
                                echo "<p class='text-danger'>Email déjà utilisé !</p>";
                            }
                            elseif (strpos($fullurl, "succes=1") !== false) {
                                echo "<p class='text-success'>Profil modifié avec succès !</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

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
            crossorigin="anonymous"
    ></script>
    </body>
    </html>
    <?php
}
?>
