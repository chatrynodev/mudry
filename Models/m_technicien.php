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
}
