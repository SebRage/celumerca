<?php
// Conexión a la base de datos
$host = "127.0.0.1";
$dbname = "merca";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los productos
    $query = "SELECT * FROM productos WHERE id_producto IN (6, 5, 7)";
    $stmt = $pdo->query($query);

    // Almacenar los resultados
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
