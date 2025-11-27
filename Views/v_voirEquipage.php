<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Équipages</title>
    <link rel="stylesheet" href="Models/css/gestion.css">
</head>

<body>
<header>
    <?php include("includes/navbar.php"); ?>
</header>

<h2>Gestion de l'équipage du mouvement n°<?= htmlspecialchars($numMouv) ?></h2>

<form method="POST" action="index.php?uc=gererEquipage&action=assignEquipage&num_Mouv=<?= $numMouv ?>">

<div class="mouvement-container">

    <table class="mouvement-table">
        <thead>
            <tr>
                <th>Rôle obligatoire</th>
                <th>Employé assigné</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($requiredRoles as $r): ?>

                <?php
                // Liste des employés déjà assignés à ce rôle
                $assignedEmployees = [];
                foreach ($equipage as $e) {
                    if ($e['id_Role'] == $r['id_Role']) {
                        $assignedEmployees[] = $e['id_Employer'];
                    }
                }
                ?>

                <?php for ($i = 0; $i < $r['nbMin_Role']; $i++): ?>

                    <tr>
                        <td>
                            <?= htmlspecialchars($r['libelle_Role']) ?>
                            <?php if ($r['nbMin_Role'] > 1): ?>
                                #<?= $i + 1 ?>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if (isset($assignedEmployees[$i]) && $assignedEmployees[$i] !== null): ?>

                                <!-- Employé déjà assigné -->
                                <?php 
                                foreach ($employers as $emp) {
                                    if ($emp['id_Employer'] == $assignedEmployees[$i]) {
                                        echo htmlspecialchars($emp['nom_Employer']." ".$emp['prenom_Employer']);
                                    }
                                }
                                ?>

                            <?php else: ?>

                                <!-- Sélecteur pour assigner un employé -->
                                <select name="role_<?= $r['id_Role'] ?>_<?= $i ?>" class="input-select">
                                    <option value="">-- Choisir un employé --</option>

                                    <?php foreach ($employers as $emp): ?>
                                        <option value="<?= $emp['id_Employer'] ?>">
                                            <?= htmlspecialchars($emp['nom_Employer']." ".$emp['prenom_Employer']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            <?php endif; ?>
                        </td>
                    </tr>

                <?php endfor; ?>

            <?php endforeach; ?>

        </tbody>
    </table>

    <button type="submit" class="btn btn-add" style="margin-top:15px;">
        Valider l'équipage
    </button>

</div>

</form>

</body>
</html>
