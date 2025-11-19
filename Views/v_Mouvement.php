<h2>Liste des mouvements</h2>
<a href="index.php?uc=addMouvement&action=formAdd">Ajouter un mouvement</a>

<table border="1">
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

        <td>
            <a href="index.php?uc=updateMouvement&action=formUpdate&num_Mouv=<?= $mouv['num_Mouv'] ?>">Update</a>
            |
            <a href="index.php?uc=deleteMouvement&action=delete&num_Mouv=<?= $mouv['num_Mouv'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
