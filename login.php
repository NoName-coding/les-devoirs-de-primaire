<?php
    session_start();
    include 'utils.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérifier les informations dans la base de données
        $conn = new mysqli("localhost", "root", "", "les_devoirs_de_primaire");
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();
        $conn->close();

        if(password_verify($password, $user['password'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
            exit;
        } else {
            echo 'Nom d\'utilisateur ou mot de passe incorrect.';
        }
    }
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
    </head>
    <body>
        <form action="login.php" method="post">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Connexion">
        </form>
    </body>
</html>