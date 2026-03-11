<?php
$host = 'localhost';
$dbname = 'blogdb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("[" . date('Y-m-d H:i:s') . "] Connection Error: " . $e->getMessage() . PHP_EOL, 3, "errors.log");
    die("A connection error occurred. Please try again later.");
}
?>
