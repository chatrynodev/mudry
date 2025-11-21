<?php

class ParlerModel {

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function insertParler($idEmployer,$idLangue){
        try{
            $idEmployer=(int)$idEmployer;
            $idLangue=(int)$idLangue;

            $sql="INSERT INTO parler (id_Employer,id_Langue) VALUES (?,?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idEmployer,$idLangue]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function deleteParler($idEmployer,$idLangue){
        try{
            $idEmployer=(int)$idEmployer;
            $idLangue=(int)$idLangue;

            $sql="DELETE FROM parler WHERE id_Employer=? AND id_Langue=?";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idEmployer,$idLangue]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
