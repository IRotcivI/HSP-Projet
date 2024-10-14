<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['mdp2'])) {
        header("Location:/HSP/vue/auth/eleve/inscription.php?inscription=vide");
        exit();
    }
    else {
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['nom']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['prenom'])) {
            header("Location:/HSP/vue/auth/eleve/inscription.php?inscription=caractere");
            exit();
        }
        else{
            if ($_POST['mdp'] != $_POST['mdp2']) {
                header("Location:/HSP/vue/auth/eleve/inscription.php?inscription=passwordincorect");
            }
            else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    header("Location:/HSP/vue/auth/eleve/inscription.php?inscription=emailinvalide");
                    exit();
                }
                else {
                    $ins = new Utilisateur([
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'email' => $_POST['email'],
                        'mdp' => $_POST['mdp']
                    ]);

                    $ins->Inscription();
                }
            }
        }

    }
}
else {
    header("Location:/HSP/vue/auth/eleve/inscription.php?inscription=erreur");
    exit();
}
