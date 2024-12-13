<?php
// Charge le fichier pour se connecter à la bdd
include '../../inc.connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['searchQuery'])) {
    $searchQuery = htmlspecialchars($_POST['searchQuery']);

    // Connexion à la BD
    $dsn = 'mysql:host=localhost;dbname=bibliotheque;charset=utf8';
    $username = 'root';
    $password = '';
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion : ' . $e->getMessage());
    }

    // Recherche par titre/auteur
    $query = "SELECT titre, auteur, annee_publication, populaire FROM livres 
              WHERE titre LIKE :search OR auteur LIKE :search";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':search' => '%' . $searchQuery . '%']);

    // Affichage le résultat de la recherche par titre/auteur/année de publication/populaire
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['titre']}</td>
                <td>{$row['auteur']}</td>
                <td>{$row['annee_publication']}</td>
                <td>" . ($row['populaire'] ? 'Oui' : 'Non') . "</td>
              </tr>";
    }
    // Gestion d'erreurs de connexion
    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
    // Si il n'y a aucun résultat associé
    if (empty($results)) {
        echo "<tr><td colspan='4'>Aucun résultat trouvé</td></tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Recherche de Livres</title>
</head>

<body>
    <h1>Retrouvez vos livres préférés</h1>
    <form class="ajout-form" method="GET" action="recherche.php">
        <label for="search">Rechercher un livre :</label>
        <input type="text" id="search" name="search" placeholder="Titre ou Auteur" required>
        <button type="submit">Rechercher</button>
    </form>
    </section>
    <div class="search-bubble">
        <form method="POST" action="">
            <input type="text" name="searchQuery" placeholder="Rechercher un livre..." required>
            <button type="submit">🔍</button>
        </form>
    </div>

    <!-- Résultats de la recherche -->
    <div class="search-results">
        <?php if (!empty($errorMessage)): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <?php if (!empty($results)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Année de Publication</th>
                        <th>Populaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['titre']); ?></td>
                            <td><?php echo htmlspecialchars($row['auteur']); ?></td>
                            <td><?php echo htmlspecialchars($row['annee_publication']); ?></td>
                            <td><?php echo $row['populaire'] ? 'Oui' : 'Non'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</body>

</html>