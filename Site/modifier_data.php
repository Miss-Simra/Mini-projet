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
	
	// On modifie des données dans une BDD avec la requête UPDATE
	$requete = $bdd->prepare('UPDATE bibliotheque SET annee = :nouvelle_annee WHERE titre = :titre');
	$requete->execute(array(
		'titre' => $_POST['titre_modif'],
		'nouvelle_annee' => $_POST['annee_modif']
		));
	echo 'L\'année de publication du livre a été modifiée dans la table \'bibliotheque\'.';
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