<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';

    if (empty($_POST['email']) || empty($_POST['mdp'])) {
        header("Location:/HSP/vue/auth/connection.php?connection=vide");
        exit();
    }
    else{
        $ins = new Utilisateur([
            'email' => $_POST['email'],
            'mdp' => $_POST['mdp']
        ]);

        $ins->Connexion();
    }
}
else {
    header("Location:/HSP/vue/auth/connection.php?connection=erreur");
    exit();
}

