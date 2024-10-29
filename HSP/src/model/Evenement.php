<?php

class Evenement {
    private $id;
    private $titre;
    private $description;
    private $rue;
    private $ville;
    private $cp;
    private $type;

    /**
     * @param $id
     * @param $titre
     * @param $description
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $type
     */
    public function __construct($id, $titre, $description, $rue, $cp, $ville, $type)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->rue = $rue;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->type = $type;
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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue): void
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
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
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    public function Creation ()
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd -> getBdd() -> prepare ("INSERT INTO fiche_evenement (titre,description,rue,ville,cp,type) VALUES (:titre,:description,:rue,:ville,:cp,:type)");
        $req -> execute(array(
            'titre'=>$this->getTitre(),
            'description'=>$this->getDescription(),
            'rue'=>$this->getRue(),
            'cp'=>$this->getCp(),
            'type'=>$this->getType(),
        ));

    }


}