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
        <link rel="stylesheet" href="../assets/css/menu.css">
        <link rel="stylesheet" href="../assets/css/all.css">
    </head>
    <body>
    <!-- Start your project here-->
    <header>
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <div class="d-flex">
                    <!-- Brand -->
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="menu.php">
                        <img src="/HSP/assets/img/freepik-export-202410281551095LzP.ico" height="20" alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
                        <small>Tableau de bord</small>
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <?php
                if ($_SESSION['fonction'] == 'eleve'){ ?>
                    <ul class="navbar-nav flex-row d-none d-md-flex">
                    <li class="nav-item me-3 me-lg-1 active">
                        <a class="nav-link" href="database.php">
                            <span><i class="fas fa-book-open"></i></span>
                        </a>
                    </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="eleveEvenement.php">
                                <span><i class="fas fa-calendar-day"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="eleveOffre.php">
                                <span><i class="fas fa-briefcase"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="forum/eleveForum.php">
                                <span><i class="fas fa-comments"></i></span>
                            </a>
                        </li>
                </ul>
                <?php
                }
                if ($_SESSION['fonction'] == 'professeur'){ ?>
                <ul class="navbar-nav flex-row d-none d-md-flex">
                    <li class="nav-item me-3 me-lg-1 active">
                        <a class="nav-link" href="annuaireMedecin.php">
                            <span><i class="fas fa-graduation-cap"></i></span>
                        </a>
                    </li>

                    <li class="nav-item me-3 me-lg-1 active">
                        <a class="nav-link" href="creationEvenement.php">
                            <span><i class="far fa-calendar-plus"></i></span>
                        </a>
                    </li>
                </ul>
                    <?php
                }
                if ($_SESSION['fonction'] == 'operateur'){ ?>
                <ul class="navbar-nav flex-row d-none d-md-flex">
                    <li class="nav-item me-3 me-lg-1 active">
                        <a class="nav-link" href="/HSP/vue/auth/validation.php?btn=">
                            <span><i class="fas fa-clipboard-list"></i></span>
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
                        <a class="nav-link d-sm-flex align-items-sm-center" href="auth/profiles.php">
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
        <?php
        if ($_SESSION['fonction']=='eleve'){
            ?>
            <div class="container">
                <div class="item item1">
                    <section class="titre">
                        <h1>
                            Evénement inscrit
                        </h1>
                    </section>
                    <section class="cadre-table-scroll">
                        <table class="table align-middle height-15 mb-0 bg-white">
                            <thead class="bg-light">
                            <?php
                            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                            $requete = $bdd->prepare("SELECT * FROM fiche_evenement WHERE id IN (SELECT ref_fiche_evenement FROM fich_eve_utilisateur WHERE ref_utilisateur = :id) ");
                            $requete->execute(array(
                                'id' => $_SESSION['id']
                            ));
                            $aff = $requete->fetchAll();

                            if ($aff == NULL) { ?>
                                <div>
                                    <a href="/HSP/vue/eleveEvenement.php">
                                        <button type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark">Participer à un évenement</button>
                                    </a>
                                </div>
                                <?php
                            }
                            else { ?>
                            <tr>
                                <th>Nom</th>
                                <th>Etablissement</th>
                                <th>Place</th>
                                <th>Infos</th>
                                <th>Annuler ?</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($aff as $ligne) {
                                ?>
                                <tr>
                                    <td>
                                        <div class=" align-items-center">
                                            <div>
                                                <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['titre'])?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p><?php echo htmlspecialchars($ligne['hop'])?></p>
                                    </td>
                                    <td><?php echo htmlspecialchars($ligne['nb_place'])?></td>
                                    <td>
                                        <a href="/HSP/vue/eleveEvenement.php">
                                            <button type="button" class="btn btn-info" data-mdb-ripple-init>Info</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="/HSP/src/controller/traitEleveEvenement.php">
                                            <input type="hidden" name="event" value="<?php echo $ligne['id']; ?>">
                                            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                            <button type="submit" value="annuler" name="submit" class="btn btn-danger" data-mdb-ripple-init>Annuler</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </section>
                </div>


                <div class="item item2">
                    <section>
                        <h1>Temps</h1>
                    </section>
                    <section>
                        <!-- Date -->
                        <h2><?php echo date("d/m/Y"); // Exemple : 17/11/2024 ?></h2>
                        <h2><?php echo date("H:i:s", time() + 3600); ?></h2>
                    </section>
                </div>

                <div class="item item3">

                </div>

                <div class="item item4">
                    <div class="item item1">
                        <section class="titre">
                            <h1>
                                Offre inscrit
                            </h1>
                        </section>
                        <section class="cadre-table-scroll">
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">
                                <?php
                                $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                $requete = $bdd->prepare("SELECT * FROM offre WHERE id IN (SELECT ref_offre FROM utilisateur_offre WHERE ref_utilisateur = :id) ");
                                $requete->execute(array(
                                    'id' => $_SESSION['id']
                                ));
                                $aff = $requete->fetchAll();

                                if ($aff == NULL) { ?>
                                    <div>
                                        <a href="/HSP/vue/eleveOffre.php">
                                            <button type="button" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark">Participer à une offre d'emploi / stage</button>
                                        </a>
                                    </div>
                                    <?php
                                }
                                else { ?>
                                <tr>
                                    <th>Fonction</th>
                                    <th>Taches</th>
                                    <th>Date</th>
                                    <th>Contrat</th>
                                    <th>Candidature</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach ($aff as $ligne) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class=" align-items-center">
                                                <div>
                                                    <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['titre'])?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo htmlspecialchars($ligne['tache'])?></p>
                                        </td>
                                        <td><?php echo htmlspecialchars($ligne['date'])?></td>
                                        <td>
                                            <a href="/HSP/vue/eleveOffre.php">
                                                <button type="button" class="btn btn-info" data-mdb-ripple-init>Info</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" action="/HSP/src/controller/traitEleveOffre.php">
                                                <input type="hidden" name="offre" value="<?php echo $ligne['id']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                                <button type="submit" value="annuler" name="submit" class="btn btn-danger" data-mdb-ripple-init>Annuler</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <div class="item item5">5</div>
                <div class="item item6">6</div>
            </div>
        <?php
        }
        else{?>

            <?php
        }
        ?>

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
