<?php
if (isset($_POST['submit'])) {
    session_start();
    include '../database/Bdd.php';
    include '../model/Forum.php';

    if (empty($_POST['commentaire'])) {
        header("Location: /HSP/vue/forum/post.php?postid=" .$_POST['post']."&post=vide");
        exit();
    }
    else{
        $commentaire = htmlspecialchars($_POST['commentaire']);
        $com = new Forum([
            'contenu'=>$commentaire,
            'idUser'=>$_SESSION['id'],
            'idForum'=>$_POST['post']
        ]);
        $com->publierCommentaire();
    }
}
else{
    header("Location:/HSP/index.php");
    exit();
}