<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        header('Location: index.php');
        exit;
    }
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <form action="login_process.php" method="post">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>