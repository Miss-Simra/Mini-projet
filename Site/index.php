<?php
session_start();
$isUserConnected = isset($_SESSION['utilisateur']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-projet : bibliothèque</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="icon" href="assets/images/Icon.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
</head>
<body>
<header>
        <nav class="header-nav">
            <ul class="header-nav-list">
                <li class="header-nav-item"><a class="header-nav-link" href="index.php">Accueil</a></li>
                <li class="header-nav-item"><a class="header-nav-link" href="assets/pages/recherche.php">Recherche</a></li>
                <li class="header-nav-item"><a class="header-nav-link" href="#">Blogs</a></li>
                <li class="header-nav-item"><a class="header-nav-link" href="#">Agenda</a></li>
                <li class="header-nav-item"><a class="header-nav-link" href="#">A découvrir</a></li>
                <li class="header-nav-item"><a class="header-nav-link" href="#">Contact</a></li>
                <!-- <li class="header-nav-item"><a class="header-nav-link" href="assets/pages/ajout.php">Ajout</a></li> -->
                <!-- <?php if ($isUserConnected): ?> -->
                <li class="header-nav-item dropdown">
                    <a class="header-nav-link" href="assets/pages/mon_compte.php">Mon compte</a>
                    <div class="dropdown-content">
                        <a href="assets/pages/mon_compte.php">Mon compte</a>
                        <a href="assets/pages/deconnexion.php">Déconnexion</a>
                    </div>
                </li>
            <!-- <?php else: ?> -->
                <li class="header-nav-item"><a class="header-nav-link" href="assets/pages/connexion.php">Connexion</a></li>
            <!-- <?php endif; ?> -->
        </ul>
        </nav>
    </header>

    <div class="main-introduction">
      <img class="icon-bibliotheque" src="./assets/img/bibliotheque.png" alt="icône bibliothèque ordinateur">
      <h1>Bienvenue sur la Bibliothèque municipale</h1>
      <p>Venez découvrir nos collections de livres ! Un univers dédié à la lecture, à la découverte et à l'apprentissage. </p>
      <p class="introduction">Explorez nos collections, participez à nos ateliers et événements, ou trouvez votre prochain livre préféré dans un espace dédié à la culture et au savoir !</p>
    </div>

    
</body>

</html>