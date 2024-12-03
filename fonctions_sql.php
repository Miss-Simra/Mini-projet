<!DOCTYPE HTML>
<html>
  <head>
    <title>UE L204 - Exemples de dialogue avec une base de données via PHP</title>
    <meta charset="utf-8"/>
	<style>
		.fieldset{width:800px;border:1px solid black;}
	</style>
  </head>
<body>
	<fieldset class="fieldset">
		<legend><strong>Affichage du résultat de la requête</strong></legend>
	<?php
	// On charge le fichier permettant de se connecter à la bdd
	include 'inc.connexion.php';
	
	// 1 - Exemple de fonctions scalaire (UPPER)
	$requete = $bdd->query('SELECT UPPER(auteur) as auteur_maj FROM bibliotheque');
	// Attention, il n'y a pas de modification dans la BDD. Par contre, il y a des modifications lors du retour en PHP.
	echo 'Fonction scalaire UPPER :<br><br>';
	while ($data = $requete->fetch())
	{	
		echo 'Auteur : '.$data['auteur_maj'].'.<br>';
	}
	echo '<br>';
	$requete->closeCursor();
	
	// 2 - Exemples de fonctions d'agrégat 
	// 2.1 - Calcul du nombre moyen d'exemplaires par livre via la fonction SQL AVG (pour average => moyenne en Anglais)
	// $requete = $bdd->query('SELECT AVG(exemplaires) AS exemplaires_moyen FROM bibliotheque');
	$requete = $bdd->query('SELECT AVG(exemplaires) AS exemplaires_moyen FROM bibliotheque WHERE auteur=\'Hugo\'');
	$data = $requete->fetch(); // Pas besoin de boucle ici car la requête ne retournera qu'une seule valeur.
	echo 'Fonction d\'agrégat AVG :<br><br>';
	echo 'Le nombre moyen d\'exemplaires est de '.round($data['exemplaires_moyen'],1).' pour les livres de Victor Hugo.<br><br>';
	$requete->closeCursor();
	
	// 2.2 - Calcul du nombre moyen d'exemplaires par livre et par auteur !
	$requete = $bdd->query('SELECT AVG(exemplaires) AS exemplaires_moyen_auteur, auteur FROM bibliotheque GROUP BY auteur');
	while ($data = $requete->fetch())
	{	
		echo 'Le nombre moyen d\'exemplaires est de '.round($data['exemplaires_moyen_auteur'],1).' pour les livres de '.$data['auteur'].'.<br>';
	}
	$requete->closeCursor();
	?>
	</fieldset>
	<br><br>
	<fieldset class="fieldset">
		<form method="post" action="index.php">
			<input type="submit" value="Retour à la page d'accueil">
		</form>
	</fieldset>
</body>
</html>