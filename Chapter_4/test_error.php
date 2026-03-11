<?php


require_once 'connexion.php';

try {
    
    echo "Tentative de sélection sur une table inexistante...<br>";
    $pdo->query("SELECT * FROM Utilisateur");
} catch (PDOException $e) {

    echo "Erreur SQL attrapée : " . $e->getMessage() . "<br>";
    file_put_contents('erreurs.log', "[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "Une erreur est survenue lors de la première  requête. L'erreur a été enregistrée dans 'erreurs.log'. <br>";
}

try {
    
    $pdo->query("SELECT * FROM articles");
} catch (PDOException $e) {
   
    file_put_contents('erreurs.log', "[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . PHP_EOL, FILE_APPEND);
    echo "Une erreur est survenue lors de la deuxième requête. L'erreur a été enregistrée dans 'erreurs.log'.";
}
?>