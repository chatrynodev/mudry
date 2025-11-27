<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un Modèle</title>
    <link rel="stylesheet" href="/Models/css/gestion.css">
</head>
<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h1>Modifier le modèle</h1>

<form method="POST" action="index.php?uc=modifierModele&action=confirmUpdate">

    <input type="hidden" name="id_Modele" value="<?= htmlspecialchars($modele['id_Modele']) ?>">
    <p>
        <label>Nom du modèle :</label><br>
        <input type="text" name="libelle_Modele" value="<?= htmlspecialchars($modele['libelle_Modele']) ?>">
    </p>
    
    <p>
        <label>Nombre de sièges maximum :</label><br>
        <input type="text" name="nbSiegeMax_Modele" value="<?= htmlspecialchars($modele['nbSiegeMax_Modele']) ?>">
    </p>
    </p>

    <p>
        <button type="submit" class="btn btn-add">Enregistrer</button>
        <button type="button" class="btn btn-add" onclick="window.location.href='index.php?uc=voirModele&action=liste'">
            Annuler
        </button>
    </p>

</form>

</body>
</html>