<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de la connexion
    $password = $_POST['password'];
    // Vérifiez le mot de passe (à adapter selon votre logique)
    if ($password === 'mudry1234*') {
        $_SESSION['isConnected'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = "Mot de passe incorrect.";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>