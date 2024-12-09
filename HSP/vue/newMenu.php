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
        <link rel="stylesheet" href="../assets/css/nav.css">
        <link rel="stylesheet" href="../assets/css/cssMenu.css">

        <title>Document</title>
    </head>
    <body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand me-auto d-flex align-items-center" href="newMenu.php">
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
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="newAnuaireProf.php"><i
                                                class="fas fa-book-open"></i>Annuaire</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="newEvent.php"><i
                                                class="fas fa-calendar-day"></i> Évènements</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="newOffre.php"><i
                                                class="fas fa-briefcase"></i> Offres</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="/HSP/vue/forum/newForum.php?choix="><i
                                                class="fas fa-comments"></i> Forum</a></li>
                            <?php } elseif ($_SESSION['fonction'] == 'professeur') { ?>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="annuaireMedecin.php"><i
                                                class="fas fa-graduation-cap"></i> Annuaire</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="creationEvenement.php"><i
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
        <section class="widget">
            <?php
            if ($_SESSION['fonction'] == 'eleve') {
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
                                            <button type="button" class="btn btn-light" data-mdb-ripple-init
                                                    data-mdb-ripple-color="dark">Participer à un évenement
                                            </button>
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
                                                    <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['titre']) ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo htmlspecialchars($ligne['hop']) ?></p>
                                        </td>
                                        <td><?php echo htmlspecialchars($ligne['nb_place']) ?></td>
                                        <td>
                                            <a href="/HSP/vue/eleveEvenement.php">
                                                <button type="button" class="btn btn-info" data-mdb-ripple-init>Info
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" action="/HSP/src/controller/traitEleveEvenement.php">
                                                <input type="hidden" name="event" value="<?php echo $ligne['id']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                                <button type="submit" value="annuler" name="submit"
                                                        class="btn btn-danger" data-mdb-ripple-init>Annuler
                                                </button>
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
                            <h2 class="date"></h2> <!-- La date sera insérée ici -->
                            <h2 class="time"></h2> <!-- L'heure sera insérée ici -->
                        </section>
                    </div>
                    <div class="item item3">
                        3
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
                                                <button type="button" class="btn btn-light" data-mdb-ripple-init
                                                        data-mdb-ripple-color="dark">Participer à une offre d'emploi /
                                                    stage
                                                </button>
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
                                                        <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['titre']) ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p><?php echo htmlspecialchars($ligne['tache']) ?></p>
                                            </td>
                                            <td><?php echo htmlspecialchars($ligne['date']) ?></td>
                                            <td>
                                                <a href="/HSP/vue/eleveOffre.php">
                                                    <button type="button" class="btn btn-info" data-mdb-ripple-init>
                                                        Info
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="post" action="/HSP/src/controller/traitEleveOffre.php">
                                                    <input type="hidden" name="offre"
                                                           value="<?php echo $ligne['id']; ?>">
                                                    <input type="hidden" name="id"
                                                           value="<?php echo $_SESSION['id']; ?>">
                                                    <button type="submit" value="annuler" name="submit"
                                                            class="btn btn-danger" data-mdb-ripple-init>Annuler
                                                    </button>
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
            } else {
                ?>
                <?php
            }
            ?>

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

    <!--Temps-->
    <script>
      function startClock() {
        const timeElement = document.querySelector(".item2 .time"); // Sélecteur pour l'heure
        const dateElement = document.querySelector(".item2 .date"); // Sélecteur pour la date

        function updateClock() {
          const now = new Date();

          const hours = String(now.getHours()).padStart(2, "0");
          const minutes = String(now.getMinutes()).padStart(2, "0");
          const seconds = String(now.getSeconds()).padStart(2, "0");
          const timeString = `${hours}:${minutes}:${seconds}`;

          const day = String(now.getDate()).padStart(2, "0");
          const month = String(now.getMonth() + 1).padStart(2, "0"); // Mois commence à 0
          const year = now.getFullYear();
          const dateString = `${day}/${month}/${year}`;

          // Mise à jour du DOM
          if (timeElement) timeElement.textContent = timeString;
          if (dateElement) dateElement.textContent = dateString;
        }

        updateClock();
        setInterval(updateClock, 1000);
      }

      document.addEventListener("DOMContentLoaded", startClock);
    </script>
    </body>
    </html>
    <?php
}
