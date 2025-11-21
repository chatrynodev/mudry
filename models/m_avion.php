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

    public function getUnAvion($id)
    {
        $sql = "SELECT * FROM avion WHERE id_Avion = ?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
