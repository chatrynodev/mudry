<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>
<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h1>Modifier l'Avion</h1>

<form method="POST" action="index.php?uc=modifierAvion&action=confirmUpdate">

    <input type="hidden" name="id_Avion" value="<?= htmlspecialchars($avion['id_Avion']) ?>">
    <p>
        <label>Numéro de Série :</label><br>
        <input type="text" name="numSerie_Avion" value="<?= htmlspecialchars($avion['numSerie_Avion']) ?>">
    </p>
    
    <p>
        <label>Code Interne :</label><br>
        <input type="text" name="codeInterne_Avion" value="<?= htmlspecialchars($avion['codeInterne_Avion']) ?>">
    </p>

    <p>
        <label>Modèle :</label><br>
        <select name="id_Modele" required>
            <option value="">-- Sélectionner un modèle --</option>
            <?php if (isset($lesModeles)) { foreach ($lesModeles as $modele): ?>
                <option value="<?= $modele['id_Modele'] ?>" 
                    <?= $modele['id_Modele'] == $avion['id_Modele'] ? 'selected' : '' ?>>
                    <?= $modele['id_Modele'] ?> — <?= htmlspecialchars($modele['libelle_Modele']) ?>
                </option>
            <?php endforeach; } ?>
        </select>
    </p>

    <p>
        <button type="submit" class="btn btn-add">Enregistrer</button>
        <button type="button" class="btn btn-add" onclick="window.location.href='index.php?uc=voirAvion&action=liste'">
            Annuler
        </button>
    </p>

</form>

</body>
</html>