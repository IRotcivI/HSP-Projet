<?php
if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';
    include '../model/Offre.php';

    if (empty($_POST['email']) || empty($_POST['mdp'])) {
        header("Location:/HSP/vue/auth/connection.php?connection=vide");
        exit();
    }
    else{
        $ajt = new Offre([
            'email' => $_POST['email'],
            'mdp' => $_POST['mdp']
        ]);

        $ajt->Ajouter();
    }
}
else {
    header("Location:/HSP/vue/auth/connection.php?connection=erreur");
    exit();
}
