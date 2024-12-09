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
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <link rel="stylesheet" href="../../../assets/css/form.css">
    <title>Form</title>
</head>
<body>
<div class="wrapper">
    <main>
        <!----------------------- Main Container --------------------------->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!----------------------- Registration Container --------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                     style="background: #4CAF50;">
                    <div class="featured-image mb-3">
                        <img src="/HSP/assets/img/writer-svgrepo-com.svg" class="img-fluid"
                             style="width: 200px; align-content: center" alt="">
                    </div>
                    <p class="text-white fs-2" style=" font-weight: 600;">Contactez-vous</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;">
                        Si vous avez besoin d'aide, nous proposons plusieurs options de service client. </small>
                </div>
                <!----------------------------- Right Box ----------------------------->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Formulaire de contact</h2>
                            <p>Contactez nous</p>
                        </div>
                        <form method="post" action="/HSP/src/controller/traitContact.php"
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control form-control-lg bg-light fs-6"
                                       placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="motif" class="form-control form-control-lg bg-light fs-6"
                                       placeholder="Motif">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="demande" class="form-control form-control-lg bg-light fs-6"
                                       placeholder="Demande">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="autre" class="form-control form-control-lg bg-light fs-6"
                                       placeholder="Autre">
                            </div>

                            <div class="input-group mb-3">
                                <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                        <div class="faute">

                        </div>
                        <div class="row">
                            <small>Avez vous un compte? <a
                                    href="/HSP/vue/auth/formLogin.php">Connectez-vous</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="footer-col">

                </div>
            </div>
        </div>
    </footer>
</div>
<!--Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
