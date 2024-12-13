<?php

session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
    header('Location: connexion.php');
    exit;
}

$role=$_SESSION['role'];
?>

<!-- RECAP : EMPRUNTS & COMMANDES -->

<?php

$sql_emprunts = "
    SELECT e.id_emprunt, u.id_utilisateur AS utilisateur, l.titre AS livre, e.date_debut_emprunt, e.date_fin_emprunt
    FROM emprunt e
    JOIN utilisateurs u ON e.id_utilisateur = u.id_utilisateur
    JOIN livre l ON e.id_livre = l.id_livre
";
$result_emprunts = $conn->query($sql_emprunts);

$sql_commandes = "
    SELECT c.id_commande, u.id_utilisateur AS utilisateur, l.titre AS livre, c.prix, c.date_debut_cmd, c.date_fin_cmd
    FROM commande c
    JOIN utilisateurs u ON c.id_utilisateur = u.id_utilisateur
    JOIN livre l ON c.id_livre = l.id_livre
";
$result_commandes = $conn->query($sql_commandes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php $role === 'admin' ? 'Mon compte administrateur' : 'Mon compte utilisateur'; ?>
    </title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1><?php $role === 'admin' ? 'Mon compte administrateur' : 'Mon compte utilisateur'; ?></h1>
        <p>Bienvenue sur votre espace</p>
    </header>
    
    <div>

        <!-- Section Emprunts -->
        
        <div>
            <h2>Emprunts</h2>
            <?php
            // Vérifie si les données ont été trouvés
            if ($result_emprunts->num_rows > 0) {
                // Prend chaque emprunt et la met dans une variable $row
                while($row = $result_emprunts->fetch_assoc()) {
                    echo '<p><strong>Utilisateur :</strong> ' . $row['utilisateur'] . '</p>';
                    echo '<p><strong>Titre :</strong> ' . $row['livre'] . '</p>';
                    echo '<p><strong>Date de début emprunt :</strong> ' . $row['date_debut_emprunt'] . '</p>';
                    echo '<p><strong>Date de fin emprunt :</strong> ' . $row['date_fin_emprunt'] . '</p>';
                }
            } else {
                echo "<p>Aucun emprunt trouvé.</p>";
            }
            ?>
        </div>

        <!-- Section Commandes -->
        
        <div>
            <h2>Commandes</h2>
            <?php
            if ($result_commandes->num_rows > 0) {
                while($row = $result_commandes->fetch_assoc()) {
                    echo '<p><strong>Utilisateur :</strong> ' . $row['utilisateur'] . '</p>';
                    echo '<p><strong>Titre :</strong> ' . $row['livre'] . '</p>';
                    echo '<p><strong>Prix :</strong> ' . $row['prix'] . ' €</p>';
                    echo '<p><strong>Date de début commande :</strong> ' . $row['date_debut_cmd'] . '</p>';
                    echo '<p><strong>Date de fin commande :</strong> ' . $row['date_fin_cmd'] . '</p>';
                }
            } else {
                echo "<p>Aucune commande trouvée.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
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
