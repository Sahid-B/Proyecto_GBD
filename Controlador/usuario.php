<?php
// This script is intended to be included by a view file
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once '../Modelo/database.php';

function get_user_data($id_usuario) {
    $database = new Database();
    $conn = $database->connect();

    try {
        $query = "SELECT nombre, correo, rol, last_login FROM usuarios WHERE id_usuario = :id_usuario";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    } catch (PDOException $e) {
        // In a real app, you'd log this error.
        return null;
    }
}

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../Vista/login.php");
    exit();
}

$user_data = get_user_data($_SESSION['id_usuario']);

if ($user_data === null) {
    // Handle user not found, maybe log them out
    session_destroy();
    header("Location: ../Vista/login.php?error=2"); // User data not found
    exit();
}
?>
