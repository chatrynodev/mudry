<?php

class LanguesModel {

    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo=$pdo;
    }

    private function cleanString($v){
        return htmlspecialchars(trim($v),ENT_QUOTES,'UTF-8');
    }

    public function getAll(){
        try{
            $sql="SELECT * FROM langues ORDER BY libelle_Langue ASC";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function insert($libelle){
        try{
            $libelle=$this->cleanString($libelle);

            $sql="INSERT INTO langues (libelle_Langue) VALUES (?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$libelle]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
