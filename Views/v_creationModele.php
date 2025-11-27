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

        function validateForm(event) {
            const checkboxes = document.querySelectorAll('input[name="id_Role[]"]');
            const isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);
            
            if (!isAnyChecked) {
                event.preventDefault();
                alert('Vous devez sélectionner au moins un rôle pour créer un modèle.');
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
<header>
   <?php include("includes/navbar.php"); ?>      
</header>

<h2>Créer un modèle</h2>

<div class="mouvement-container">

<!-- Afficher le message d'erreur s'il existe -->
<?php if (isset($erreur) && !empty($erreur)): ?>
    <div style="color: red; font-weight: bold; margin-bottom: 20px; padding: 10px; border: 1px solid red; background-color: #ffe6e6;">
        ⚠️ <?= htmlspecialchars($erreur) ?>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?uc=creerModele&action=confirmAdd" onsubmit="return validateForm(event)">

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
</body>
</html>