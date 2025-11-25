<!doctype html>
<html>

<head>
    <title>Liste des Avions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="/mudry/Models/css/gestion.css">

</head>
<body>
    <form action="index.php?uc=creerModele&action=creerModele" method="post">
        <p><h2>Liste des Modele</h2></p>

        <table border=3 cellspacing=1>
            <tr>
                <td>Nom du modèle</td>
                <td>Nombre de sièges maximum</td>
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
    <form action="index.php?uc=voirModele&action=voirModele" method="post">
        <input class="btn" type="submit" value="Voir les modèles d'avions">
    </form>
</body>
</html>
