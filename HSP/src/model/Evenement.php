<?php

class Evenement {
    private $id;
    private $eventId;
    private $titre;
    private $description;
    private $rue;
    private $ville;
    private $cp;
    private $type;

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
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param mixed $eventId
     */
    public function setEventId($eventId): void
    {
        $this->eventId = $eventId;
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

    public function Participation()
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd->getBdd()->prepare("SELECT nb_place FROM fiche_evenement WHERE id = :id");
        $req -> execute(array(
            'id'=>$this->getEventId(),
        ));
        $resultat = $req -> fetch();

        if ($resultat['nb_place'] != 0){
            $event = $bdd->getBdd()->prepare("INSERT INTO fich_eve_utilisateur (ref_utilisateur, ref_fiche_evenement) VALUES (:ref_utilisateur, :ref_fiche_evenement)");
            $event -> execute(array(
                'ref_utilisateur'=>$this->getId(),
                'ref_fiche_evenement'=>$this->getEventId()
            ));

            $place = $bdd->getBdd()->prepare("UPDATE fiche_evenement SET nb_place = nb_place - 1 WHERE id = :id");
            $place -> execute(array(
                'id'=>$this->getEventId()
            ));

            header("Location:/HSP/vue/eleveEvenement?");
            exit();

        }
        else{
            header("Location:/HSP/vue/eleveEvenement?event=place");
            exit();
        }
    }








    public function AnnulerParticipation()
    {
        $bdd = new \BaseDeDonne();
        $annuler = $bdd->getBdd()->prepare("DELETE FROM fich_eve_utilisateur WHERE ref_utilisateur = :id AND ref_fiche_evenement = :event");
        $annuler -> execute(array(
            'id'=>$this->getId(),
            'event'=>$this->getEventId()
        ));

        $maj = $bdd->getBdd()->prepare("UPDATE fiche_evenement SET nb_place = nb_place + 1 WHERE id = :id");
        $maj -> execute(array(
            'id'=>$this->getEventId()
        ));

        header("Location:/HSP/vue/eleveEvenement?");
        exit();

    }


}