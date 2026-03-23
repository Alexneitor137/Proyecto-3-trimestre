<?php
require_once 'conexion.php';

$sql = "SELECT * FROM platos";
$result = $conn->query($sql);

include 'header.php';
?>

<main style="padding: 20px; text-align: center;">
    <h1 style="margin-bottom: 30px;">Nuestro Menú</h1>

    <div class="menu-grid">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="menu-card">
                <h2><?php echo htmlspecialchars($row['nombre']); ?></h2>
                <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                <p class="precio"><?php echo htmlspecialchars($row['precio']); ?> €</p>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php
include 'footer.php';
?>