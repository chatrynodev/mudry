<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vols</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h2>Liste des mouvements</h2>

<div class="mouvement-container">

    <div class="mouvement-header">
        <span>Liste des vols enregistrés</span>
        <a class="btn btn-add" href="index.php?uc=addMouvement&action=formAdd">
            + Ajouter un mouvement
        </a>
    </div>

    <table class="mouvement-table">
        <tr>
            <th>ID</th><th>Vol</th><th>Distance</th><th>Passagers</th><th>Départ</th><th>Arrivée</th><th>Actions</th>
        </tr>

        <?php foreach($lesMouvements as $mouv) : ?>
        <tr>
            <td><?= $mouv['num_Mouv'] ?></td>
            <td><?= $mouv['num_Vol'] ?></td>
            <td><?= $mouv['distance_Mouv'] ?></td>
            <td><?= $mouv['nb_PassagerMouv'] ?></td>
            <td><?= $mouv['date_Depart'] ?></td>
            <td><?= $mouv['date_Arrive'] ?></td>

            <td class="mouvement-actions">
                <a class="btn btn-update"
                   href="index.php?uc=updateMouvement&action=formUpdate&num_Mouv=<?= $mouv['num_Mouv'] ?>">
                    Update
                </a>

                <a class="btn btn-delete"
                   href="index.php?uc=deleteMouvement&action=delete&num_Mouv=<?= $mouv['num_Mouv'] ?>">
                    Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
