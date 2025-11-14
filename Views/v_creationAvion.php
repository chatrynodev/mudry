<!doctype html>
<html>
    <head>
        <title>Création d'un nouvel Avion</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="style.css" rel="stylesheet" type="text/css" />

    </head>


    <body>
    <p><h1>Nouvel avion cree :</h1></p><br />
        <form action="index.php?uc=creerAvion&action=confirmCreatAvion" method="post">

        <table>
        <tbody>
            <tr><td>Numéro de Série</td><td><input name="numSerie" size=20></td></tr>
            <tr><td>Code Interne</td><td><input name="codeInterne" size=20></td></tr>
            <tr>
                <td>Sélectionner un modèle</td>
                <td>
                    <?php if (!isset($lesModeles)) $lesModeles = []; ?>
                    <select name="id_Modele">
                        <option value="">-- Aucun --</option>
                        <?php foreach ($lesModeles as $modele) {
                            $id = $modele['id_Modele'] ?? '';
                            $lib = $modele['libelle_Modele'] ?? $id;
                            $nb = $nbsieges[]
                            if ($id !== '') {
                                echo '<option value="'.htmlspecialchars($id).'">'.htmlspecialchars($lib).'</option>';
                            }
                        } ?>
                    </select>
                </td>
            </tr>
        </tbody>
        </table>
                <br />
        <input type="submit" value="Valider">
    </form>

    </body>
</html>