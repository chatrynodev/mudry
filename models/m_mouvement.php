<?php

class MouvementModel {

    private $pdo;

    public function __construct()
    {
        // ✔ On récupère l’instance — puis la connexion PDO
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    private function cleanString($v){
        return htmlspecialchars(trim($v),ENT_QUOTES,'UTF-8');
    }

    public function getAllMouvements(){
        try{
            $sql="SELECT * FROM mouvement ORDER BY date_Depart DESC";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
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
