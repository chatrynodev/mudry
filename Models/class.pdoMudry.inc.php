<?php

class PdoMudry {
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=mudry';    
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoMudry = null;


    private function __construct() {
        PdoMudry::$monPdo = new PDO(PdoMudry::$serveur . ';' . PdoMudry::$bdd, PdoMudry::$user, PdoMudry::$mdp);
        PdoMudry::$monPdo->query("SET CHARACTER SET utf8");
    }
    public function __destruct() {
        PdoMudry::$monPdo = null;
    }

    public static function getPdoMudry() {
        if (PdoMudry::$monPdoMudry == null) 
        {
            PdoMudry::$monPdoMudry = new PdoMudry();
        }
        return PdoMudry::$monPdoMudry;
    }


    public function getLesAvions() {
        $req = "SELECT * FROM avion";
        $res = PdoMudry::$monPdo->query($req);
        $lesAvions = $res->fetchAll();
        return $lesAvions;
    }

    public function creerAvion($numSerie_Avion, $codeInterne_Avion, $id_Modele) {
        $res = PdoMudry::$monPdo->prepare('INSERT INTO avion (numSerie, codeInterne, id_Modele) VALUES (:numSerie, :codeInterne, :id_Modele)');
        $res->bindParam(':numSerie', $numSerie_Avion, PDO::PARAM_STR);
        $res->bindParam(':codeInterne', $codeInterne_Avion, PDO::PARAM_STR);
        $res->bindParam(':id_Modele', $id_Modele, PDO::PARAM_INT);
        $res->execute();
    }

    public function modifierAvion($num, $nom, ) {
        $res = PdoMudry::$monPdo->prepare('UPDATE avion SET codeInterne_Avion = :codeInterne_Avion WHERE numSerie_Avion = :numSerie_Avion');
        $res->bindParam(':numSerie_Avion', $num, PDO::PARAM_INT);
        $res->bindParam(':codeInterne_Avion', $code, PDO::PARAM_STR);
        $res->execute();
    }
}
?>