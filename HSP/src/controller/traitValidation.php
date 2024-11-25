<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';

    $validation = new Utilisateur([
        'id'=>$_POST['id'],
        'selector'=>$_POST['submit'],
        'email'=>$_POST['email'],
    ]);

    $validation->updateInscription();

}
else {
    header("Location:/HSP/index.php");
    exit();
}
