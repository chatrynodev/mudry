<?php

class CommercialModel {

    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo=$pdo;
    }

    public function insert($idEmployer){
        try{
            $idEmployer=(int)$idEmployer;

            $sql="INSERT INTO commercial (id_Employer) VALUES (?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idEmployer]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
