<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h2>Supprimer cet avion ?</h2>

<p>Id de l'avion : <?= $avion['id_Avion'] ?></p>
<p>Numéro de série : <?= $avion['numSerie_Avion'] ?></p>
<p>Code Interne : <?= $avion['codeInterne_Avion'] ?></p>

<form method="POST" action="index.php?uc=supprimerAvion&action=confirmDelete">
    <input type="hidden" name="id_Avion" value="<?= $avion['id_Avion'] ?>">
    <input type="hidden" name="id_Modele" value="<?= $avion['id_Modele'] ?>">
    <button type="submit">Confirmer la suppression</button>
</form>
