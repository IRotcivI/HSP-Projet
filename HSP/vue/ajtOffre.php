<?php
session_start();


if (!isset($_SESSION['fonction']) || $_SESSION['fonction'] !== 'professeur') {

    header('Location: /HSP/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>HSP Project</title>
    <link rel="icon" href="/HSP/assets/img/freepik-export-202410281551095LzP.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts OSWALD -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="../assets/css/mdb.min.css" />
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/profiles.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <div class="d-flex">
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="menu.php">
                    <img src="/HSP/assets/img/freepik-export-202410281551095LzP.ico" height="20" alt="Logo HSP" loading="lazy" style="margin-top: 2px;" />
                </a>
            </div>
            <ul class="navbar-nav flex-row d-none d-md-flex">
                <?php if ($_SESSION['fonction'] == 'eleve') { ?>
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="database.php">
                        <span><i class="fas fa-book-open"></i></span>
                    </a>
                </li>
                <?php } elseif ($_SESSION['fonction'] == 'professeur') { ?>
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="annuaireMedecin.php">
                        <span><i class="fas fa-graduation-cap"></i></span>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="offre.php">
                        <span><i class="fas fa-briefcase"></i> Offre</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav flex-row">
                <li>
                    <button type="button" class="btn <?php echo ($_SESSION['fonction'] == 'eleve') ? 'btn-success' : 'btn-info'; ?>" data-mdb-ripple-init disabled>
                        <?php echo $_SESSION['fonction']; ?>
                    </button>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="auth/profiles.php">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp" class="rounded-circle" height="22" alt="Avatar" loading="lazy" />
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
                        <li><a class="dropdown-item" href="/HSP/src/controller/traitMenu.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <link href="/HSP/assets/css/ajtOffre.css" rel="stylesheet">
    <form action="../src/controller/traitEleveOffre.php" method="POST">
        <div class="form-row">
            <div class="input-data">
                <input type="text" name="titre" required>
                <div class="underline"></div>
                <label>Titre</label>
            </div>
            <div class="input-data">
                <textarea name="description" rows="4" required></textarea>
                <div class="underline"></div>
                <label>Description</label>
            </div>
            <div class="input-data">
                <input type="text" name="taches" required>
                <div class="underline"></div>
                <label>Tâches</label>
            </div>
            <div class="input-data">
                <input type="date" name="date" required>
                <div class="underline"></div>
                <label>Date</label>
            </div>
            <div class="input-data">
                <input type="number" name="salaire" required>
                <div class="underline"></div>
                <label>Salaire</label>
            </div>
            <div class="input-data">
                <select name="type" id="type" required>
                    <option value="">Type d'offre</option>
                    <option value="CDI">CDI</option>
                    <option value="Stage">Stage</option>
                    <option value="Alternance">Alternance</option>
                </select>
            </div>
        </div>
        <div class="form-row submit-btn">
            <input type="submit" value="Valider">
        </div>
    </form>
</main>
</body>
</html>
