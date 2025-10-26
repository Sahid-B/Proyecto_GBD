<?php
include 'header.php';

// Datos de ejemplo del historial de compras. En una aplicación real, esto vendría de la BD.
$historial_compras = [
    [
        'id_transaccion' => 'TXN12345',
        'fecha' => '2025-10-20 14:30:00',
        'total' => 79.98,
        'detalles' => [
            ['titulo' => 'Cyberpunk 2077', 'cantidad' => 1, 'subtotal' => 39.99],
            ['titulo' => 'The Witcher 3: Wild Hunt', 'cantidad' => 1, 'subtotal' => 39.99]
        ]
    ],
    [
        'id_transaccion' => 'TXN67890',
        'fecha' => '2025-09-15 18:00:00',
        'total' => 14.99,
        'detalles' => [
            ['titulo' => 'Hollow Knight', 'cantidad' => 1, 'subtotal' => 14.99]
        ]
    ]
];
?>

<h2 class="mb-4">Mi Historial de Compras</h2>

<?php if (!empty($historial_compras)): ?>
    <?php foreach ($historial_compras as $compra): ?>
        <div class="card mb-4">
            <div class="card-header">
                <strong>ID de Transacción:</strong> <?php echo htmlspecialchars($compra['id_transaccion']); ?> |
                <strong>Fecha:</strong> <?php echo htmlspecialchars($compra['fecha']); ?>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Juego</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($compra['detalles'] as $detalle): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($detalle['titulo']); ?></td>
                                <td><?php echo htmlspecialchars($detalle['cantidad']); ?></td>
                                <td>$<?php echo number_format($detalle['subtotal'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                <h5>Total de la Compra: $<?php echo number_format($compra['total'], 2); ?></h5>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-info">
        Aún no has realizado ninguna compra. ¡<a href="catalogo.php">Explora nuestros juegos</a>!
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>
