<?php
session_start();

// Vérifier si la session est vide (c'est-à-dire que l'utilisateur n'est pas connecté)
if (empty($_SESSION)) {
    header('Location: /HSP/index.php');
    exit();
} else {

    // Traitement de la réinitialisation du mot de passe
    if (isset($_POST["submit-reset"])) {
        // Inclure les fichiers nécessaires
        include '../database/Bdd.php';
        include '../model/Utilisateur.php';

        // Génération du token de réinitialisation
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        // Lien de réinitialisation
        $lien = "http://hsp-project/HSP/vue/auth/nouveauMotDePasse.php?selector=" . $selector . "&validator=" . bin2hex($token);

        // Expiration du token dans 30 minutes
        $temps = date("U") + 1800;

        // Insérer les données du token dans la base de données
        $ins = new Utilisateur([
            'email' => $_POST['email'],
            'token' => $token,
            'selector' => $selector,
            'temps' => $temps
        ]);
        $ins->PasswordTokenDel(); // Supprimer un éventuel ancien token
        $ins->PasswordTokenIns(); // Insérer le nouveau token

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
            $mail->Subject = 'Réinitialiser votre mot de passe HSP';
            $mail->Body    = 'Voici le lien pour réinitialiser votre mot de passe HSP: <a href="' . $lien . '">' . $lien . '</a>';
            $mail->AltBody = 'Voici le lien pour réinitialiser votre mot de passe HSP: ' . $lien;

            // Envoyer l'email
            $mail->send();

            // Redirection en cas de succès
            header("Location:/HSP/vue/auth/motDePasse.php?reset=success");
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
