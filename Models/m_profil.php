<?php

class ProfilModel {

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    private function cleanString($v){
        return htmlspecialchars(trim($v),ENT_QUOTES,'UTF-8');
    }

    public function getByIdentifiant($identifiant){
        try{
            $identifiant = $this->cleanString($identifiant);

            $sql="SELECT * FROM profil WHERE identifiant=?";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$identifiant]);
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function insert($identifiant,$passwordHash,$type){
        try{
            $identifiant = $this->cleanString($identifiant);
            $type = $this->cleanString($type);

            $sql="INSERT INTO profil (identifiant,password,type) VALUES (?,?,?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$identifiant,$passwordHash,$type]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
