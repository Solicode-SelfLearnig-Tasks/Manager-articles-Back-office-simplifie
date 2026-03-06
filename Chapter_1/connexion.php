<?php 

$host = "localhost";

$username = "root";

$password ="";

$dbname = "blogdb";


try{
    $pdo = new PDO("mysql:host=$host;dbname=blogdb", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base $dbname";
} catch(PDOException $e){
echo "Error de connexion: ". $e->getMessage();
}

?>