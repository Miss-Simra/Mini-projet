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