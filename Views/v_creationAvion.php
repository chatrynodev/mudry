<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Avion</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
</head>
<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>

<h2>Créer un avion</h2>

<div class="mouvement-container">

<form method="POST" action="index.php?uc=creerAvion&action=confirmAdd">

    <label>Numéro de l'Avion :</label>
    <input type="text" name="numSerie_Avion" required><br>

    <label>Code Interne :</label>
    <input type="text" name="codeInterne_Avion"><br>

    <!-- MENU DÉROULANT DES MODELES -->
    <label>Modèle :</label>
    <select name="id_Modele" required>
        <option value="">-- Sélectionner un modèle --</option>
        <?php foreach ($lesModeles as $modele): ?>
            <option value="<?= $modele['id_Modele'] ?>">
                <?= $modele['id_Modele'] ?> — <?= htmlspecialchars($modele['libelle_Modele']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit" class="btn btn-add">Ajouter</button>

</form>

</div>
</body>
</html>
