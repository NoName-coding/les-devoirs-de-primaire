<?php
    session_start();
    include 'utils.php';
    
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header('Location: login.php');
        exit;
    }

    $conn = new mysqli("localhost", "root", "", "les_devoirs_de_primaire");
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    $sql = "SELECT * FROM results WHERE user_id=".$user['id'];
    $results = $conn->query($sql);
    $conn->close();
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Profil</title>
    </head>
    <body>
        <h1>Profil de <?php echo $user['username']; ?></h1>
        <p>Rôle: <?php echo $user['role']; ?></p>
        <h2>Résultats des exercices</h2>
        <?php 
        ?>
        <table border="1">
            <tr>
                <th>Exercice</th>
                <th>Score</th>
                <th>Date</th>
            </tr>
            <?php while($row = $results->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['exercise']; ?></td>
                <td><?php echo $row['score']; ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>