<!doctype html>
<html>

<head>
    <title>Liste des Avions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">

</head>
<body>
    <form action="index.php?uc=creerAvion&action=creerAvion" method="post">
        <p><h2>Liste des Avions</h2></p>

        <table border=3 cellspacing=1>
            <tr>
                <td>Numéro de Série</td>
                <td>Code Interne</td>
                <td>Modèle</td>
                <td colspan="2">Actions</td>
            </tr>
            <?php

                foreach ($lesAvions as $unAvion) 
                {
                    $num = $unAvion['numSerie_Avion'];
                    $code = $unAvion['codeInterne_Avion'];
                    $modele = $unAvion['id_Modele'];
            ?>
                <tr>
                        <td width=150><?php echo $num ?></td>
                        <td width=150><?php echo $code ?></td>
                        <td width=150><?php echo $modele ?></td>
                    <?php

                    ?>
                        <td class="mouvement-actions">
                            <a class="btn btn-update"
                                href="index.php?uc=modifierAvion&action=modifierAvion&id_Avion=<?php echo $unAvion['id_Avion'] ?>">Modifier</a></td>

                        <td class="mouvement-actions">
                            <a class="btn btn-delete"
                                href="index.php?uc=supprimerAvion&id_Avion=<?php echo $unAvion['id_Avion'] ?>">Supprimer</a></td>
                </tr>
                <?php
            }
            ?>
            </table>
            </br>

            <input class="btn" type="submit" value="Créer un nouvel avion">
    </form>
        </br>
    <button class="btn">Voir les modèles d'avions<a href="Views/v_modele.php"></a></button>
</body>
</html>
