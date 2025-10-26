<?php include 'header.php'; ?>

<h2 class="mb-4">Agregar Nuevo Juego</h2>

<form action="../Controlador/agregar_juego.php" method="POST">
    <div class="form-group">
        <label for="titulo">Título del Juego</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej: The Last of Us Part II" required>
    </div>
    <div class="form-group">
        <label for="genero">Género</label>
        <input type="text" class="form-control" id="genero" name="genero" placeholder="Ej: Aventura, Acción" required>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" placeholder="Ej: 59.99" required>
        </div>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" min="0" placeholder="Ej: 100" required>
    </div>
    <div class="form-group">
        <label for="id_vendedor">ID del Vendedor</label>
        <input type="text" class="form-control" id="id_vendedor" name="id_vendedor" value="1" readonly>
        <small class="form-text text-muted">Este campo se asignaría automáticamente en un sistema real.</small>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Juego</button>
</form>

<?php include 'footer.php'; ?>
