<!doctype html>
<html>

<head>
    <title>Liste des Avions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">

</head>
<body>
    <form action="index.php?uc=creerAvion&action=creerAvion" method="post">
        
        <div class="mouvement-header">
        <p><h2>Liste des Avions</h2></p>
        </div>

        <table class="mouvement-table" border=3 cellspacing=1>
            <tr>
                <th>Numéro de Série</th>
                <th>Code Interne</th>
                <th>Modèle</th>
                <th colspan="2">Actions</th>
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
   <button type="button" class="btn" onclick="window.location.href='index.php?uc=voirModele&action=liste'">
        Voir les modèles
    </button>

</body>
</html>
