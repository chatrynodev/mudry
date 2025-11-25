<?php

require_once dirname(__DIR__) . '/Models/class.pdoMudry.inc.php';

class ModeleModel
{
    private $pdo;

    public function __construct()
    {
        // ✔ On récupère l’instance — puis la connexion PDO
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function getAllModeles()
    {
        $sql = "SELECT * FROM modele ORDER BY id_Modele ASC";
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getModeleById($id)
    {
        $sql = "SELECT * FROM Modele WHERE id_Modele = ?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function creerModele($id_Modele, $libelle_Modele, $nbSiegeMax_Modele) {
        $sql = 'INSERT INTO modele (id_Modele, libelle_Modele, nbSiegeMax_Modele)
                VALUES (:id_Modele, :libelle, :nbSiegeMax)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_Modele' => $id_Modele,
            ':libelle' => $libelle_Modele,
            ':nbSiegeMax' => $nbSiegeMax_Modele,
        ]);
    }

    public function modifierModele($id_Modele, $libelle_Modele, $nbSiegeMax_Modele) {
        $sql = 'UPDATE modele
                SET libelle_Modele = :libelle_Modele,
                    nbSiegeMax_Modele = :nbSiegeMax_Modele,
                WHERE id_Modele = :id_Modele';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':libelle_Modele' => $libelle_Modele,
            ':nbSiegeMax_Modele' => $nbSiegeMax_Modele,
            ':id_Modele' => $id_Modele,
        ]);
    }

    public function supprimerModele($id_Modele) {
        $sql = 'DELETE FROM modele
                WHERE id_Modele = :id_Modele';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_Modele' => $id_Modele
        ]);
    }
}
