<?php
session_start();

if (empty($_SESSION)) {
    header('Location: /HSP/index.php');
    exit();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>HSP Project</title>
        <!-- HSP icon -->
        <link rel="icon" href="/HSP/assets/img/freepik-export-202410281551095LzP.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <!-- Google Fonts OSWALD -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <!-- MDB -->
        <link rel="stylesheet" href="../assets/css/mdb.min.css" />
        <link rel="stylesheet" href="../assets/css/all.css">
        <link rel="stylesheet" href="../assets/css/eleveEvenement.css">
    </head>
    <body>
    <!-- Start your project here-->
    <header>
        <!-- Navbar-->
        <nav class="navbar align-items-center navbar-expand-lg navbar-light bg-body-tertiary">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <div class="d-flex">
                    <!-- Brand -->
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="menu.php" title="Menu">
                        <img src="/HSP/assets/img/freepik-export-202410281551095LzP.ico" height="20" alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
                        <small>Evenement</small>
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <?php
                if ($_SESSION['fonction'] == 'eleve'){ ?>
                    <ul class="navbar-nav flex-row d-none d-md-flex">
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="database.php" title="Annuaire">
                                <span><i class="fas fa-book-open"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="eleveEvenement.php" title="Evenement">
                                <span><i class="fas fa-calendar-day"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="eleveOffre.php" title="Offre">
                                <span><i class="fas fa-briefcase"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="forum/eleveForum.php?choix=" title="Forum">
                                <span><i class="fas fa-comments"></i></span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
                if ($_SESSION['fonction'] == 'professeur'){ ?>
                    <ul class="navbar-nav flex-row d-none d-md-flex">
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="annuaireMedecin.php" title="Annuaire">
                                <span><i class="fas fa-graduation-cap"></i></span>
                            </a>
                        </li>

                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="creationEvenement.php" title="Creer evenement">
                                <span><i class="far fa-calendar-plus"></i></span>
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
                        else { ?>
                            <button type="button" class="btn btn-info" data-mdb-ripple-init disabled><?php echo $_SESSION['fonction']?></button>
                            <?php
                        }
                        ?>
                    </li>
                    <li class="nav-item me-3 me-lg-1">
                        <a class="nav-link d-sm-flex align-items-sm-center" href="auth/profiles.php" title="Profil">
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
        <table id="myTable" class="table align-middle mb-0 bg-white display">
            <thead class="bg-light">
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Etablisement</th>
                <th>Adresse</th>
                <th>Place</th>
                <th>Participer </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
            $requete = $bdd->prepare("SELECT * FROM fiche_evenement");
            $requete->execute();
            $aff = $requete->fetchAll();

            foreach ($aff as $ligne) {
                ?>
                <tr>
                    <form action="/HSP/src/controller/traitEleveEvenement.php" method="POST">
                        <!-- Titre Column -->
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['titre'])?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <label>
                                <textarea class="textarea" disabled><?php echo strtoupper($ligne['description'])?></textarea>
                            </label>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['hop'])?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['rue']) . " " . htmlspecialchars($ligne['cp']) . " " . htmlspecialchars($ligne['ville']) ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['nb_place'])?></p>
                        </td>
                        <td>
                            <?php

                            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                            $button = $bdd->prepare("SELECT * FROM fich_eve_utilisateur WHERE ref_utilisateur = :id AND ref_fiche_evenement = :event ");
                            $button->execute(array(
                                'id' => $_SESSION['id'],
                                'event'=>$ligne['id']
                            ));

                            $resultat = $button->fetch();

                            $place = $bdd->prepare("SELECT nb_place FROM fiche_evenement WHERE id = :id");
                            $place->execute(array(
                                    'id' => $ligne['id']
                            ));

                            $disponible = $place->fetch();

                            if ($disponible['nb_place'] == 0 && !$resultat) { ?>
                                <button type="submit" name="submit" class="btn btn-warning" disabled data-mdb-ripple-init>Plus de place</button>
                                <?php
                            } else {
                                if ($resultat) { ?>
                                    <button type="submit" name="submit" value="annuler" class="btn btn-danger" data-mdb-ripple-init>Annuler</button>
                                    <?php
                                } else { ?>
                                    <button type="submit" name="submit" value="postuler" class="btn btn-success" data-mdb-ripple-init>Postuler</button>
                                    <?php
                                }
                                ?>
                            <?php
                            }
                            ?>

                        </td>

                        <input type="hidden" name="event" value="<?php echo $ligne['id'] ?>">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                    </form>
                </tr>

            <?php } ?>
            </tbody>
        </table>
    </main>

    <footer></footer>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="../assets/js/mdb.umd.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    </body>
    </html>

    <?php
}
?>
