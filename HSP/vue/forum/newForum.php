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
        <link rel="stylesheet" href="../../assets/css/nav.css">
        <link rel="stylesheet" href="../../assets/css/cssOffre.css">
        <link rel="stylesheet" href="../../assets/css/newForum.css">
        <style>

        </style>
        <title>Tableau des Offres - HSP</title>
    </head>
    <body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
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
                                <li class="nav-item">
                                    <a class="nav-link mx-lg-2" aria-current="page" href="../newAnuaireProf.php">Annuaire</a>
                                </li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../newEvent.php"><i
                                            class="fas fa-calendar-day"></i> Évènements</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2" href="../newOffre.php"><i
                                            class="fas fa-briefcase"></i> Offres</a></li>
                                <li class="nav-item"><a class="nav-link mx-lg-2 active" href="/HSP/vue/forum/newForum.php?choix="><i
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
                <a href="../auth/newProfile.php" class="login-button d-flex align-items-center">
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

    <main>
        <section>
            <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
            <div class="container">
                <div class="row">
                    <div class="btn align-items-center">
                        <a href="newForum.php?choix="><button class="btn btn-primary" type="button" data-mdb-ripple-init>Tout</button></a>
                        <a href="newForum.php?choix=eleve"><button class="btn btn-primary" type="button" data-mdb-ripple-init>Eleve</button></a>
                        <a href="newForum.php?choix=medecin"><button class="btn btn-primary" type="button" data-mdb-ripple-init>Medecin</button></a>
                    </div>
                    <?php
                    if($_GET['choix'] == ''){?>
                        <div class="col-lg-9 mb-3">
                            <?php
                            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                            $requete = $bdd->prepare("SELECT * FROM post");
                            $requete->execute();
                            $aff = $requete->fetchAll();

                            foreach ($aff as $ligne) {
                                $user = $bdd->prepare("SELECT prenom FROM utilisateur WHERE id = :id");
                                $user->execute(array('id' => $ligne['ref_utilisateur']));
                                $show = $user->fetchAll();

                                $comms = $bdd->prepare("SELECT COUNT(*) as comms FROM reponse WHERE ref_post = :ref_post");
                                $comms->execute(array('ref_post' => $ligne['id']));
                                $nombre = $comms->fetch()['comms'];

                                foreach ($show as $infos) {
                                    ?>
                                    <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 ">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 mb-3 mb-sm-0">
                                                <h5>
                                                    <a href="post.php?postid=<?php echo $ligne['id'] ?>" class="text-primary"><?php echo $ligne['titre']?></a>
                                                </h5>
                                                <p class="text-sm"><span class="op-6">Poster</span> <span class="op-6">par</span> <a class="text-black"><?php echo $infos['prenom']?></a></p>
                                            </div>
                                            <div class="col-md-4 op-7">
                                                <div class="row text-center op-7">
                                                    <div class="col px-1"> <i class="fas fa-message"></i> <span class="d-block text-sm"><?php echo $nombre; ?> Commentaire(s)</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- Sidebar content -->
                        <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                            <div style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;"></div><div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}" data-toggle="sticky" class="sticky" style="top: 85px;"><div class="sticky-inner">
                                    <a class="btn btn-lg btn-block btn-success py-4 mb-3 bg-op-6 roboto-bold" href="createPost.php">Créer un post</a>
                                    <div class="bg-white mb-3">
                                        <h4 class="px-3 py-4 op-5 m-0">
                                            Posts pertinents
                                        </h4>
                                        <hr class="m-0">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                        $requete = $bdd->prepare("SELECT p.*, COUNT(r.ref_post) AS nombreDeComms FROM post p LEFT JOIN reponse r ON p.id = r.ref_post GROUP BY p.id;");
                                        $requete->execute();
                                        $aff = $requete->fetchAll();

                                        foreach ($aff as $ligne) {
                                            $user = $bdd->prepare("SELECT prenom FROM utilisateur WHERE id = :id");
                                            $user->execute(array('id' => $ligne['ref_utilisateur']));
                                            $show = $user->fetchAll();

                                            foreach ($show as $infos) {
                                                ?>
                                                <div class="pos-relative px-3 py-3">
                                                    <h6 class="text-primary text-sm">
                                                        <a href="http://hsp-project/HSP/vue/forum/post.php?postid=<?php echo $ligne['id'] ?>" class="text-primary"><?php echo $ligne['titre']?></a>
                                                    </h6>
                                                    <p class="mb-0 text-sm"><span class="op-6">Publier</span> <span class="op-6">par</span> <a class="text-black"><?php echo $infos['prenom'] ?></a></p>
                                                </div>
                                                <hr class="m-0">
                                                <?php
                                            }
                                        }
                                        ?>
                                        <hr class="m-0">
                                    </div>
                                    <div class="bg-white text-sm">
                                        <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                                            Statistiques
                                        </h4>
                                        <hr class="my-0">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                        //Nombre de comms
                                        $comms = $bdd->prepare("SELECT COUNT(*) as comms FROM reponse ");
                                        $comms->execute();
                                        $nombreComms = $comms->fetch()['comms'];

                                        //Nombre de post
                                        $post = $bdd->prepare("SELECT COUNT(*) as post FROM post ");
                                        $post->execute();
                                        $nombrePost = $post->fetch()['post'];

                                        ?>
                                        <div class="row text-center d-flex flex-row op-7 mx-0">
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" href="#"><?php echo $nombreComms ?></a> Commentaires </div>
                                            <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a class="d-block lead font-weight-bold" href="#"><?php echo $nombrePost ?></a> Post </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    if($_GET['choix'] == 'eleve'){?>
                        <div class="col-lg-9 mb-3">
                            <?php
                            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                            $requete = $bdd->prepare("SELECT * FROM post WHERE categorie = 'eleve'");
                            $requete->execute();
                            $aff = $requete->fetchAll();

                            foreach ($aff as $ligne) {
                                $user = $bdd->prepare("SELECT prenom FROM utilisateur WHERE id = :id");
                                $user->execute(array('id' => $ligne['ref_utilisateur']));
                                $show = $user->fetchAll();

                                $comms = $bdd->prepare("SELECT COUNT(*) as comms FROM reponse WHERE ref_post = :ref_post");
                                $comms->execute(array('ref_post' => $ligne['id']));
                                $nombre = $comms->fetch()['comms'];

                                foreach ($show as $infos) {
                                    ?>
                                    <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 ">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 mb-3 mb-sm-0">
                                                <h5>
                                                    <a href="post.php?postid=<?php echo $ligne['id'] ?>" class="text-primary"><?php echo $ligne['titre']?></a>
                                                </h5>
                                                <p class="text-sm"><span class="op-6">Poster</span> <span class="op-6">par</span> <a class="text-black"><?php echo $infos['prenom']?></a></p>
                                            </div>
                                            <div class="col-md-4 op-7">
                                                <div class="row text-center op-7">
                                                    <div class="col px-1"> <i class="fas fa-message"></i> <span class="d-block text-sm"><?php echo $nombre; ?> Commentaire(s)</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- Sidebar content -->
                        <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                            <div style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;"></div><div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}" data-toggle="sticky" class="sticky" style="top: 85px;"><div class="sticky-inner">
                                    <a class="btn btn-lg btn-block btn-success py-4 mb-3 bg-op-6 roboto-bold" href="createPost.php">Créer un post</a>
                                    <div class="bg-white mb-3">
                                        <h4 class="px-3 py-4 op-5 m-0">
                                            Posts pertinents
                                        </h4>
                                        <hr class="m-0">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                        $requete = $bdd->prepare("SELECT p.*, COUNT(r.ref_post) AS nombreDeComms FROM post p LEFT JOIN reponse r ON p.id = r.ref_post GROUP BY p.id;");
                                        $requete->execute();
                                        $aff = $requete->fetchAll();

                                        foreach ($aff as $ligne) {
                                            $user = $bdd->prepare("SELECT prenom FROM utilisateur WHERE id = :id");
                                            $user->execute(array('id' => $ligne['ref_utilisateur']));
                                            $show = $user->fetchAll();

                                            foreach ($show as $infos) {
                                                ?>
                                                <div class="pos-relative px-3 py-3">
                                                    <h6 class="text-primary text-sm">
                                                        <a href="http://hsp-project/HSP/vue/forum/post.php?postid=<?php echo $ligne['id'] ?>" class="text-primary"><?php echo $ligne['titre']?></a>
                                                    </h6>
                                                    <p class="mb-0 text-sm"><span class="op-6">Publier</span> <span class="op-6">par</span> <a class="text-black"><?php echo $infos['prenom'] ?></a></p>
                                                </div>
                                                <hr class="m-0">
                                                <?php
                                            }
                                        }
                                        ?>
                                        <hr class="m-0">
                                    </div>
                                    <div class="bg-white text-sm">
                                        <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                                            Statistiques
                                        </h4>
                                        <hr class="my-0">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                        //Nombre de comms
                                        $comms = $bdd->prepare("SELECT COUNT(*) as comms FROM reponse ");
                                        $comms->execute();
                                        $nombreComms = $comms->fetch()['comms'];

                                        //Nombre de post
                                        $post = $bdd->prepare("SELECT COUNT(*) as post FROM post ");
                                        $post->execute();
                                        $nombrePost = $post->fetch()['post'];

                                        ?>
                                        <div class="row text-center d-flex flex-row op-7 mx-0">
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" href="#"><?php echo $nombreComms ?></a> Commentaires </div>
                                            <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a class="d-block lead font-weight-bold" href="#"><?php echo $nombrePost ?></a> Post </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    if($_GET['choix'] == 'medecin'){?>
                        <div class="col-lg-9 mb-3">
                            <?php
                            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                            $requete = $bdd->prepare("SELECT * FROM post WHERE categorie = 'medecin'");
                            $requete->execute();
                            $aff = $requete->fetchAll();

                            foreach ($aff as $ligne) {
                                $user = $bdd->prepare("SELECT prenom FROM utilisateur WHERE id = :id");
                                $user->execute(array('id' => $ligne['ref_utilisateur']));
                                $show = $user->fetchAll();

                                $comms = $bdd->prepare("SELECT COUNT(*) as comms FROM reponse WHERE ref_post = :ref_post");
                                $comms->execute(array('ref_post' => $ligne['id']));
                                $nombre = $comms->fetch()['comms'];

                                foreach ($show as $infos) {
                                    ?>
                                    <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 ">
                                        <div class="row align-items-center">
                                            <div class="col-md-8 mb-3 mb-sm-0">
                                                <h5>
                                                    <a href="post.php?postid=<?php echo $ligne['id'] ?>" class="text-primary"><?php echo $ligne['titre']?></a>
                                                </h5>
                                                <p class="text-sm"><span class="op-6">Poster</span> <span class="op-6">par</span> <a class="text-black"><?php echo $infos['prenom']?></a></p>
                                            </div>
                                            <div class="col-md-4 op-7">
                                                <div class="row text-center op-7">
                                                    <div class="col px-1"> <i class="fas fa-message"></i> <span class="d-block text-sm"><?php echo $nombre; ?> Commentaire(s)</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- Sidebar content -->
                        <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                            <div style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;"></div><div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}" data-toggle="sticky" class="sticky" style="top: 85px;"><div class="sticky-inner">
                                    <a class="btn btn-lg btn-block btn-success py-4 mb-3 bg-op-6 roboto-bold" href="createPost.php">Créer un post</a>
                                    <div class="bg-white mb-3">
                                        <h4 class="px-3 py-4 op-5 m-0">
                                            Posts pertinents
                                        </h4>
                                        <hr class="m-0">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                        $requete = $bdd->prepare("SELECT p.*, COUNT(r.ref_post) AS nombreDeComms FROM post p LEFT JOIN reponse r ON p.id = r.ref_post GROUP BY p.id;");
                                        $requete->execute();
                                        $aff = $requete->fetchAll();

                                        foreach ($aff as $ligne) {
                                            $user = $bdd->prepare("SELECT prenom FROM utilisateur WHERE id = :id");
                                            $user->execute(array('id' => $ligne['ref_utilisateur']));
                                            $show = $user->fetchAll();

                                            foreach ($show as $infos) {
                                                ?>
                                                <div class="pos-relative px-3 py-3">
                                                    <h6 class="text-primary text-sm">
                                                        <a href="http://hsp-project/HSP/vue/forum/post.php?postid=<?php echo $ligne['id'] ?>" class="text-primary"><?php echo $ligne['titre']?></a>
                                                    </h6>
                                                    <p class="mb-0 text-sm"><span class="op-6">Publier</span> <span class="op-6">par</span> <a class="text-black"><?php echo $infos['prenom'] ?></a></p>
                                                </div>
                                                <hr class="m-0">
                                                <?php
                                            }
                                        }
                                        ?>
                                        <hr class="m-0">
                                    </div>
                                    <div class="bg-white text-sm">
                                        <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                                            Statistiques
                                        </h4>
                                        <hr class="my-0">
                                        <?php
                                        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                                        //Nombre de comms
                                        $comms = $bdd->prepare("SELECT COUNT(*) as comms FROM reponse ");
                                        $comms->execute();
                                        $nombreComms = $comms->fetch()['comms'];

                                        //Nombre de post
                                        $post = $bdd->prepare("SELECT COUNT(*) as post FROM post ");
                                        $post->execute();
                                        $nombrePost = $post->fetch()['post'];

                                        ?>
                                        <div class="row text-center d-flex flex-row op-7 mx-0">
                                            <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" href="#"><?php echo $nombreComms ?></a> Commentaires </div>
                                            <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a class="d-block lead font-weight-bold" href="#"><?php echo $nombrePost ?></a> Post </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
        </section>
        <section class="footer mt-4">
            <div class="container text-center">
                <p>&copy; 2024 Hôpital Sud Paris (HSP). Tous droits réservés.</p>
            </div>
        </section>
    </main>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
}
