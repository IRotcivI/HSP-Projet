<?php

if (isset($_POST['resetmdpbutton'])){
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $mdp = $_POST['mdp'];
    $conf = $_POST['mdp2'];

    if (empty($selector) || empty($validator) || empty($mdp) || empty($conf)){
        header('Location:/HSP/vue/auth/nouveauMotDePasse.php?pwd=vide');
        exit();

    } else if ($mdp != $conf){
        header('Location:/HSP/vue/auth/nouveauMotDePasse.php?pwd=paslememe');
        exit();

    }

    $func = new Utilisateur([
        'selector' => $selector,
        'mdp' => $mdp,
        'confirmation' => $conf,
        'validator' => $validator,
    ]);

    $func->PasswordReset();


} else {
    header("Location:/HSP/index.php");
    exit();
}