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
        </tbody>
        </table>
                <br />
        <input type="submit" value="Valider">
    </form>

    </body>
</html>