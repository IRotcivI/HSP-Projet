<?php
if (isset($_POST["submit"])) {
    session_start();
    include '../database/Bdd.php';
    include '../model/Forum.php';

    if (empty($_POST['titre']) || empty($_POST['categorie']) || empty($_POST['description'])) {
        header("Location:/HSP/vue/forum/createPost.php?post=vide");
        exit();
    }
    else{
        $forum = new Forum([
            "titre" => $_POST['titre'],
            "contenu" => $_POST['description'],
            "categorie" => $_POST['categorie'],
            "idUser"=>$_SESSION['id']
        ]);

        $forum->createPost();
    }
}