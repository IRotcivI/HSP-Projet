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
        <link rel="stylesheet" href="../../assets/css/mdb.min.css" />
        <link rel="stylesheet" href="../../assets/css/validation.css">
        <link rel="stylesheet" href="../../assets/css/all.css">
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
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="/HSP/vue/menu.php">
                        <img src="/HSP/assets/img/freepik-export-202410281551095LzP.ico" height="20" alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
                        <small>Demande d'inscription</small>
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
                ?>
                <?php
                if ($_SESSION['fonction'] == 'operateur'){ ?>
                    <ul class="navbar-nav flex-row d-none d-md-flex">
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="validation.php?btn=">
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
                        <a class="nav-link d-sm-flex align-items-sm-center" href="profiles.php">
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
        <div class="container">
            <div class="btn-group">
                <a href="http://hsp-project/HSP/vue/auth/validation.php?btn=eleve">
                    <button type="button" class="btn btn-outline-warning">Eleve</button>
                </a>
                <a href="http://hsp-project/HSP/vue/auth/validation.php?btn=professeur">
                    <button type="button" class="btn btn-outline-success">Professeur</button>
                </a>
            </div>
        </div>

        <?php
        if ($_GET['btn'] == ''){?>

            <?php
        }
        if ($_GET['btn'] == 'eleve'){?>
        <table id="myTable" class="table align-middle mb-0 bg-white display">
            <thead class="bg-light align-content-center">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Fonction</th>
                <th>CV</th>
                <th>Accepter/Refuser</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
            $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE inscrit = 0 AND fonction = 'eleve'");
            $requete->execute();
            $aff = $requete->fetchAll();

            foreach ($aff as $ligne) {
                ?>
                <tr>
                    <form action="/HSP/src/controller/traitValidation.php" method="POST">
                        <!-- Titre Column -->
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['nom'])?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo strtoupper($ligne['prenom'])?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['email'])?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['fonction'])?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['cv'])?></p>
                        </td>
                        <td>
                            <button type="submit" name="submit" value="accepter" class="btn btn-success" data-mdb-ripple-init>Accepter</button>
                            <button type="submit" name="submit" value="refuser" class="btn btn-danger" data-mdb-ripple-init>Refuser</button>
                        </td>
                        <input type="hidden" name="id" value="<?php echo $ligne['id'] ?>">
                        <input type="hidden" name="email" value="<?php echo $ligne['email'] ?>">
                    </form>
                </tr>

            <?php } ?>
            </tbody>
        </table>
        <?php
        }
        if ($_GET['btn'] == 'professeur'){?>
            <table id="myTable" class="table align-middle mb-0 bg-white display">
                <thead class="bg-light align-content-center">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Fonction</th>
                    <th>Spécialité</th>
                    <th>Hopital</th>
                    <th>Accepter/Refuser</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE inscrit = 0 AND fonction = 'professeur'");
                $requete->execute();
                $aff = $requete->fetchAll();

                foreach ($aff as $ligne) {
                    ?>
                    <tr>
                        <form action="/HSP/src/controller/traitValidation.php" method="POST">
                            <!-- Titre Column -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['nom'])?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1"><?php echo strtoupper($ligne['prenom'])?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['email'])?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['fonction'])?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['spécialité'])?></p>
                            </td>
                            <td>
                                <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['spécialité'])?></p>
                            </td>
                            <td>
                                <button type="submit" name="submit" value="accepter" class="btn btn-success" data-mdb-ripple-init>Accepter</button>
                                <button type="submit" name="submit" value="refuser" class="btn btn-danger" data-mdb-ripple-init>Refuser</button>
                            </td>
                            <input type="hidden" name="id" value="<?php echo $ligne['id'] ?>">
                            <input type="hidden" name="email" value="<?php echo $ligne['email'] ?>">
                        </form>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php
        }
        ?>

    </main>



    <footer></footer>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="../../assets/js/mdb.umd.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    </body>
    </html>

    <?php
}
?>
