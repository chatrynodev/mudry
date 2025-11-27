<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Mouvement</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h2>Supprimer ce mouvement ?</h2>

<p>Vol : <?= $unMouv['num_Vol'] ?></p>
<p>Distance : <?= $unMouv['distance_Mouv'] ?> km</p>

<form method="POST" action="index.php?uc=deleteMouvement&action=confirmDelete">
    <input type="hidden" name="num_Mouv" value="<?= $unMouv['num_Mouv'] ?>">
    <button type="submit">Confirmer la suppression</button>
</form>
