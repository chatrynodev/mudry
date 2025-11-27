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

    public function supprimerParlerByCommercialId($idEmployer){
        try{
            $idEmployer=(int)$idEmployer;

            $sql="DELETE FROM parler WHERE id_Employer=?";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idEmployer]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function getLanguesByCommercialId($idEmployer){
        try{
            $sql="SELECT id_Langue FROM parler WHERE id_Employer=?";
            $stmt=$this->pdo->prepare($sql);
            $result = $stmt->execute([$idEmployer]);
            $data = $stmt->fetchAll();
            $langues = [];
            foreach ($data as $row) {
                $langues[] = $row['id_Langue'];
            }
            return $langues;

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
