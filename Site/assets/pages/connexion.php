<?php

session_start();
// Démarre la session


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Récupération des données username + password
	$identifiant = $_POST['identifiant'] ?? '' ;
	$motdepasse = $_POST['motdepasse'] ?? '' ;
	
	if (!empty($identifiant) && !empty($motdepasse)) {
		// Recherche de l'utilisateur
		$stmt = $pdo->prepare("SELECT * FROM utilisateurs");
		$utilisateur = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($utilisateur && password_verify($motdepasse,$utilisateur['motdepasse'])) {
            // Vérification du mot de passe
            $_SESSION['loggedIn']=true;
            $_SESSION['role']=$utilisateur['role'];
            $_SESSION['identifiant']=$utilisateur['identifiant'];
            header('Location: ../index.php');
            exit;
            echo "Connexion réussie. Bienvenue, " . htmlspecialchars($identifiant) . "!";
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Identifiant introuvable.";
    }
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