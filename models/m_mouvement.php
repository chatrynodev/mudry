<?php

class MouvementModel {

    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    private function cleanString($v){
        return htmlspecialchars(trim($v),ENT_QUOTES,'UTF-8');
    }

    public function getAll(){
        try{
            $sql="SELECT * FROM mouvement ORDER BY date_Depart DESC";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function insert($numVol,$dist,$nbPass,$dateDep,$dateArr,$duree){
        try{
            $numVol = $this->cleanString($numVol);
            $dist = (float)$dist;
            $nbPass = (int)$nbPass;
            $dateDep = $this->cleanString($dateDep);
            $dateArr = $this->cleanString($dateArr);
            $duree = $this->cleanString($duree);

            $sql="INSERT INTO mouvement 
            (num_Vol,distance_Mouv,nb_PassagerMouv,date_Depart,date_Arrive,duree)
            VALUES (?,?,?,?,?,?)";

            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$numVol,$dist,$nbPass,$dateDep,$dateArr,$duree]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }

    public function delete($id){
        try{
            $id=(int)$id;

            $sql="DELETE FROM mouvement WHERE num_Mouv=?";
            $stmt=$this->pdo->prepare($sql);
            return $stmt->execute([$id]);

        }catch(Exception $e){ return ["error"=>"Erreur interne."]; }
    }
}
