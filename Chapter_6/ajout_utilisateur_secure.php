<?php
require 'connexion.php';

$name = "  Mohamed  ";
$email = "mohamed@gmail.com";

echo "<h2>--- Security Best Practices ---</h2>";

try {
    $name = htmlspecialchars(trim($name));
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!$email) {
        die("Invalid email format!");
    }

    $sql = "INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $name,
        'email' => $email
    ]);

    echo "User added successfully with clean data.<br>";

} catch (PDOException $e) {
    file_put_contents('errors.log', "[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    
    echo "Something went wrong. Please check the logs.";
}
?>
