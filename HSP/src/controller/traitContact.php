<?php

include '../database/Bdd.php';
include '../vue/contacct.php';
include '../model/Contact.php';


if (isset($_POST['email']) && isset($_POST['motif']) && isset($_POST['demande']) && isset($_POST['autre'])) {


    $ins = new Contact([
        'email' => $_POST['email'],
        'motif' => $_POST['motif'],
        'demande' => $_POST['demande'],
        'autre' => $_POST['autre'],
    ]);


    $ins->Contact();


    header("Location:/HSP/vue/msgEn.html");
    exit();

} else {

    header("Location:/HSP/vue/contacct.php?error=missing_fields");
    exit();
}
