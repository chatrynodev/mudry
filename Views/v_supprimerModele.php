<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h2>Supprimer ce modèle ?</h2>

<p>Id du modèle : <?= htmlspecialchars($unModele['id_Modele'] ?? '') ?></p>
<p>Libellé du modèle : <?= htmlspecialchars($unModele['libelle_Modele'] ?? '') ?></p>
<p>Nombre de sièges maximum : <?= htmlspecialchars($unModele['nbSiegeMax_Modele'] ?? '') ?></p>

<!-- Afficher les rôles assignés -->
<?php if (!isset($rolesAssignes) || !is_array($rolesAssignes)) $rolesAssignes = []; ?>
<h3>Rôles assignés</h3>
<?php if (!empty($rolesAssignes)): ?>
    <ul>
        <?php foreach ($rolesAssignes as $r): ?>
            <li><?= htmlspecialchars($r['libelle_Role']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun rôle assigné à ce modèle.</p>
<?php endif; ?>

<form method="POST" action="index.php?uc=supprimerModele&action=confirmDelete">
    <input type="hidden" name="id_Modele" value="<?= htmlspecialchars($unModele['id_Modele'] ?? '') ?>">
    <button type="submit" class="btn btn-add">Confirmer la suppression</button>
</form>
