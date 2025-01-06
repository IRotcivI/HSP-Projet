<?php

if (isset($_POST['submit'])) {
    include '../database/Bdd.php';
    include '../model/Utilisateur.php';

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['mdp2']) || empty($_POST['formation'])) {
        header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=vide");
        exit();
    }
    else {
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['nom']) || !preg_match("/^[a-zA-Z ]*$/",$_POST['prenom'])) {
            header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=caractere");
            exit();
        }
        else{
            if ($_POST['mdp'] != $_POST['mdp2']) {
                header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=passwordincorect");
            }
            else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=emailinvalide");
                    exit();
                }
                else {
                    if (isset($_FILES['file'])){
                        $file = $_FILES['file']['name'];
                        $file_error = $_FILES['file']['error'];
                        $fileExt = explode('.', $file);
                        $fileActualExt = strtolower(end($fileExt));
                        $allowed = array('pdf');
                        $upload_dir = __DIR__ . '/uploads/' . $_FILES['file']['name'];

                        if (in_array($fileActualExt, $allowed)) {
                            if ($file_error === 0) {
                                move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir);
                                $ins = new Utilisateur([
                                    'nom' => $_POST['nom'],
                                    'prenom' => $_POST['prenom'],
                                    'email' => $_POST['email'],
                                    'mdp' => $_POST['mdp'],
                                    'cv' => $file,
                                    'formation' => $_POST['formation'],
                                ]);
                                $ins->inscription();
                            }
                            else{
                                header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=cvtaille");
                                exit();
                            }
                        }
                        else {
                            header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=cvinvalide");
                            exit();
                        }
                    }
                    else {
                        header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=cvvide");
                        exit();
                    }
                }
            }
        }

    }
}
else {
    header("Location:../../../HSP/vue/auth/eleve/formRegisterEleve.php?inscription=erreur");
    exit();
}
