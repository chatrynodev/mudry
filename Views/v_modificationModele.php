<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
    <script>
        function toggleQuantityInput(checkbox) {
            const quantityInput = checkbox.parentElement.querySelector('input[type="number"]');
            if (checkbox.checked) {
                quantityInput.disabled = false;
                if (quantityInput.value === '') {
                    quantityInput.value = '1';
                }
            } else {
                quantityInput.disabled = true;
                quantityInput.value = '';
            }
        }
    </script>
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

    <!-- RÔLES AVEC QUANTITÉS -->
    <p>
        <label>Assigner des rôles (quantité) :</label>
        <?php if (!isset($lesRoles)) $lesRoles = []; ?>
        <?php if (!isset($rolesAssignes)) $rolesAssignes = []; ?>
        
        <!-- Créer un array associatif pour faciliter la recherche -->
        <?php 
            $rolesAssignMap = [];
            foreach ($rolesAssignes as $r) {
                $rolesAssignMap[$r['id_Role']] = $r['nbMin_Role'];
            }
        ?>
        
        <div class="roles-list">
            <?php foreach ($lesRoles as $role): ?>
                <div>
                    <label style="display:block; margin-bottom:4px;">
                        <input type="checkbox" name="id_Role[]" value="<?= htmlspecialchars($role['id_Role']) ?>" 
                            onchange="toggleQuantityInput(this)"
                            <?= isset($rolesAssignMap[$role['id_Role']]) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($role['libelle_Role']) ?>
                        <input type="number" name="qte[<?= htmlspecialchars($role['id_Role']) ?>]" min="1" 
                            value="<?= isset($rolesAssignMap[$role['id_Role']]) ? htmlspecialchars($rolesAssignMap[$role['id_Role']]) : '' ?>"
                            <?= !isset($rolesAssignMap[$role['id_Role']]) ? 'disabled' : '' ?>>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
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