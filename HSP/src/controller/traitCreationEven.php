<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Evenement.php'; // Assuming you have an Evenement model

    // Check for empty fields
    if (empty($_POST['titre']) || empty($_POST['description']) || empty($_POST['rue']) || empty($_POST['ville']) || empty($_POST['cp']) || empty($_POST['nb_place'])| empty($_POST['hopital'])) {
        header("Location:/HSP/vue/creationEvenement.php?creation=vide");
        exit();
    } else {
        // Validate postal code (assuming it's numeric)
        if (!is_numeric($_POST['cp'])) {
            header("Location:/HSP/vue/creationEvenement.php?creation=cpinvalide");
            exit();
        }

        // Validate number of places
        if (!is_numeric($_POST['nb_place'])) {
            header("Location:/HSP/vue/creationEvenement.php?creation=nbplaceinvalide");
            exit();
        }

        $event = new Evenement([
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'rue' => $_POST['rue'],
            'ville' => $_POST['ville'],
            'cp' => $_POST['cp'],
            'place' => $_POST['nb_place'],
            'hopital' => $_POST['hopital'],
        ]);

        $event->Creation();

        // Redirect after successful creation
        header("Location:/HSP/vue/creationEvenement.php?creation=success");
        exit();
    }
}