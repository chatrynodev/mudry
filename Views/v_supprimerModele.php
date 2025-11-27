<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
</head>

<header>
   <?php include("includes/navbar.php"); ?>      
</header>
<h2>Supprimer ce modèle ?</h2>

<!-- Afficher le message d'erreur s'il existe -->
<?php if (isset($erreur) && !empty($erreur)): ?>
    <div style="color: red; font-weight: bold; margin-bottom: 20px; padding: 10px; border: 1px solid red; background-color: #ffe6e6;">
        ⚠️ <?= htmlspecialchars($erreur) ?>
    </div>
<?php endif; ?>

<p>Id du modèle : <?= htmlspecialchars($unModele['id_Modele'] ?? '') ?></p>
<p>Libellé du modèle : <?= htmlspecialchars($unModele['libelle_Modele'] ?? '') ?></p>
<p>Nombre de sièges maximum : <?= htmlspecialchars($unModele['nbSiegeMax_Modele'] ?? '') ?></p>

<!-- Afficher les rôles assignés avec quantités -->
<?php if (!isset($rolesAssignes) || !is_array($rolesAssignes)) $rolesAssignes = []; ?>
<h3>Rôles assignés</h3>
<?php if (!empty($rolesAssignes)): ?>
    <ul>
        <?php foreach ($rolesAssignes as $r): ?>
            <li>
                <?= htmlspecialchars($r['libelle_Role']) ?>
                <?php if (isset($r['nbMin_Role']) && !empty($r['nbMin_Role'])): ?>
                    : <?= htmlspecialchars($r['nbMin_Role']) ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun rôle assigné à ce modèle.</p>
<?php endif; ?>

<form method="POST" action="index.php?uc=supprimerModele&action=confirmDelete">
    <input type="hidden" name="id_Modele" value="<?= htmlspecialchars($unModele['id_Modele'] ?? '') ?>">
    <button type="submit" class="btn btn-add" <?= isset($erreur) && !empty($erreur) ? 'disabled' : '' ?>>Confirmer la suppression</button>
    <button type="button" class="btn btn-add" onclick="window.location.href='index.php?uc=voirModele&action=liste'">
        Annuler
    </button>
</form>
