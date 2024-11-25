<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Hopital.php';

    if (empty($_POST['nom']) || empty($_POST['adresse']) || empty($_POST['cp']) || empty($_POST['site'])) {
        header("Location:/HSP/vue/auth/hopital.php?hop=vide");
        exit();
    }
    else{
        $hopital = new Hopital([
            "nom" => $_POST['nom'],
            "adresse" => $_POST['adresse'],
            "cp" => $_POST['cp'],
            "site" => $_POST['site'],
        ]);
    }
        $hopital->AjoutHopital();
}
else {
    header("Location:/HSP/index.php");
    exit();
}
