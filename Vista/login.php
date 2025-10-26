<?php include 'header.php'; ?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2>Iniciar Sesión</h2>
        <form action="../Controlador/login.php" method="POST">
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
