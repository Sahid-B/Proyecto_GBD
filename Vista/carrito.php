<?php
include 'header.php';

// Datos de ejemplo para el carrito. En una aplicación real, esto se manejaría con sesiones.
$carrito = [
    [
        'id' => 3,
        'titulo' => 'Red Dead Redemption 2',
        'precio' => 49.99,
        'cantidad' => 1,
        'subtotal' => 49.99
    ],
    [
        'id' => 5,
        'titulo' => 'Stardew Valley',
        'precio' => 14.99,
        'cantidad' => 2,
        'subtotal' => 29.98
    ]
];

$total = array_sum(array_column($carrito, 'subtotal'));
?>

<h2 class="mb-4">Carrito de Compras</h2>

<?php if (!empty($carrito)): ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($carrito as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['titulo']); ?></td>
            <td>$<?php echo number_format($item['precio'], 2); ?></td>
            <td>
                <input type="number" class="form-control" value="<?php echo $item['cantidad']; ?>" min="1" style="width: 70px;">
            </td>
            <td>$<?php echo number_format($item['subtotal'], 2); ?></td>
            <td>
                <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="row">
    <div class="col-md-6">
        <a href="catalogo.php" class="btn btn-secondary">Seguir Comprando</a>
    </div>
    <div class="col-md-6 text-right">
        <h3>Total: $<?php echo number_format($total, 2); ?></h3>
        <a href="#" class="btn btn-success">Proceder al Pago</a>
    </div>
</div>
<?php else: ?>
    <div class="alert alert-info">
        Tu carrito está vacío. ¡<a href="catalogo.php">Explora nuestros juegos</a>!
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
