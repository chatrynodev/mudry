<?php

class RoleModel {

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    private function cleanString($v){
        return htmlspecialchars(trim($v),ENT_QUOTES,'UTF-8');
    }

    public function getAll(){
        try{
            $sql = "SELECT * FROM role ORDER BY libelle_Role ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function insert($libelle){
        try{
            $libelle = $this->cleanString($libelle);

            $sql = "INSERT INTO role (libelle_Role) VALUES (?)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$libelle]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function update($id,$libelle){
        try{
            $id = (int)$id;
            $libelle = $this->cleanString($libelle);

            $sql = "UPDATE role SET libelle_Role=? WHERE id_Role=?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$libelle,$id]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function delete($id){
        try{
            $id = (int)$id;
            $sql="DELETE FROM role WHERE id_Role=?";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$id]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
