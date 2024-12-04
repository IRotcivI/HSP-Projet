<?php
class Contact {

    private $email;
    private $motif;
    private $demande;
    private $autre;
    public function __construct($email) {
        $this->email = $email;
        $this->motif = $motif;
        $this->demande = $demande;
        $this->autre = $autre;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * @param mixed $motif
     */
    public function setMotif($motif): void
    {
        $this->motif = $motif;
    }

    /**
     * @return mixed
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * @param mixed $demande
     */
    public function setDemande($demande): void
    {
        $this->demande = $demande;
    }

    /**
     * @return mixed
     */
    public function getAutre()
    {
        return $this->autre;
    }

    /**
     * @param mixed $autre
     */
    public function setAutre($autre): void
    {
        $this->autre = $autre;
    }

    public function Contact()
    {

        $bdd = new \BaseDeDonne();
        $req = $bdd->getBdd()->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $req->execute(array(
            "email" => $this->getEmail()
        ));
        if ($req->rowCount() > 0) {
            header('location:/HSP/vue/auth/eleve/formRegisterEleve.php?erreur=1');
            exit();

        } else {
            $bdd = new \BaseDeDonne();
            $req = $bdd->getBdd()->prepare("INSERT INTO contact (email,motif,demande,autre) VALUES (:email,:motif,:demande,:autre)");
            $req->execute(array(
                'email' => $this->getEmail(),
                'motif' => $this->getMotif(),
                'demande' => $this->getDemande(),
                'autre' => $this->getAutre(),
            ));
            header("msgEn.html");
            exit();
        }
    }

    public function ContactEffectuer(): void
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd->getBdd()->prepare("SELECT * FROM contact WHERE email = :email");
        $req->execute(array(
            'email' => $this->getEmail()
        ));
    }


}