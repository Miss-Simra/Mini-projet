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
    echo 'Le nouveau livre a été ajouté dans la table '\'livre\'.';$requete->closeCursor();

    // ajouté un nouvel utilisateur 
    $requete=$bdd->prepare('INSERT INTO utilisateur (identifiant, mot_de_passe) VALUES (:identifiant, :mot_de_passe,)');
    $requete->execute(array(
        'identifiant'=>$_POST['nouvel_identifiant'],
        'mot_de_passe'=>$_POST['nouveau_mot_de_passe'],
    ));
    echo 'Le nouvel utilisateur a été ajouté dans la table '\'utilisateur\'.';$requete->closeCursor();
?>