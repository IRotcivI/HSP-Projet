<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';
    include '../vue/contact.php';

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['mdp2']) || empty($_POST['specialite'])) {
        header("Location:/HSP/vue/auth/entreprise/formRegisterEntreprise.php?inscription=vide");
        exit();
    }
    else {
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['nom']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['prenom'])) {
            header("Location:/HSP/vue/auth/entreprise/formRegisterEntreprise.php?inscription=caractere");
            exit();
        }
        else{
            if ($_POST['mdp'] != $_POST['mdp2']) {
                header("Location:/HSP/vue/auth/entreprise/formRegisterEntreprise.php?inscription=passwordincorect");
            }
            else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    header("Location:/HSP/vue/auth/entreprise/formRegisterEntreprise.php?inscription=emailinvalide");
                    exit();
                }
                else {
                    $ins = new Contact([
                        'email' => $_POST['email'],
                        'motif' => $_POST['motif'],
                        'demande' => $_POST['demande'],
                        'autre' => $_POST['autre'],
                    ]);
                    $ins->Contact();
                }
            }
        }

    }
}
else {
    header("Location:/HSP/vue/auth/eleve/formRegisterEleve.php?inscription=erreur");
    exit();
}