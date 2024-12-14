<?php
session_start();

// Connexion à la base de données
$host = 'localhost';
$dbname = 'bibliotheque';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    header('Location: connexion.php');
    exit();
}

// Récupérer l'ID de l'utilisateur connecté
$utilisateur_id = $_SESSION['utilisateur_id'];

// Récupérer les commandes de l'utilisateur
$commande_stmt = $pdo->prepare("
    SELECT c.id_commande, l.titre_livre, l.auteur, c.prix, c.date_debut_cmd, c.date_fin_cmd
    FROM commande c
    JOIN livres l ON c.id_livre = l.id
    WHERE c.id_utilisateur = :id_utilisateur
");
$commande_stmt->execute(['id_utilisateur' => $utilisateur_id]);
$commandes = $commande_stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les emprunts de l'utilisateur
$emprunt_stmt = $pdo->prepare("
    SELECT e.id_emprunt, l.titre_livre, l.auteur, e.date_debut_emprunt, e.date_fin_emprunt
    FROM emprunt e
    JOIN livres l ON e.id_livre = l.id
    WHERE e.id_utilisateur = :id_utilisateur
");
$emprunt_stmt->execute(['id_utilisateur' => $utilisateur_id]);
$emprunts = $emprunt_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes et Emprunts</title>
</head>
<body>
    <h1>Résumé des Commandes et Emprunts</h1>

    <h2>Commandes</h2>
    <?php if (count($commandes) > 0): ?>
        <table border="1">
            <tr>
                <th>Titre du Livre</th>
                <th>Auteur</th>
                <th>Prix</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
            </tr>
            <?php foreach ($commandes as $commande): ?>
                <tr>
                    <td><?= htmlspecialchars($commande['titre_livre']) ?></td>
                    <td><?= htmlspecialchars($commande['auteur']) ?></td>
                    <td><?= htmlspecialchars($commande['prix']) ?> €</td>
                    <td><?= htmlspecialchars($commande['date_debut_cmd']) ?></td>
                    <td><?= htmlspecialchars($commande['date_fin_cmd']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucune commande enregistrée.</p>
    <?php endif; ?>

    <h2>Emprunts</h2>
    <?php if (count($emprunts) > 0): ?>
        <table border="1">
            <tr>
                <th>Titre du Livre</th>
                <th>Auteur</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
            </tr>
            <?php foreach ($emprunts as $emprunt): ?>
                <tr>
                    <td><?= htmlspecialchars($emprunt['titre_livre']) ?></td>
                    <td><?= htmlspecialchars($emprunt['auteur']) ?></td>
                    <td><?= htmlspecialchars($emprunt['date_debut_emprunt']) ?></td>
                    <td><?= htmlspecialchars($emprunt['date_fin_emprunt']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun emprunt enregistré.</p>
    <?php endif; ?>

    <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>


<!-- EXEMPLE UTILISATEUR :  -->

<!-- Mon compte Utilisateur 1 -->

<!-- Emprunts : -->

<!-- - Les fleurs du Mal - Baudelaire - 1900 -->
<!-- Date début emprunt : 10/11/24 -->
<!-- Date fin emprunt : 17/11/24 -->

<!-- Commandes : -->

<!-- - Les fleurs du Mal - Baudelaire - 1900 -->
<!-- Date début emprunt : 10/11/24 -->
<!-- Date fin emprunt : 17/11/24 -->

<!-- EXEMPLE ADMIN : -->

<!-- Mon compte Administrateur A -->

<!-- Emprunts : -->

<!-- - Les fleurs du Mal - Baudelaire - 1900 -->
<!-- Date début emprunt : 10/11/24 -->
<!-- Date fin emprunt : 17/11/24 -->

<!-- Commandes : -->

<!-- - Les fleurs du Mal - Baudelaire - 1900 -->
<!-- Date début emprunt : 10/11/24 -->
<!-- Date fin emprunt : 17/11/24 -->