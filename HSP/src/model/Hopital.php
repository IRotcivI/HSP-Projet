<?php

Class Hopital{
    private $id;
    private $nom;
    private $adresse;
    private $cp;
    private $site;

    public function __construct( array $cmd)
    {
        $this -> hydrate ($cmd);
    }

    public function hydrate( array $cmd)
    {
        foreach ($cmd as $key => $value)
        {
            $cmd = 'set'.ucfirst($key);
            if (method_exists ($this, $cmd))
            {
                $this -> $cmd ($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site): void
    {
        $this->site = $site;
    }


    public function AjoutHopital()
    {

        $f = "eleve";

        $bdd = new \BaseDeDonne();
        $req = $bdd ->getBdd()->prepare("SELECT * FROM hopital WHERE site = :site");
        $req ->execute(array(
            "site" =>$this->getSite()
        ));
        if ($req -> rowCount() > 0){
            header("Location:/HSP/vue/auth/hopital.php?hop=site");
            exit();
        }else{
            $bdd = new \BaseDeDonne();
            $req = $bdd->getBdd()->prepare('INSERT INTO hopital (nom,rue,cp,site) VALUES (:nom,:rue,:cp,:site)');
            $req -> execute(array(
                'nom'=>$this->getNom(),
                'rue'=>$this->getAdresse(),
                'cp'=>$this->getCp(),
                'site'=>$this->getSite()
            ));
            header("Location:/HSP/vue/auth/hopital.php?hop=reussi");
        }
        exit();
    }
}