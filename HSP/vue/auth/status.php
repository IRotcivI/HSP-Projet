<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                     style="background: #ffc107;;">
                    <div class="featured-image mb-3">
                        <img src="../../assets/img/rb_51067.png" class="img-fluid" style="width: 250px;" alt="">
                    </div>
                    <p class="text-white fs-2" style=" font-weight: 600;">En cours</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;">Chilling...</small>
                </div>
                <!-------------------- ------ Right Box ---------------------------->

                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <form method="post" action="../../src/controller/traitConnexion.php">
                            <div class="header-text mb-4">
                                <h2>Bonjour</h2>
                                <p>Nous sommes heureux de vous revoir</p>
                                <p>
                                    Votre compte est en cours de validation.
                                </p>
                                <p>
                                    Vous receverez un mail en cas de validation de l'inscription.
                                </p>
                                <p>
                                    Merci de votre comprehension.
                                </p>
                                <p>
                                    A Bientot !
                                </p>
                        </form>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
