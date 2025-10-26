<?php
include '../Controlador/usuario.php'; // This handles session and user data fetching
include 'header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h2>Panel de Usuario</h2>
        <table class="table table-bordered">
            <tr>
                <th>Nombre</th>
                <td><?php echo htmlspecialchars($user_data['nombre']); ?></td>
            </tr>
            <tr>
                <th>Correo</th>
                <td><?php echo htmlspecialchars($user_data['correo']); ?></td>
            </tr>
            <tr>
                <th>Rol</th>
                <td><?php echo htmlspecialchars($user_data['rol']); ?></td>
            </tr>
            <tr>
                <th>Último Inicio de Sesión</th>
                <td><?php echo htmlspecialchars($user_data['last_login']); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-4">
        <h3>Acciones</h3>
        <a href="../Controlador/logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>
</div>


<?php include 'footer.php'; ?>
