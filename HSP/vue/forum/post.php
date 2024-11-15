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
        <link rel="stylesheet" href="../../assets/css/post.css">
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
                    <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="../menu.php">
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
                            <a class="nav-link" href="../database.php">
                                <span><i class="fas fa-book-open"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../eleveEvenement.php">
                                <span><i class="fas fa-calendar-day"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../eleveOffre.php">
                                <span><i class="fas fa-briefcase"></i></span>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="eleveForum.php">
                                <span><i class="fas fa-comments"></i></span>
                            </a>
                        </li>
                    </ul>
                    <?php
                }
                if ($_SESSION['fonction'] == 'professeur'){ ?>
                    <ul class="navbar-nav flex-row d-none d-md-flex">
                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../annuaireMedecin.php">
                                <span><i class="fas fa-graduation-cap"></i></span>
                            </a>
                        </li>

                        <li class="nav-item me-3 me-lg-1 active">
                            <a class="nav-link" href="../creationEvenement.php">
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
                        <a class="nav-link d-sm-flex align-items-sm-center" href="../auth/profiles.php">
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
        <div class="page-container">
            <div class="content">
                <?php
                $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                $requete = $bdd->prepare("SELECT * FROM post WHERE id = :id");
                $requete->execute(array('id' => $_GET['postid']));
                $post = $requete->fetch();
                ?>
                <h1><?php echo $post['titre'] ?></h1>
                <h5>Ecris par <?php echo $_SESSION['prenom']?></h5>
                <p><?php echo $post['contenu'] ?></p>
                <div class="comments-section">
                    <h2>Ecrire un commentaire</h2>
                    <form class="comment-form" action="/HSP/src/controller/traitCommentaire.php" method="post" >
                        <textarea name="commentaire" rows="4" placeholder="Écrivez votre commentaire ici..."></textarea>
                        <input type="hidden" name="post" value="<?php echo $_GET['postid'] ?>">
                        <button type="submit" name="submit" class="btn btn-primary" data-mdb-ripple-init>Publier</button>
                    </form>
                    <div class="faute">
                        <?php
                        $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($fullurl, "post=vide") !== false) {
                            echo "<p class='text-warning'>Vous n'avez pas rempli le champs !</p>";
                        }
                        elseif (strpos($fullurl, "post=reussi") !== false) {
                            echo "<p class='text-success'>Commentaire publier !</p>";
                        }
                        ?>
                    </div>
                    <!--Afficher les comms du post-->
                    <div class="existing-comments">
                        <h3>Commentaires</h3>

                        <?php
                        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
                        $requete = $bdd->prepare("SELECT * FROM reponse WHERE ref_post =:post");
                        $requete->execute(array('post' => $_GET['postid']));
                        ?>

                        <?php
                        while ($comment = $requete->fetch()) {
                            $user = $bdd->prepare("SELECT prenom FROM utilisateur WHERE id = :id");
                            $user->execute(array('id' => $comment['ref_utilisateur']));
                            $user = $user->fetch();
                            ?>
                        <div class="comment">
                            <p><strong>De <?php echo $user['prenom']?> : </strong> <?php echo $comment['contenu'] ?></p>
                        </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>

    </footer>
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
