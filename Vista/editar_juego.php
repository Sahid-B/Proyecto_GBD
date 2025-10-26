<?php
include 'header.php';

// Datos de ejemplo de un juego para editar. En una aplicación real, estos datos se obtendrían de la BD.
$juego_a_editar = [
    'id_juego' => 1,
    'titulo' => 'The Witcher 3: Wild Hunt',
    'genero' => 'RPG',
    'precio' => '29.99',
    'stock' => '50'
];
?>

<h2 class="mb-4">Editar Juego: <?php echo htmlspecialchars($juego_a_editar['titulo']); ?></h2>

<form action="../Controlador/editar_juego.php" method="POST">
    <input type="hidden" name="id_juego" value="<?php echo $juego_a_editar['id_juego']; ?>">
    <div class="form-group">
        <label for="titulo">Título del Juego</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($juego_a_editar['titulo']); ?>" required>
    </div>
    <div class="form-group">
        <label for="genero">Género</label>
        <input type="text" class="form-control" id="genero" name="genero" value="<?php echo htmlspecialchars($juego_a_editar['genero']); ?>" required>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" value="<?php echo htmlspecialchars($juego_a_editar['precio']); ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" min="0" value="<?php echo htmlspecialchars($juego_a_editar['stock']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="catalogo.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php include 'footer.php'; ?>
