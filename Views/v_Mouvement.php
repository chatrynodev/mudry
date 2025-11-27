<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Vols</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
</head>

<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h2>Liste des mouvements</h2>
<?php
// Affichage des messages de statut
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $message = $_GET['message'] ?? '';

    if ($status === 'success') {
        if ($message === 'add_ok') {
            echo '<div class="alert success">Mouvement ajouté avec succès.</div>';
        }
    } elseif ($status === 'error') {
        if ($message === 'add_failDepart') {
            echo '<div class="alert error">Erreur : La date de départ est invalide.</div>';
        } elseif ($message === 'add_failDates') {
            echo '<div class="alert error">Erreur : La date d\'arrivée doit être après la date de départ.</div>';
        }
    }
}
?>

<div class="mouvement-container">

    <div class="mouvement-header">
        <span>Liste des vols enregistrés</span>
        <a class="btn btn-add" href="index.php?uc=addMouvement&action=formAdd">
            + Ajouter un mouvement
        </a>
    </div>

    <table class="mouvement-table">
        <tr>
            <th>ID</th><th>Vol</th><th>Distance</th><th>Passagers</th>
            <th>Départ</th><th>Arrivée</th><th>Actions</th>
        </tr>

        <?php foreach($lesMouvements as $mouv) : ?>
        <tr>
            <td><?= htmlspecialchars($mouv['num_Mouv']) ?></td>
            <td><?= htmlspecialchars($mouv['num_Vol']) ?></td>
            <td><?= htmlspecialchars($mouv['distance_Mouv']) ?></td>
            <td><?= htmlspecialchars($mouv['nb_PassagerMouv']) ?></td>
            <td><?= htmlspecialchars($mouv['date_Depart']) ?></td>
            <td><?= htmlspecialchars($mouv['date_Arrive']) ?></td>

            <td class="mouvement-actions">
                <a class="btn btn-update"
                   href="index.php?uc=updateMouvement&action=formUpdate&num_Mouv=<?= $mouv['num_Mouv'] ?>">
                    Update
                </a>

                <a class="btn btn-delete"
                   href="index.php?uc=deleteMouvement&action=delete&num_Mouv=<?= $mouv['num_Mouv'] ?>">
                    Delete
                </a>

                <!-- ⭐ Nouveau bouton pour l'équipage -->
                <a class="btn btn-update"
                   href="index.php?uc=gererEquipage&action=voirEquipage&num_Mouv=<?= $mouv['num_Mouv'] ?>">
                    Gérer l'équipage
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
</body>
</html>
