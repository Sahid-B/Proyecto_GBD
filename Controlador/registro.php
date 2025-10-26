<?php
include_once '../Modelo/database.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    // Hash the password for security
    $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

    try {
        $query = "INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (:nombre, :correo, :contraseña, :rol)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contraseña', $hashed_password);
        $stmt->bindParam(':rol', $rol);

        if ($stmt->execute()) {
            header("Location: ../Vista/login.php?success=1");
            exit();
        } else {
            header("Location: ../Vista/registro.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        // Check for duplicate email
        if ($e->errorInfo[1] == 1062) {
            header("Location: ../Vista/registro.php?error=2"); // Duplicate email
        } else {
            header("Location: ../Vista/registro.php?error=1");
        }
        exit();
    }
}
?>
