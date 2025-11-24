<?php

require_once dirname(__DIR__) . '/Models/class.pdoMudry.inc.php';

class AvionModel
{
    private $pdo;

    public function __construct()
    {
        // ✔ On récupère l’instance — puis la connexion PDO
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function getAllAvions()
    {
        $sql = "SELECT * FROM avion ORDER BY id_Avion ASC";
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvionById($id)
    {
        $sql = "SELECT * FROM avion WHERE id_Avion = ?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function creerAvion($id_Avion, $numSerie_Avion, $codeInterne_Avion, $id_Modele) {
        $sql = 'INSERT INTO avion (id_Avion, numSerie_Avion, codeInterne_Avion, id_Modele)
                VALUES (:id_Avion, :numSerie, :codeInterne, :id_Modele)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_Avion' => $id_Avion,
            ':numSerie' => $numSerie_Avion,
            ':codeInterne' => $codeInterne_Avion,
            ':id_Modele' => $id_Modele
        ]);
    }

    public function modifierAvion($id_Avion, $numSerie_Avion, $codeInterne_Avion, $id_Modele) {
        $sql = 'UPDATE avion
                SET numSerie_Avion = :numSerie_Avion,
                    codeInterne_Avion = :codeInterne_Avion,
                    id_Modele = :id_Modele
                WHERE id_Avion = :id_Avion';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':numSerie_Avion' => $numSerie_Avion,
            ':codeInterne_Avion' => $codeInterne_Avion,
            ':id_Modele' => $id_Modele,
            ':id_Avion' => $id_Avion
        ]);
    }
}
