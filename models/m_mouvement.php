<?php
class MouvementModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function getAllMouvements()
    {
        $sql = "SELECT * FROM mouvement";
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUnMouvement($num_Mouv)
    {
        $sql = "SELECT * FROM mouvement WHERE num_Mouv = ?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$num_Mouv]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function ajouterMouvement($num_Vol, $distance, $nbPassager, $dateDep, $dateArr, $duree, $idAvion, $idArrivee, $idDepart)
    {
        $sql = "INSERT INTO mouvement (num_Vol, distance_Mouv, nb_PassagerMouv, date_Depart, date_Arrive, duree, id_Avion, id_Aeroport_Arrivee, id_Aeroport_Depart)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $req = $this->pdo->prepare($sql);
        $req->execute([$num_Vol, $distance, $nbPassager, $dateDep, $dateArr, $duree, $idAvion, $idArrivee, $idDepart]);
    }

    public function modifierMouvement($num_Mouv, $num_Vol, $distance, $nbPassager, $dateDep, $dateArr, $duree, $idAvion, $idArrivee, $idDepart)
    {
        $sql = "UPDATE mouvement 
                SET num_Vol=?, distance_Mouv=?, nb_PassagerMouv=?, date_Depart=?, date_Arrive=?, duree=?, id_Avion=?, id_Aeroport_Arrivee=?, id_Aeroport_Depart=?
                WHERE num_Mouv=?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$num_Vol, $distance, $nbPassager, $dateDep, $dateArr, $duree, $idAvion, $idArrivee, $idDepart, $num_Mouv]);
    }

    public function supprimerMouvement($num_Mouv)
    {
        $sql = "DELETE FROM mouvement WHERE num_Mouv=?";
        $req = $this->pdo->prepare($sql);
        $req->execute([$num_Mouv]);
    }
}
