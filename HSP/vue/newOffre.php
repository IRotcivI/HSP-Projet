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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/nav.css">
        <link rel="stylesheet" href="../assets/css/cssOffre.css">
        <title>Tableau des Offres - HSP</title>
    </head>
    <body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand me-auto d-flex align-items-center" href="newMenu.php">
                    <img src="../assets/img/freepik-export-202410281551095LzP.ico" height="24" alt="HSP Logo"/>
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
                                <li class="nav-item">
                                    <a class="nav-link mx-lg-2" aria-current="page" href="newAnuaireProf.php">Annuaire</a>
                                </li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="newEvent.php"><i
                                            class="fas fa-calendar-day"></i> Évènements</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2 active" href="newOffre.php"><i
                                            class="fas fa-briefcase"></i> Offres</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../../HSP/vue/forum/newForum.php?choix="><i
                                            class="fas fa-comments"></i> Forum</a></li>
                            <?php } elseif ($_SESSION['fonction'] == 'professeur') { ?>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="annuaireMedecin.php"><i
                                            class="fas fa-graduation-cap"></i> Annuaire</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="creationEvenement.php"><i
                                            class="far fa-calendar-plus"></i> Créer un événement</a></li>
                            <?php } elseif ($_SESSION['fonction'] == 'operateur') { ?>
                                <li class="nav-item"><a class="nav-link mx-lg-2"
                                                        href="../../HSP/vue/auth/validation.php?btn="><i
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
                <a href="auth/newProfile.php" class="login-button d-flex align-items-center">
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
                        <li><a class="dropdown-item" href="../../HSP/src/controller/traitMenu.php">Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="mt-5 pt-5">
        <section class="card shadow p-4">
            <header class="mb-4">
                <h2 class="text-center text-primary">Liste des Offres</h2>
            </header>
            <div class="table-responsive">
                <table id="myTable" class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                    <tr>
                        <th>Titre</th>
                        <th >Description</th>
                        <th>Tâches</th>
                        <th>Date</th>
                        <th>Salaire</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                    $requete = $bdd->prepare("SELECT * FROM offre");
                    $requete->execute();
                    $offres = $requete->fetchAll();

                    foreach ($offres as $offre) {
                        $button = $bdd->prepare("SELECT * FROM utilisateur_offre WHERE ref_utilisateur = :id AND ref_offre = :offre ");
                        $button->execute([
                            'id' => $_SESSION['id'],
                            'offre' => $offre['id']
                        ]);
                        $postule = $button->fetch();
                        ?>
                        <tr>
                            <form action="../../HSP/src/controller/traitEleveOffre.php" method="POST">
                                <td><?php echo htmlspecialchars($offre['titre']); ?></td>
                                <td><textarea disabled><?php echo htmlspecialchars($offre['description']); ?></textarea></td>
                                <td><?php echo htmlspecialchars($offre['tache']); ?></td>
                                <td><?php echo htmlspecialchars($offre['date']); ?></td>
                                <td><?php echo htmlspecialchars($offre['salaire']); ?></td>
                                <td><?php echo htmlspecialchars($offre['type']); ?></td>
                                <td>
                                    <?php if ($postule) { ?>
                                        <button type="submit" name="submit" value="annuler" class="btn btn-danger">Annuler</button>
                                    <?php } else { ?>
                                        <button type="submit" name="submit" value="postuler" class="btn btn-success">Postuler</button>
                                    <?php } ?>
                                </td>
                                <input type="hidden" name="offre" value="<?php echo $offre['id']; ?>">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                            </form>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="footer mt-4">
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
    <?php
}
