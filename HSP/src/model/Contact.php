<?php
class Contact {

    private $email;
    private $motif;
    private $demande;
    private $autre;
    public function __construct(array $donnee) {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnee) {
        foreach ($donnee as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
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

public function Contact() {

    $bdd = new \BaseDeDonne();

    $req = $bdd->getBdd()->prepare("INSERT INTO contact (email, motif, demande, autre) VALUES (:email, :motif, :demande, :autre)");
    $req->execute(array(
        'email' => $this->email,
        'motif' => $this->motif,
        'demande' => $this->demande,
        'autre' => $this->autre,
    ));
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