<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>HSP Project</title>
    <!-- HSP icon -->
    <link rel="icon" href="/HSP/assets/img/freepik-export-202410281551095LzP.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="assets/css/mdb.min.css" />
      <link rel="stylesheet" href="assets/css/index.css">
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
            <img
              src="/HSP/assets/img/freepik-export-202410281551095LzP.ico"
              height="16"
              alt="HSP Logo"
              loading="lazy"
              style="margin-top: -1px;"
            />
          </a>

          <!-- Toggle button -->
          <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>

          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/HSP/index.php">HSP</a>
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
                <div class="dropdown">
                    <a
                            class="btn btn-primary dropdown-toggle"
                            href="#"
                            role="button"
                            id="dropdownMenuLink"
                            data-mdb-dropdown-init
                            data-mdb-ripple-init
                            aria-expanded="false"
                    >
                        Inscription
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/HSP/vue/auth/eleve/inscription.php">Eleve</a></li>
                        <li><a class="dropdown-item" href="/HSP/vue/auth/professeur/inscriptionProf.php">Professeur</a></li>
                    </ul>
                </div>
            </div>
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->
    </header>
    <main>
        <div class="bg-image ">
            <img src="/HSP/assets/img/imagehopital.jpg" height="100"  class="img-fluid" alt="Wild Landscape"/>
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class = "d-flex justify-content-around align-top">
                    <h1>Bienvenue sur HSP</h1>
                </div>
                <br><br>
                <div class="d-flex justify-content-center align-text-top h-100">
                    <h4><p>Créée en 1954, La Générale des hôpitaux (GDH), dont le siège est situé à Paris,</p>
                        <p>est le premier groupe de cliniques et hôpitaux privés en France.<p> Fort de 70 années d'expérience, GDH a su tirer profit du développement des dernières technologies médicales<p> afin d'offrir aux patients des prestations couvrant une large variété de spécialités.</h4>

                </div>

            </div>
        </div>
        <br></br>
        <div class = "d-flex justify-content-around align-top">
        <h3>Retrouvez-nous près de chez vous</h3>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d70687.3324966235!2d2.2816912889486605!3d48.8213262263974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHopital%20Paris%20Sud!5e0!3m2!1sfr!2sfr!4v1730123417147!5m2!1sfr!2sfr" align="left"  width="1265" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </main>

    <footer></footer>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="assets/js/mdb.umd.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>

</html>
