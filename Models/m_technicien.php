<?php

class TechnicienModel {

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function ajouterTechnicien($idEmployer,$nbHeure){
        try{
            $idEmployer=(int)$idEmployer;
            $nbHeure=(int)$nbHeure;

            $sql="INSERT INTO technicien (id_Employer,nbHeureVol_Technicien) VALUES (?,?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idEmployer,$nbHeure]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function getNbHeuresTechnicienById($idEmployer){
        try{
            $sql="SELECT nbHeureVol_Technicien FROM technicien WHERE id_Employer=?";
            $stmt=$this->pdo->prepare($sql);
            $result = $stmt->execute([$idEmployer]);
            $data = $stmt->fetch();
            return $data['nbHeureVol_Technicien'];

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
