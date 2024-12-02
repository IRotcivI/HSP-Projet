<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <link rel="stylesheet" href="../../../assets/css/form.css">
    <title>Form</title>
</head>
<body>
<header>

</header>
<main>
    <section class="background-section">
        <!----------------------- Main Container --------------------------->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!----------------------- Registration Container --------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4CAF50;">
                    <div class="featured-image mb-3">
                        <img src="/HSP/assets/img/mechanic-svgrepo-com.svg" class="img-fluid" style="width: 200px; align-content: center">
                    </div>
                    <p class="text-white fs-2" style="font-weight: 600;">Inscrivez-vous</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;">
                        Partenaire
                    </small>
                </div>
                <!----------------------------- Right Box ----------------------------->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <form method="post" action="/HSP/src/controller/traitEntrepriseIns.php">
                            <div class="header-text mb-4">
                                <h2>Créer un compte</h2>
                                <p>Inscrivez-vous pour accéder à la plateforme</p>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="nom" class="form-control form-control-lg bg-light fs-6" placeholder="Nom">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="prenom" class="form-control form-control-lg bg-light fs-6" placeholder="Prénom">
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Adresse e-mail">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="mdp" class="form-control form-control-lg bg-light fs-6" placeholder="Mot de passe">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="mdp2" class="form-control form-control-lg bg-light fs-6" placeholder="Confirmer le mot de passe">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="specialite" class="form-control form-control-lg bg-light fs-6" placeholder="Votre poste au sein de votre entreprise">
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">S'inscrire</button>
                            </div>
                            <div class="row">
                                <small>Déjà un compte ? <a href="/HSP/vue/auth/connection.php">Connectez-vous</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">

            </div>
            <div class="footer-col">

            </div>
        </div>
    </div>
</footer>
<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
