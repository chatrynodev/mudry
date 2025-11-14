<?php

class PdoMudry {
      	private static $server='mysql:host=localhost';
      	private static $bdd='dbname=mudry';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoMudry = null;

        private function __construct(){
            PdoMudry::$monPdo = new PDO(PdoMudry::$server.";" .PdoMudry::$bdd, PdoMudry::$user, PdoMudry::$mdp);
            PdoMudry::$monPdo->query("SET CHARACTER SET utf8");
        }

        public function __destruct(){
            PdoMudry::$monPdo = null;
        }
        
        public static function getPdoMudry(){
            if(PdoMudry::$monPdoMudry == null){
                PdoMudry::$monPdoMudry = new PdoMudry();
            }
            return PdoMudry::$monPdoMudry;
        }

        public function getLesAeroports(){
            $req = "SELECT * FROM aeroport";
            $res = PdoMudry::$monPdo->query($req);
            $lesLignes = $res->fetchAll();
            return $lesLignes;
        }

        public function creerAeroport($nom, $latitude, $longitude, $codeCommercial){
            $res = PdoMudry::$monPdo->prepare('INSERT INTO aeroport (nom_Aeroport, 
            latitude_Aeroport, longitude_Aeroport, codeCommercial_Aeroport) VALUES ( :nom, :prenom, :adresse, :codepostal, :ville)');  
            $res->bindValue('nom', $nom, PDO::PARAM_STR);
            $res->bindValue('latitude', $adresse, PDO::PARAM_STR);
            $res->bindValue('longitude', $codepostal, PDO::PARAM_INT);
            $res->bindValue('codeCommercial', $codeCommecial, PDO::PARAM_STR);
            $res->execute();
        }
        
        // Récupérer un client par son ID
        public function getClientById($num) {
            $req = "SELECT * FROM client WHERE numC = :num";
            $res = PdoMudry::$monPdo->prepare($req);
            $res->bindValue(':num', $num, PDO::PARAM_INT);
            $res->execute();
            return $res->fetch(PDO::FETCH_ASSOC);  // <-- force un tableau associatif
        }



        // Mettre à jour un client
        public function updateClient($num, $nom, $prenom, $adresse, $codepostal, $ville){
            $req = "UPDATE client
                    SET nomC = :nom,
                        prenomC = :prenom,
                        adresseC = :adresse,
                        codepostalC = :codepostal,
                        villeC = :ville
                    WHERE numC = :num";

            $res = PdoMudry::$monPdo->prepare($req);
            $res->bindValue(':num', $num, PDO::PARAM_INT);
            $res->bindValue(':nom', $nom, PDO::PARAM_STR);
            $res->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $res->bindValue(':adresse', $adresse, PDO::PARAM_STR);
            $res->bindValue(':codepostal', $codepostal, PDO::PARAM_INT);
            $res->bindValue(':ville', $ville, PDO::PARAM_STR);
            $res->execute();
        }

        public function supprimerClient($id) {
            $req = PdoMudry::$monPdo->prepare("DELETE FROM client WHERE numC = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
        }
    }
?>