<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h2>Supprimer ce modèle ?</h2>

<p>Id du modèle : <?= $unModele['id_Modele'] ?></p>
<p>Libellé du modèle : <?= $unModele['libelle_Modele'] ?></p>
<p>Nombre de sièges maximum : <?= $unModele['nbSiegeMax_Modele'] ?></p>
<form method="POST" action="index.php?uc=supprimerModele&action=confirmDelete">
    <input type="hidden" name="id_Modele" value="<?= $unModele['id_Modele'] ?>">
    <button type="submit" class="btn btn-add">Confirmer la suppression</button>
</form>
