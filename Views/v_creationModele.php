<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<header>
   <?php include("includes/navbar.php"); ?>      
</header>

<h2>Créer un modèle</h2>

<div class="mouvement-container">

<form method="POST" action="index.php?uc=creerModele&action=confirmAdd">

    <label>Nom du modèle :</label>
    <input type="text" name="libelle_Modele" required><br>

    <label>Nombre de sièges maximum :</label>
    <input type="number" name="nbSiegeMax_Modele" required><br>

    <!--<label>Assigner des rôles :</label>
    <input type="number" name="nbSiegeMax_Modele" required><br>-->

    <button type="submit" class="btn btn-add">Ajouter</button>

</form>

</div>
