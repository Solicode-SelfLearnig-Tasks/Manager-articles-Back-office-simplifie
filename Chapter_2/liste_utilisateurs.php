<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs - Chapitre 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Liste des Utilisateurs</h1>

    <?php
    require 'connexion.php';

    try {

        $sql = "SELECT * FROM Utilisateur";
        $stmt = $pdo->query($sql);

        $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($utilisateurs) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th> <th>Nom</th> <th>Email</th></tr>";
            foreach ($utilisateurs as $user) {
                echo "<tr>";
                echo "<td>" . $user['id'] . "</td>";
                echo "<td>" . htmlspecialchars($user['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Aucun utilisateur trouvé dans la base de données.</p>";
        }

    } catch (PDOException $e) {
        echo "<div class='error'>Erreur lors de la récupération des données : " . $e->getMessage() . "</div>";
    }
    ?>

</body>

</html>