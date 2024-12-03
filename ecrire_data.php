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
	
	// On insère des données dans une BDD avec la requête INSERT INTO
	$requete = $bdd->prepare('INSERT INTO bibliotheque (auteur, titre, annee, exemplaires) VALUES (:auteur, :titre, :annee, :exemplaires)');
	// On indique ensuite les paramètres dans le même ordre
	$requete->execute(array(
		'auteur' => $_POST['nouvel_auteur'],
		'titre' => $_POST['nouveau_titre'],
		'annee' => $_POST['annee_publication'],
		'exemplaires' => $_POST['nombre_exemplaires']
		));
	echo 'Le nouveau livre a été ajouté dans la table \'bibliotheque\'.';
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