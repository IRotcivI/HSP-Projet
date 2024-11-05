<?php

class Offre {
    private string $type;
    private string $titre;
    private string $description;
    private string $date;
    private string $tache;
    private int $salaire;


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

    public function getType() {
        return $this->type;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setDate(string $date): void {
        $this->date = $date;
    }

    public function getTache(): string {
        return $this->tache;
    }

    public function setTache(string $tache): void {
        $this->tache = $tache;
    }

    public function getSalaire(): int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): void
    {
        $this->salaire = $salaire;
    }


    public function ajouter(): void {
        try {

            $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');

            $req = $bdd->prepare('SELECT * FROM offre WHERE titre = :titre AND description = :description');
            $req->execute([
                'titre' => $this->titre,
                'description' => $this->description
            ]);

            if ($req->rowCount() > 0) {
                echo "Offre déjà existante";
                return;
            }

            $req = $bdd->prepare('INSERT INTO offre (titre , description, tache, date, salaire , type) VALUES (:titre, :description, :tache, :date, :salaire ,:type)');
            $req->execute([
                'titre' => $this->titre,
                'description' => $this->description,
                'tache' => $this->tache,
                'date' => $this->date,
                'salaire' => $this->date,
                'type' => $this->type,

            ]);//


            header("Location: Afficher.html");
            exit();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
