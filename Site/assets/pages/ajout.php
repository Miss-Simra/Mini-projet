<?php
    // Charge le fichier pour se connecter à la bdd
	include '../../inc.connexion.php';

    //insertion des données 
    // ajouté un nouveau livre
    $requete = $bdd->prepare('INSERT INTO livres (auteur, titre_livre, annee_publication, livre_populaire) VALUES (:auteur, :titre_livre, :annee_publication, :livre_populaire)');
    $requete->execute(array(
        'auteur' => $_POST['nouvel_auteur'],
        'titre_livre' => $_POST['nouveau_titre'],
        'annee_publication' => $_POST['nouvelle_annee'],
        'livre_populaire' => $_POST['livre_populaire'],
    ));
    echo 'Le nouveau livre a été ajouté dans la table \'livres\'.';
    $requete->closeCursor();

    // ajouté un nouvel utilisateur 
    $requete=$bdd->prepare('INSERT INTO utilisateur (identifiant, mot_de_passe) VALUES (:identifiant, :mot_de_passe)');
    $requete->execute(array(
        'identifiant'=>$_POST['nouvel_identifiant'],
        'mot_de_passe'=>$_POST['nouveau_mot_de_passe'],
    ));
    echo 'Le nouvel utilisateur a été ajouté dans la table \'utilisateurs\'.';$requete->closeCursor();

    // ajouté un nouvel emprunt
    $requete = $bdd->prepare('INSERT INTO emprunt (id_utilisateur, id_livre, date_debut_emprunt, date_fin_emprunt) VALUES (:id_utilisateur, :id_livre, :date_debut_emprunt, :date_fin_emprunt)');
    $requete->execute(array(
        'id_utilisateur' => $_POST['utilisateur'],
        'id_livre' => $_POST['livre'],
        'date_debut_emprunt' => $_POST['nouvelle_date_debut'],
        'date_fin_emprunt' => $_POST['nouvelle_date_fin'],
    ));
    echo 'Le nouvel emprunt a été ajouté dans la table \'emprunt\'.';
    $requete->closeCursor();

    // ajouté une nouvelle commande
    $requete = $bdd->prepare('INSERT INTO commande (id_utilisateur, id_livre, date_debut_commande, date_fin_commande) VALUES (:id_utilisateur, :id_livre, :date_debut_commande, :date_fin_commande)');
    $requete->execute(array(
        'id_utilisateur' => $_POST['utilisateur'],
        'id_livre' => $_POST['livre'],
        'date_debut_commande' => $_POST['nouvelle_date_debut'],
        'date_fin_commande' => $_POST['nouvelle_date_fin'],
    ));
    echo 'La nouvelle commande a été ajouté dans la table \'commande\'.';
    $requete->closeCursor();
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
    <title>Ajout d'un livre ou d'un utilisateur</title>
</head>
<body>

<!-- Ajout : livres -->
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

<!-- Ajout emprunt -->
    <form class="ajout-form" method="post" action="ajout.php"> 
    <h1>Ajouter un nouvel emprunt </h1>
        <label for="utilisateur">Utilisateur :</label>
        <input type="number" id="utilisateur" name="utilisateur" placeholder="  ID de l'utilisateur" required>
        <br><br>
        <label for="livre">Livre :</label>
        <input type="number" id="livre" name="livre" placeholder="ID du livre" required>
        <br><br>
        <label for="date-debut-emprunt">Date de début  :</label>
        <input type="date" id="date-debut-emprunt" name="date-debut-emprunt" required>
        <br><br>
        <label for="date-fin-emprunt">Date de fin  :</label>
        <input type="date" id="date-fin-emprunt" name="date-fin-emprunt" required>
		<br><br>
        <button type="submit">Ajouter le nouvel emprunt</button>
    </form>

<!-- Ajout commande -->
    <form class="ajout-form" method="post" action="ajout.php"> 
    <h1>Ajouter une nouvelle commande </h1>
        <label for="utilisateur">Utilisateur :</label>
        <input type="number" id="utilisateur" name="utilisateur" placeholder="  ID de l'utilisateur" required>
        <br><br>
        <label for="livre">Livre :</label>
        <input type="number" id="livre" name="livre" placeholder="ID du livre" required>
        <br><br>
        <label for="date-debut-commande">Date de début  :</label>
        <input type="date" id="date-debut-commande" name="date-debut-commande" required>
        <br><br>
        <label for="date-fin-commande">Date de fin  :</label>
        <input type="date" id="date-fin-commande" name="date-fin-commande" required>
		<br><br>
        <button type="submit">Ajouter la nouvelle commande</button>
    </form>

<!-- Ajout : nouvel utilisateur -->
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