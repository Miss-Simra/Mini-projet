<?php

$host = 'localhost';
$dbname = 'bibliotheque';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = $_POST['identifiant'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';

    if (!empty($identifiant) && !empty($motdepasse)) {
        // Recherche de l'utilisateur par identifiant
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE identifiant = :identifiant");
        $stmt->execute(['identifiant' => $identifiant]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            // Vérification du mot de passe
            if (password_verify($motdepasse, $utilisateur['motdepasse'])) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['identifiant'] = $utilisateur['identifiant'];
                header('Location: ../index.php'); // Redirection après connexion
                exit;
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Identifiant introuvable.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form class="ajout-form" method="post" action="connexion.php"> 
        <label for="identifiant">Identifiant :</label>
        <input type="text" id="identifiant" name="identifiant" required>
        <br><br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required>
        <br><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>