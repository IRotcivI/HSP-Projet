<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Evenement.php'; // Assuming you have an Evenement model

    // Check for empty fields
    if (empty($_POST['titre']) || empty($_POST['description']) || empty($_POST['rue']) || empty($_POST['ville']) || empty($_POST['cp']) || empty($_POST['nb_place'])| empty($_POST['hopital'])) {
        header("Location:/HSP/vue/creationEvenement.php?creation=vide");
        exit();
    } else {
        // Validate postal code (assuming it's numeric)
        if (!is_numeric($_POST['cp'])) {
            header("Location:/HSP/vue/creationEvenement.php?creation=cpinvalide");
            exit();
        }

        // Validate number of places
        if (!is_numeric($_POST['nb_place'])) {
            header("Location:/HSP/vue/creationEvenement.php?creation=nbplaceinvalide");
            exit();
        }

        $event = new Evenement([
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'rue' => $_POST['rue'],
            'ville' => $_POST['ville'],
            'cp' => $_POST['cp'],
            'place' => $_POST['nb_place'],
            'hopital' => $_POST['hopital'],
        ]);
        $event->Creation();
        // Destinataire de l'email
        $receveur = $_POST['email'];

        // Charger l'autoloader de Composer pour PHPMailer
        require 'C:\Users\FAYE Victor\Desktop\Programation\HSP-Projet\HSP\vendor\autoload.php';

        // Créer une instance de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuration de PHPMailer
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Activer le débogage SMTP
            $mail->isSMTP();                        // Envoi via SMTP
            $mail->Host = 'smtp.gmail.com';          // Serveur SMTP
            $mail->SMTPAuth = true;                  // Authentification SMTP
            $mail->Username = 'phpmailprs@gmail.com';// Utilisateur SMTP
            $mail->Password = 'your_password';       // Mot de passe SMTP (utilisez des variables d'environnement pour plus de sécurité)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Méthode de chiffrement
            $mail->Port = 465;                      // Port pour SSL

            // Destinataires
            $mail->setFrom('phpmailprs@gmail.com', 'HSP');
            $mail->addAddress($receveur, 'Client');
            $mail->addReplyTo('phpmailprs@gmail.com', 'Réponse Client');

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation evenement';'Nous vous confirmons la creation '
            $mail->Body    = 'Voici le lien pour réinitialiser votre mot de passe HSP: <a href="' . $lien . '">' . $lien . '</a>';
            $mail->AltBody = 'Voici le lien pour réinitialiser votre mot de passe HSP: ' . $lien;

            // Envoyer l'email
            $mail->send();

            // Redirection en cas de succès
            $mail->send();
        header("Location:/HSP/vue//creationEvenement.php?reset=success");
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur de l'expéditeur : {$mail->ErrorInfo}";
        }
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
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/mdb.min.css" />
        <link rel="stylesheet" href="../assets/css/all.css">
        <link rel="stylesheet" href="../assets/css/profiles.css">
        <link rel="stylesheet" href="../assets/css/evenement.css">
    </head>
    <body>

    <header>
        <!-- Code de la barre de navigation -->
    </header>

    <main>
        <div class="box">
            <!-- Formulaire pour demander la réinitialisation du mot de passe -->
            <form style="width: 300px;" method="post" action="">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="email" class="form-control" name="email" required />
                    <label class="form-label" for="email">Email</label>
                </div>
                <button data-mdb-ripple-init type="submit" name="submit-reset" class="btn btn-primary btn-block mb-4">Réinitialiser le mot de passe</button>
            </form>
        </div>
    </main>

    <footer></footer>
    <script type="text/javascript" src="../assets/js/mdb.umd.min.js"></script>
    </body>
    </html>

    <?php
}
?>
