<?php
if ($SERVER['REQUEST_METHOD'] === 'POST') {
	// Récupération des données username + password
	$username = $_POST['identifiant'] ?? '' ;
	$password = $_POST['motdepasse'] ?? '' ;
	
	if (!empty($identifiant) && !empty($motdepasse)) {
		// Recherche de l'utilisateur
		$stmt = $pdo->prepare("SELECT * FROM utilisateurs");
		$utilisateur = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Je continuerai plus tard ce truc me fout un mal de crâne MDR
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="" method="post">
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
