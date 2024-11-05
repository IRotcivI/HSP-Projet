<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Offre.php';

    if (empty($_POST['id']) || empty($_POST['offre'])){
        header("Location:/HSP/vue/eleveEvenement.php?event=error");
        exit();
    }
    else{
        if ($_POST['submit'] == "postuler") {
            $offre = new Offre([
                'id'=>$_POST['id'],
                'idOffre'=>$_POST['offre']
            ]);

            $offre->Candidater();
        }
        else if ($_POST['submit'] == "annuler") {
            $offre = new Offre([
                'id'=>$_POST['id'],
                'idOffre'=>$_POST['offre']
            ]);

            $offre->AnnulerCandidater();
        }
    }
}
else {
    header("Location:/HSP/index.php");
    exit();
}