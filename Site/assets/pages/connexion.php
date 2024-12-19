<?php
$host = 'localhost';
$dbname = 'bibliotheque';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = trim($_POST['identifiant']);
    $motdepasse = trim($_POST['motdepasse']);

    if (!empty($identifiant) && !empty($motdepasse)) {
        $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE identifiant = :identifiant AND motdepasse = :motdepasse');
        $stmt->execute(['identifiant' => $identifiant, 'motdepasse' => $motdepasse]);
        
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur) {
            echo "<p>Connexion réussie ! Bienvenue, " . htmlspecialchars($utilisateur['identifiant']) . ".</p>";
        } else {
            echo "<p>Identifiant ou mot de passe incorrect.</p>";
        }
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
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
<header>
<?php include("../pages/menu.php") ?>
</header>
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