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
        <link rel="stylesheet" href="../../assets/css/newForum.css">
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
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="../menu.php" title="Menu">
                        <img src="/HSP/assets/img/freepik-export-202410281551095LzP.ico" height="20" alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
                        <small>Forum</small>
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
                            <a class="nav-link" href="eleveForum.php?choix=" title="Forum">
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
                        else { ?>
                            <button type="button" class="btn btn-info" data-mdb-ripple-init disabled><?php echo $_SESSION['fonction']?></button>
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
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <div class="container">
            <div class="row">
                <div class="btn align-items-center">
                    <a href="eleveForum.php?choix="><button class="btn btn-primary" type="button" data-mdb-ripple-init>Tout</button></a>
                    <a href="eleveForum.php?choix=eleve"><button class="btn btn-primary" type="button" data-mdb-ripple-init>Eleve</button></a>
                    <a href="eleveForum.php?choix=medecin"><button class="btn btn-primary" type="button" data-mdb-ripple-init>Medecin</button></a>
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
