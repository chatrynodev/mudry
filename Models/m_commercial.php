<?php

class CommercialModel {

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function insertCommercial($idEmployer){
        try{
            $idEmployer=(int)$idEmployer;

            $sql="INSERT INTO commercial (id_Employer) VALUES (?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idEmployer]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
