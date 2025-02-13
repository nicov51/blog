<?php
$envFile = __DIR__ . '/.env';

//transfo le .env en tableau associatif
if (file_exists($envFile)) {
    $envVariables = parse_ini_file($envFile);

    $host = $envVariables['DB_HOST'];
    $dbname = $envVariables['DB_NAME'];
    $username = $envVariables['DB_USER'];
    $password = $envVariables['DB_PASS'];
} else {
    die("Fichier .env introuvable.");
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>