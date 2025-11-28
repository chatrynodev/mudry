<?php

class AssignerModel {

    private $pdo;

    public function __construct()
    {
        // ✔ On récupère l’instance — puis la connexion PDO
        $this->pdo = PdoMudry::getPdoMudry()->getConnexion();
    }

    public function getByModele($idModele){
        try{
            $idModele = (int)$idModele;

            $sql="SELECT * FROM assigner WHERE id_Modele=?";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$idModele]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function insert($idModele,$idRole,$nbMin){
        try{
            $idModele=(int)$idModele;
            $idRole=(int)$idRole;
            $nbMin=(int)$nbMin;

            $sql="INSERT INTO assigner (id_Modele,id_Role,nbMin_Role) VALUES (?,?,?)";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idModele,$idRole,$nbMin]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function update($idModele,$idRole,$nbMin){
        try{
            $idModele=(int)$idModele;
            $idRole=(int)$idRole;
            $nbMin=(int)$nbMin;

            $sql="UPDATE assigner SET nbMin_Role=? WHERE id_Modele=? AND id_Role=?";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$nbMin,$idModele,$idRole]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function delete($idModele,$idRole){
        try{
            $idModele=(int)$idModele;
            $idRole=(int)$idRole;

            $sql="DELETE FROM assigner WHERE id_Modele=? AND id_Role=?";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$idModele,$idRole]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
