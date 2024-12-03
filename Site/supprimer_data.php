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
	
	// On supprime des données dans une BDD avec la requête DELETE
	$requete = $bdd->prepare('DELETE FROM bibliotheque WHERE titre = :livre_supp');
	// A noter que la commande 'DELETE FROM bibliotheque' supprime toutes les entrées de la table !
	$requete->execute(array(
		'livre_supp' => $_POST['livre_suppression']
		));
	echo 'Les données relatives au livre \''.$_POST['livre_suppression'].'\' ont bien été supprimées dans la table \'bibliotheque\'.';
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