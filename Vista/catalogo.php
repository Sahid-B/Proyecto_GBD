<?php
include 'header.php';

// Datos de ejemplo de videojuegos. En una aplicación real, esto vendría de la base de datos.
$juegos = [
    [
        'titulo' => 'The Witcher 3: Wild Hunt',
        'genero' => 'RPG',
        'precio' => '29.99',
        'imagen' => 'https://placehold.co/600x400/2a2a2a/ffffff?text=The+Witcher+3'
    ],
    [
        'titulo' => 'Cyberpunk 2077',
        'genero' => 'RPG de Acción',
        'precio' => '39.99',
        'imagen' => 'https://placehold.co/600x400/ffed4a/000000?text=Cyberpunk'
    ],
    [
        'titulo' => 'Red Dead Redemption 2',
        'genero' => 'Aventura',
        'precio' => '49.99',
        'imagen' => 'https://placehold.co/600x400/d9534f/ffffff?text=RDR2'
    ],
    [
        'titulo' => 'Elden Ring',
        'genero' => 'Souls-like',
        'precio' => '59.99',
        'imagen' => 'https://placehold.co/600x400/f0ad4e/000000?text=Elden+Ring'
    ],
    [
        'titulo' => 'Stardew Valley',
        'genero' => 'Simulación',
        'precio' => '14.99',
        'imagen' => 'https://placehold.co/600x400/5cb85c/ffffff?text=Stardew'
    ],
    [
        'titulo' => 'Hollow Knight',
        'genero' => 'Metroidvania',
        'precio' => '14.99',
        'imagen' => 'https://placehold.co/600x400/5bc0de/ffffff?text=Hollow+Knight'
    ]
];
?>

<h2 class="mb-4">Catálogo de Juegos</h2>

<div class="row">
    <?php foreach ($juegos as $juego): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo $juego['imagen']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($juego['titulo']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($juego['titulo']); ?></h5>
                    <p class="card-text">
                        <strong>Género:</strong> <?php echo htmlspecialchars($juego['genero']); ?><br>
                        <strong>Precio:</strong> $<?php echo htmlspecialchars($juego['precio']); ?>
                    </p>
                    <a href="#" class="btn btn-primary">Añadir al Carrito</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>
