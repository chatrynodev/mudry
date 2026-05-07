<?php
// models/EquipageModel.php
// Repris et adapté depuis le projet Web Mudry (m_equipage.php)

require_once __DIR__ . "/../config/database.php";

class EquipageModel {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnexion();
    }

    // Récupère l'équipage complet d'un mouvement avec rôle + coordonnées
    // Repris depuis getEquipageByMouv() du projet Web
    public function getEquipageByMouv($numMouv) {
        try {
            $sql = "
                SELECT e.id_Employer, e.id_Role, e.presence,
                       r.libelle_Role,
                       em.nom_Employer, em.prenom_Employer, em.tel_Employer
                FROM equipage e
                JOIN role r ON r.id_Role = e.id_Role
                JOIN employer em ON em.id_Employer = e.id_Employer
                WHERE e.num_Mouv = :num
                ORDER BY r.libelle_Role ASC
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['num' => (int)$numMouv]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return false;
        }
    }

    // Met à jour la présence d'un membre de l'équipage
    // On inclut id_Role dans le WHERE car la clé primaire est (num_Mouv, id_Role, id_Employer)
    public function updatePresence($numMouv, $idEmployer, $idRole, $presence) {
        try {
            $sql = "
                UPDATE equipage 
                SET presence = :presence
                WHERE num_Mouv = :mouv AND id_Employer = :emp AND id_Role = :role
            ";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'presence' => (int)$presence,
                'mouv'     => (int)$numMouv,
                'emp'      => (int)$idEmployer,
                'role'     => (int)$idRole
            ]);
        } catch (Exception $e) {
            return false;
        }
    }

    // Vérifie si l'équipage est complet selon les règles minimum par modèle
    // Repris depuis getRequiredRolesForMouvement() du projet Web
    public function verifierEquipage($numMouv) {
        try {
            // Récupère les rôles requis et leur minimum
            $sqlRequis = "
                SELECT r.id_Role, r.libelle_Role, a.nbMin_Role
                FROM mouvement m
                JOIN avion av ON av.id_Avion = m.id_Avion
                JOIN assigner a ON a.id_Modele = av.id_Modele
                JOIN role r ON r.id_Role = a.id_Role
                WHERE m.num_Mouv = :num
            ";
            $stmt = $this->pdo->prepare($sqlRequis);
            $stmt->execute(['num' => (int)$numMouv]);
            $rolesRequis = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Récupère les membres actuellement affectés
            $sqlAffectes = "
                SELECT id_Role, COUNT(*) AS nb_affectes
                FROM equipage
                WHERE num_Mouv = :num
                GROUP BY id_Role
            ";
            $stmt2 = $this->pdo->prepare($sqlAffectes);
            $stmt2->execute(['num' => (int)$numMouv]);
            $affectes = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            // Indexe les affectés par id_Role
            $affectesIndex = [];
            foreach ($affectes as $a) {
                $affectesIndex[$a['id_Role']] = $a['nb_affectes'];
            }

            // Compare requis vs affectés
            $complet = true;
            $manquants = [];

            foreach ($rolesRequis as $role) {
                $nbAffecte = $affectesIndex[$role['id_Role']] ?? 0;
                $manque    = $role['nbMin_Role'] - $nbAffecte;

                if ($manque > 0) {
                    $complet = false;
                    $manquants[] = [
                        "role"        => $role['libelle_Role'],
                        "requis"      => $role['nbMin_Role'],
                        "affectes"    => $nbAffecte,
                        "manquants"   => $manque
                    ];
                }
            }

            return [
                "complet"   => $complet,
                "manquants" => $manquants
            ];

        } catch (Exception $e) {
            return false;
        }
    }
}