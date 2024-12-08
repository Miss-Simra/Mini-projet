<?php
	
	// /*
	// 	Fonction hasArticleInSession
	// 	Fonction permettant de déterminer si
	// 	des articles sont présents en SESSION
	// */
	// function hasArticleInSession(){
	// 	if($_SESSION 
	// 		&& count($_SESSION) 
	// 			&& array_key_exists('articles', $_SESSION)
	// 				&& gettype($_SESSION['articles']) === 'array'
	// 					&& count($_SESSION['articles'])){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	// /*
	// 	Fonction addArticleToSession
	// 	Permet d'ajouter un article 
	// 	en session
	// */
	// function addArticleToSession($title, $image, $price, $ref){
	// 	if(!hasArticleInSession()){
	// 		$_SESSION['articles'] = array();
	// 	}

	// 	$_article = array(
	// 		'title' =>	htmlspecialchars($title),
	// 		'image' =>	htmlspecialchars($image),
	// 		'price' =>	htmlspecialchars($price),
	// 		'ref'   =>	htmlspecialchars($ref),
	// 	);

	// 	array_push($_SESSION['articles'], $_article);

	// }

	// /*
	// 	Fonction deleteAllArticles
	// 	Permet de supprimer les articles stockés en session
	// */
	// function deleteAllArticles(){
	// 	$_SESSION['articles'] = array();
	// }

	// /*
	// 	Fonction isConnecte
	// 	Permet de vérifier qu'un utilisateur est connecté
	// 	à partir de la SESSION
	//  */
	// function isConnecte(){
	// 	if($_SESSION 
	// 		&& count($_SESSION) 
	// 			&& array_key_exists('login', $_SESSION)
	// 				&& !empty($_SESSION['login'])){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	// /*
	// 	Fonction setConnecte
	// 	Connecte un utilisateur selon les paramètres transmis
	// 	et les stock dans la SESSION
	//  */
	// function setConnecte($login, $mdp){
	// 	$_SESSION['login']	=	$login;
	// 	$_SESSION['mdp']	=	$mdp;
	// }

	// /*
	// 	Fonction setDeconnecte
	// 	Déconnecte un utilisateur en supprimant 
	// 	les données en SESSION
	//  */	
	// function setDeconnecte(){
	// 	session_destroy();
	// 	unset($_SESSION);
	// 	header('Location: ../index.php');
	// 	exit;
	// }

	// /*
	// 	Fonction addMessageAlert
	// 	Ajoute un message en session qui sera affiché 
	// */
	// function adddMessageAlert($msg = ""){
	// 	if(!array_key_exists('msg', $_SESSION)){
	// 		$_SESSION['msg'] = "";
	// 	}

	// 	$_SESSION['msg'] .= $msg." ";
	// }

	// /*
	// 	Fonction lireEtSupprimeMessageSession
	// 	Affiche un message en session et le supprime 
	// 	après affichage
	// */
	// function lireEtSupprimeMessageSession(){
	// 	if(array_key_exists('msg', $_SESSION)){
	// 		echo '<div class="alert alert-info text-justify"><p>'.$_SESSION['msg'].'</p></div>';
	// 		unset($_SESSION['msg']);
	// 	}
	// }

	// function getArticleInfoFromJson($id_article){
	// 	$contenu_fichier = file_get_contents('articles.json');
	// 	$_articles       = json_decode($contenu_fichier, true);

	// 	if($_articles && !is_null($_articles) && count($_articles) > 0){
	// 		foreach($_articles as $article){
	// 			if($article['ref'] == $id_article){
	// 				return $article;
	// 			}
	// 		}
	// 	}
	// 	return false;
	// }

?>