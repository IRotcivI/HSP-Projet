<?php

class Offre{
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    public function __construct(array $donnee){
        $this->hydrate($donnee);
    }
    public function hydrate(array $donnee){
        foreach ($donnee as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function getMail()
    {
        return $this->mail;
    }
    public function getMdp()
    {
        return $this->mdp;
    }



    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setMail($mail)
    {
        $this->mail = $mail;
    }


    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }



    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function inscription(){
        $bdd = new PDO('mysql:host=localhost;dbname=crud_objet;charset=utf8', 'root', '');
        $req = $bdd->prepare('SELECT * FROM user WHERE mail = :mail AND  mdp=:mdp');
        $req->execute(array(
            'mail' => $this->mail,
            'mdp' => $this->mdp
        ));
        if ($req ->rowCount()>0){
            echo "Mail utilisé";
            ?> <a href="inscriptionn.html"><button>Inscription</button></a> <?php
        } else{

            $res = $req->fetchAll();
            $req = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom,mail, mdp) VALUES(:nom, :prenom,  :mail, :mdp)');
            $req->execute(array(
                'nom' => $this->nom,
                'prenom'=>$this->prenom,
                'mail'=>$this->mail,
                'mdp'=>$this->mdp
            ));
        }
        header("Location: Afficher.html");
    }
    public function connection(){
        $bdd = new PDO('mysql:host=localhost;dbname=crud_objet;charset=utf8', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = mail and mdp=:mdp');
        $req->execute(array(
            'mail' => $this->getMail(),
            'mdp' => $this->getMdp()
        ));
        if ($req->rowCount() > 0) {
            header("Location:menu.html");
        } else {
            echo "mot de passe incorrect";
            ?>
            <br>
            <a href="Connexion.html">
                <button>Connection</button>
            </a>
            <?php
        }
    }
    public function modifier($mail){
        $bdd = new PDO('mysql:host=localhost;dbname=crud_objet;charset=utf8', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = :mail');
        $req->execute(array(
            'mail' =>$mail
        ));
        $donnee=$req->fetchAll();
        if ($donnee){
            $modif= $bdd->prepare("UPDATE utiisateurs SET nom =:nom and prenom=:p and mail = :e and mdp = :mdp WHERE mail=:em");
            $modif->execute(array(
                'nom'=>$this->nom,
                'p'=>$this->prenom,
                'e'=>$this->mail,
                'mdp'=>$this->mdp
            ));
        }else{
            header('Location:Modifier.html');
        }
    }
    public function supprimer($mail){
        $bdd = new PDO('mysql:host=localhost;dbname=crud_objet;charset=utf8', 'root', '');
        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = :mail');
        $req->execute(array(
            'mail' => $this->mail
        ));
        $donnee = $req->fetchAll();
        if ($donnee) {
            $sup = $bdd->prepare("DELETE FROM utilisateurs WHERE mail= :mail");
            $sup->execute(array(
                'mail' => $this->mail
            ));
        }else{
            header('Location:Supr.html');
        }
    }







}

