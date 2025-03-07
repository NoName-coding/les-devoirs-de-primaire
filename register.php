<?php
    session_start();
    include 'utils.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        // Sauvegarder les informations dans la base de données
        $conn = new mysqli("localhost", "root", "", "les_devoirs_de_primaire");
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
        $conn->query($sql);
        $conn->close();

        header('Location: login.php');
        exit;
    }
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
    </head>
    <body>
        <form action="register.php" method="post">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
            <label for="role">Rôle:</label>
            <select id="role" name="role">
                <option value="enfant">Enfant</option>
                <option value="enseignant">Enseignant</option>
                <option value="parent">Parent</option>
            </select><br>
            <input type="submit" value="S'inscrire">
        </form>
    </body>
</html>