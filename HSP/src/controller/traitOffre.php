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
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
        <!-- MDB -->
        <link rel="stylesheet" href="../assets/css/mdb.min.css" />
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
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <ul class="navbar-nav flex-row d-none d-md-flex">
                    <li class="nav-item me-3 me-lg-1 active">
                        <a class="nav-link" href="database.php">
                            <span><i class="fas fa-book-open"></i></span>
                        </a>
                    </li>
                </ul>
                <!-- Center elements -->

                <!-- Right elements -->
                <ul class="navbar-nav flex-row">
                    <li>
                        <?php
                        if ($_SESSION['fonction'] == 'professeur') { ?>
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
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
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
                <th>Type de contrat</th>
                <th>Titre</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');
            $requete = $bdd->prepare("SELECT * FROM offre_emploi WHERE fonction = 'professeur'");
            $requete->execute();
            $aff = $requete->fetchAll();

            foreach ($aff as $ligne) {
                ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                    alt=""
                                    style="width: 45px; height: 45px"
                                    class="rounded-circle"
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1"><?php echo htmlspecialchars($ligne['nom']) . ' ' . htmlspecialchars($ligne['prenom']); ?></p>
                                <p class="text-muted mb-0"><?php echo htmlspecialchars($ligne['email']); ?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1"><?php echo htmlspecialchars($ligne['fonction']); ?></p>
                    </td>
                    <td>
                        <span class="badge badge-primary rounded-pill d-inline"
                        >Medecin</span
                    </td>
                    <td>
                        <button type="button" class="btn btn-link btn-sm btn-rounded" disabled>
                            <?php echo htmlspecialchars($ligne['email']); ?>
                        </button>
                    </td>
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