<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/nav.css">
    <link rel="stylesheet" href="../../assets/css/form.css">
    <title>Form</title>
</head>
<body>
<header>

</header>
<main>
    <section class="background-section">
        <!----------------------- Main Container -------------------------->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!----------------------- Login Container -------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4A90E2;">
                    <div class="featured-image mb-3">
                        <img src="/HSP/assets/img/rb_2147795907.png" class="img-fluid" style="width: 250px;">
                    </div>
                    <p class="text-white fs-2" style=" font-weight: 600;">Pour être vérifié</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;">Rejoignez ces medecins et etudiants sur cette plateforme.</small>
                </div>
                <!-------------------- ------ Right Box ---------------------------->

                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <form method="post" action="../../src/controller/traitConnexion.php">
                            <div class="header-text mb-4">
                                <h2>Bonjour</h2>
                                <p>Nous sommes heureux de vous revoir</p>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Adresse e-mail">
                            </div>
                            <div class="input-group mb-1">
                                <input type="password" name="mdp" class="form-control form-control-lg bg-light fs-6" placeholder="Mot de passe">
                            </div>
                            <div class="input-group mb-5 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="formCheck">
                                    <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                                </div>
                                <div class="forgot">
                                    <small><a href="motDePasse.php">Mot de passe oublié ?</a></small>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">Connexion</button>
                            </div>
                            <div class="input-group mb-5 d-flex justify-content-between">
                                <small>Pas de compte ? <a href="/HSP/index.php">Inscrivez-vous</a></small>
                            </div>
                        </form>
                        <div class="faute">
                            <?php
                            $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                            if (strpos($fullurl, "connection=vide") !== false) {
                                echo "<p class='text-danger'>Vous n'avez pas rempli les champs !</p>";
                            }
                            elseif (strpos($fullurl, "connection=nouser") !== false) {
                                echo "<p class='text-danger'>Aucun utilisateur (Veullez créer un compte) !</p>";
                            }
                            elseif (strpos($fullurl, "connection=emailinvalide") !== false) {
                                echo "<p class='text-danger'>Le format de l'email est invalide !</p>";
                            }
                            elseif (strpos($fullurl, "connection=passwordincorect") !== false) {
                                echo "<p class='text-danger'>Mot de passe ou email incorrect !</p>";
                            }
                            elseif (strpos($fullurl, "pwd=updated") !== false) {
                                echo "<p class='text-success'>Mot de passe mise a jour !</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <div class="container text-center">
            <p>&copy; 2024 Hôpital Sud Paris (HSP). Tous droits réservés.</p>
        </div>
    </section>
</main>
<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
