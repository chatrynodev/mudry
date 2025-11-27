<?php

class LanguesModel {

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    private function cleanString($v){
        return htmlspecialchars(trim($v),ENT_QUOTES,'UTF-8');
    }

    public function getAllLangues(){
        try{
            $sql="SELECT * FROM langues ORDER BY libelle_Langue ASC";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function insertLangues($libelle){
        try{
            $libelle=$this->cleanString($libelle);

            $sql="INSERT INTO langues (libelle_Langue) VALUES (?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$libelle]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
