<?php
$host = 'localhost';
$dbname = 'crud_php';
$username = 'root'; // Ou seu usuário de banco de dados
$password = ''; // Ou sua senha de banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit();
}
?>