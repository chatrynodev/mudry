<?php

class TechnicienModel {

    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo=$pdo;
    }

    public function insert($idEmployer,$nbHeure){
        try{
            $idEmployer=(int)$idEmployer;
            $nbHeure=(int)$nbHeure;

            $sql="INSERT INTO technicien (id_Employer,nbHeureVol_Technicien) VALUES (?,?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idEmployer,$nbHeure]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
