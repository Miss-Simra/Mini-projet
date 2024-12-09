<?php
    //charger le fichier de connexion
    include 'connexion.php';

    //insertion des données 
    // ajouté un nouveau livre
    $requete=$bdd->prepare('INSERT INTO livre (auteur, titre, annee_publication, livre_populaire) VALUES (:auteur, :titre, :annee_publication, :livre_populaire)');
    $requete->execute(array(
        'auteur'=>$_POST['nouvel_auteur'],
        'titre'=>$_POST['nouveau_livre'],
        'annee_publication'=>$_POST['nouvelle_annee'],
        'livre_populaire'=>$_POST['livre_populaire'],
    ));
    echo 'Le nouveau livre a été ajouté dans la table \'livre\'.';$requete->closeCursor();

    // ajouté un nouvel utilisateur 
    $requete=$bdd->prepare('INSERT INTO utilisateur (identifiant, mot_de_passe) VALUES (:identifiant, :mot_de_passe)');
    $requete->execute(array(
        'identifiant'=>$_POST['nouvel_identifiant'],
        'mot_de_passe'=>$_POST['nouveau_mot_de_passe'],
    ));
    echo 'Le nouvel utilisateur a été ajouté dans la table \'utilisateur\'.';$requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style.css">
    <title>Ajout d'un livre ou d'un utilisateur</title>
</head>
<body>
    <form class="ajout-form" method="post" action="ajout.php"> 
    <h1>Ajouter un nouveau livre </h1>
        <label for="nouvel_auteur">Auteur :</label>
        <input type="text" id="nouvel_auteur" name="nouvel_auteur" placeholder="Nom de l'auteur" required>
        <br><br>
        <label for="nouveau_titre">Titre :</label>
        <input type="text" id="nouveau_titre" name="nouveau_titre" placeholder="Titre du livre" required>
        <br><br>
        <label for="nouveau_annee">Année de publication :</label>
        <input type="number" id="nouvelle_annee" name="nouvelle_annee" placeholder="Année de publication" required>
        <br><br>
        <label for="livre_populaire">Livre Populaire : </label>
        <select id="livre_populaire" name="livre_populaire" required>
            <option value="1">Oui</option>
            <option value="2">Non</option>
        </select>
		<br><br>
        <button type="submit">Ajouter le nouveau livre</button>
    </form>

    
    <form class="ajout-form" method="post" action="ajout.php"> 
    <h1>Ajouter de nouvel utilisateur </h1>
        <label for="nouvel_identifiant">Identifiant :</label>
        <input type="text" id="nouvel_identifiant" name="nouvel_identifiant" placeholder="Identifiant de l'utilisateur" required>
        <br><br>
        <label for="nouveau_mot_de_passe">Mot de passe :</label>
        <input type="password" id="nouveau_mot_de_passe" name="nouveau_mot_de_passe" placeholder="Mot de passe" required>
        <br><br>
        <button type="submit">Ajouter le nouvel utilisateur</button>
    </form>
</body>
</html>