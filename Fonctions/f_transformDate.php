<?php
/**
 * Convertit une date SQL (YYYY-MM-DD) en format français (JJ Mois AAAA).
 *
 * @param string $dateSQL La date au format SQL (ex: "2025-10-30").
 * @return string La date au format français (ex: "30 Octobre 2025").
 */
function dateSQLToFrancais($dateSQL) {
    // Crée un objet DateTime à partir de la date SQL
    $date = new DateTime($dateSQL);

    // Tableau des noms des mois en français
    $moisFrancais = [
        'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
        'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
    ];

    // Récupère le jour, le mois et l'année
    $jour = $date->format('d');
    $mois = $moisFrancais[(int)$date->format('m') - 1]; // Mois indexé à partir de 0
    $annee = $date->format('Y');

    // Retourne la date au format français
    return "$jour $mois $annee";
}

// Exemple d'utilisation
// dateSQLToFrancais("2025-10-30"); Affiche "30 Octobre 2025"

?>