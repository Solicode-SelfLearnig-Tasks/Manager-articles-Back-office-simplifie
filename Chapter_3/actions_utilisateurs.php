<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actions Utilisateurs - Chapitre 3</title>
    <link rel="stylesheet" href="../Chapter_2/style.css">
    <style>
        .action-box {
            background: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        .success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 4px;
        }

        .info {
            color: #0c5460;
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>Opérations CRUD (Chapitre 3)</h1>

    <?php
    require 'connexion.php';

    try {
        // --- ÉTAPE 1 : INSERTION ---
        echo "<div class='action-box'><h3>Étape 1 : Insertion</h3>";
        $stmt_insert = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
        $stmt_insert->execute([
            'nom' => 'Charlie',
            'email' => 'charlie@test.com'
        ]);
        echo "<p class='success'>Utilisateur 'Charlie' ajouté avec succès.</p>";
        echo "<p class='info'>" . $stmt_insert->rowCount() . " ligne(s) affectée(s).</p>";
        echo "</div>";

        // --- ÉTAPE 2 : MISE À JOUR ---
        // On suppose que l'ID de Charlie est celui qu'on vient d'insérer ou un ID connu (ex: 3)
        $lastId = $pdo->lastInsertId();
        echo "<div class='action-box'><h3>Étape 2 : Mise à jour</h3>";
        $stmt_update = $pdo->prepare("UPDATE Utilisateur SET email = :email WHERE id = :id");
        $stmt_update->execute([
            'email' => 'charlie.new@test.com',
            'id' => $lastId
        ]);
        echo "<p class='success'>Email de l'utilisateur (ID: $lastId) mis à jour.</p>";
        echo "<p class='info'>" . $stmt_update->rowCount() . " ligne(s) affectée(s).</p>";
        echo "</div>";

        // --- ÉTAPE 3 : SUPPRESSION ---
        echo "<div class='action-box'><h3>Étape 3 : Suppression</h3>";
        $stmt_delete = $pdo->prepare("DELETE FROM Utilisateur WHERE id = :id");
        $stmt_delete->execute(['id' => $lastId]);
        echo "<p class='success'>Utilisateur (ID: $lastId) supprimé.</p>";
        echo "<p class='info'>" . $stmt_delete->rowCount() . " ligne(s) affectée(s).</p>";
        echo "</div>";

    } catch (PDOException $e) {
        echo "<div class='error'>Erreur PDO : " . $e->getMessage() . "</div>";
    }
    ?>

    <p><a href="../Chapter_2/liste_utilisateurs.php">Retour à la liste des utilisateurs</a></p>
</body>

</html>