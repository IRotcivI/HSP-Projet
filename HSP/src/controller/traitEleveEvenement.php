<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Evenement.php';

    if (empty($_POST['id']) || empty($_POST['event'])){
        header("Location:/HSP/vue/newEvent.php?event=error");
        exit();
    }
    else{
        if ($_POST['submit'] == "postuler") {
            $event = new Evenement([
                'id'=>$_POST['id'],
                'eventId'=>$_POST['event']
            ]);

            $event->Participation();
        }
        else if ($_POST['submit'] == "annuler") {
            $event = new Evenement([
                'id'=>$_POST['id'],
                'eventId'=>$_POST['event']
            ]);

            $event->AnnulerParticipation();
        }
    }

}
else {
    header("Location:/HSP/index.php");
    exit();
}
