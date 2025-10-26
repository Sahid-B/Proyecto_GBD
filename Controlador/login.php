<?php
session_start();
include_once '../Modelo/database.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    try {
        $query = "SELECT id_usuario, nombre, contraseña, rol FROM usuarios WHERE correo = :correo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_usuario = $row['id_usuario'];
            $hashed_password = $row['contraseña'];

            if (password_verify($contraseña, $hashed_password)) {
                // Update last_login timestamp
                $update_query = "UPDATE usuarios SET last_login = NOW() WHERE id_usuario = :id_usuario";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bindParam(':id_usuario', $id_usuario);
                $update_stmt->execute();

                $_SESSION['id_usuario'] = $id_usuario;
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['rol'] = $row['rol'];

                header("Location: ../Vista/panel.php");
                exit();
            } else {
                header("Location: ../Vista/login.php?error=1");
                exit();
            }
        } else {
            header("Location: ../Vista/login.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
