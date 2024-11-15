<?php
class Forum{
    private $idForum;
    private $idUser;
    private $titre;
    private $contenu;
    private $categorie;
    private $reponse;

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
    public function getIdForum()
    {
        return $this->idForum;
    }

    /**
     * @param mixed $idForum
     */
    public function setIdForum($idForum): void
    {
        $this->idForum = $idForum;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * @param mixed $reponse
     */
    public function setReponse($reponse): void
    {
        $this->reponse = $reponse;
    }

    public function createPost()
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd -> getBdd() -> prepare ("INSERT INTO post (titre,categorie,contenu,ref_utilisateur ) VALUES (:titre,:categorie,:contenu,:ref_utlisateur)");
        $req -> execute(array(
            'titre' => $this -> getTitre(),
            'categorie' => $this -> getCategorie(),
            'contenu' => $this -> getContenu(),
            'ref_utlisateur' => $this -> getIdUser()
        ));

        header("Location:/HSP/vue/forum/createPost.php?post=reussi");
        exit();
    }

    public function publierCommentaire ()
    {
        $bdd = new \BaseDeDonne();
        $req = $bdd -> getBdd() -> prepare ("INSERT INTO reponse (contenu,ref_post,ref_utilisateur ) VALUES (:contenu,:ref_post,:ref_utilisateur)");
        $req -> execute(array(
            'contenu' => $this -> getContenu(),
            'ref_post' => $this -> getIdForum(),
            'ref_utilisateur' => $this -> getIdUser()
        ));
        header("Location: /HSP/vue/forum/post.php?postid=" . $this->getIdForum() . "&post=reussi");
        exit();
    }

}