<?php
session_start();
if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';

    if ($_POST['nom'] == $_SESSION['nom'] && $_POST['prenom'] == $_SESSION['prenom'] && $_POST['email'] == $_SESSION['email']) {
        header("Location:/HSP/vue/auth/profiles.php?profiles=ras");
        exit();
    }
    else {
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['nom']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['prenom'])) {
            header("Location:/HSP/vue/auth/profiles.php?profiles=caractere");
            exit();
        }
        else{
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                header("Location:/HSP/vue/auth/profiles.php?profiles=emailinvalide");
                exit();
            }
            else {
                $ins = new Utilisateur([
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'email' => $_POST['email'],
                    'id' => $_POST['id']
                ]);

                $ins->Modifier();
            }
        }

    }
}
else {
    header("Location:/HSP/vue/auth/profiles.php?profiles=erreur");
    exit();
}
