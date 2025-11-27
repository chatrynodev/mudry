<head>
    <meta charset="UTF-8">
    <title>Modifier un Avion</title>
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">
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
    <label>Assigner des rôles (quantité) :</label>
    <?php if (!isset($lesRoles)) $lesRoles = []; ?>
    <div class="roles-list">
        <?php foreach ($lesRoles as $role): ?>
            <div>
                <label style="display:block; margin-bottom:4px;">
                    <input type="checkbox" name="id_Role[]" value="<?= htmlspecialchars($role['id_Role']) ?>" 
                        onchange="toggleQuantityInput(this)">
                    <?= htmlspecialchars($role['libelle_Role']) ?>
                    <input type="number" name="qte[<?= htmlspecialchars($role['id_Role']) ?>]" min="1" disabled>
                </label>
            </div>
            
        <?php endforeach; ?>
    </div><br>

    <button type="submit" class="btn btn-add">Ajouter</button>

</form>

</div>
