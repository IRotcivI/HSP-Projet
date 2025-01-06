<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['mdp2']) || empty($_POST['specialite'])  || empty($_POST['hopital'])) {
        header("Location:../../../HSP/vue/auth/professeur/formRegisterPro.php?inscription=vide");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $_POST['nom']) || !preg_match("/^[a-zA-Z ]*$/", $_POST['prenom'])) {
            header("Location:../../../HSP/vue/auth/professeur/formRegisterPro.php?inscription=caractere");
            exit();
        } else {
            if ($_POST['mdp'] != $_POST['mdp2']) {
                header("Location:../../../HSP/vue/auth/professeur/formRegisterPro.php?inscription=passwordincorect");
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    header("Location:../../../HSP/vue/auth/professeur/formRegisterPro.php?inscription=emailinvalide");
                    exit();
                } else {
                    $ins = new Utilisateur([
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'email' => $_POST['email'],
                        'mdp' => $_POST['mdp'],
                        'specialite' => $_POST['specialite'],
                        'hopital' => $_POST['hopital'],
                    ]);
                    $ins->InscriptionProf();
                }
            }
        }
    }
} else {
    header("Location:../../../HSP/vue/auth/professeur/formRegisterPro.php?inscription=erreur");
    exit();
}
