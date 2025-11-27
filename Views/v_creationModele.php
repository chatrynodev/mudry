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

    <!-- MENU DÉROULANT DES ROLES -->
    <label>Assigner des rôles :</label>
    <?php if (!isset($lesRoles)) $lesRoles = []; ?>
    <div class="roles-list">
        <?php foreach ($lesRoles as $role): ?>
            <label style="display:block; margin-bottom:4px;">
                <input type="checkbox" name="id_Role[]" value="<?= htmlspecialchars($role['id_Role']) ?>">
                <?= htmlspecialchars($role['libelle_Role']) ?>
            </label>
        <?php endforeach; ?>
    </div><br>

    <button type="submit" class="btn btn-add">Ajouter</button>

</form>

</div>
