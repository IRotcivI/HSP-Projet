<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Mot de passe oublié</title>
    <!-- HSP icon -->
    <link rel="icon" href="/HSP/assets/img/toolbox_container_repair_box_tool_box_toolboxes_icon_189312.ico"
          type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="/HSP/assets/css/mdb.min.css" />
    <link rel="stylesheet" href="/HSP/assets/css/pwd.css" />
</head>

<body>
<!-- Start your project here-->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2">
                <img src="/HSP/assets/img/toolbox_container_repair_box_tool_box_toolboxes_icon_189312.ico" height="16"
                     alt="HSP Logo" loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample"
                    aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">HSP</a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <!--Lien vers la page connection-->
                    <a href="/HSP/vue/auth/connection.php">
                        <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2">
                            Connexion
                        </button>
                    </a>

                    <!--Lien vers la page inscription-->
                    <a href="/HSP/vue/auth/inscription.php">
                        <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
                            Inscription
                        </button>
                    </a>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>

<main>

    <div class="box">
        <div class="inscription-container" id="inscription">
            <h1>Réinitialiser</h1>

            <?php
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];

            if (empty($selector) || empty($validator)) {
                echo "Requete refuser !";
            }
            else{
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                    ?>

                    <form action="../../src/controller/traitNewMotDePasse.php" method="post">
                        <input type="hidden" name="selector" value="<?php echo $selector?>">
                        <input type="hidden" name="validator" value="<?php echo $validator?>">
                        <input type="password" name="mdp" placeholder="Entrer le nouveau mot de passe...">
                        <input type="password" name="mdp2" placeholder="Repeter le nouveau mot de passe...">
                        <button type="submit" name="resetmdpbutton"  class="btn btn-primary" >Valider</button>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>

</main>

<footer></footer>
<!-- End your project here-->

<!-- MDB -->
<script type="text/javascript" src="/HSP/assets/js/mdb.umd.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>

</html>
