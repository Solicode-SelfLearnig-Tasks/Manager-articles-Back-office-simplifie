<?php
require 'connexion.php';

echo "<h2>--- METHOD 1 ---</h2>";
try {
    $sql = "INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => 'Mohamed',
        'email' => 'mohamed@gmail.com'
    ]);
    echo "User Mohamed added.<br>";
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br>";
}

echo "<h2>--- METHOD 2 ---</h2>";
try {
    $nom = 'Oussama';
    $email = 'oussama@test.com';
    $sql = "INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    echo "User Oussama added.<br>";
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br>";
}

echo "<h2>--- SELECT ---</h2>";
try {
    $sql = "SELECT * FROM Utilisateur WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => 'mohamed@gmail.com']);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "User : <strong>" . $user['nom'] . "</strong> (" . $user['email'] . ")<br>";
    } else {
        echo "No user found.<br>";
    }
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br>";
}
?>