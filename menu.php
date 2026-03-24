<?php
require_once 'conexion.php';
require_once 'lenguajes.php'; 
$sql = "SELECT * FROM platos";
$result = $conn->query($sql);
include 'header.php';
?>

<main style="padding: 20px; text-align: center;">
    <h1 style="margin-bottom: 30px;"><?php echo __('nuestro_menu'); ?></h1>

    <div class="menu-grid">
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="menu-card">
            <img src="imgs/<?php echo htmlspecialchars($row['imagen']); ?>" 
                 style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px 8px 0 0; margin-bottom: 15px;">
            
            <h2><?php echo htmlspecialchars($row['nombre']); ?></h2>
            
            <p><?php echo htmlspecialchars(__($row['descripcion'])); ?></p>
            
            <p class="precio"><?php echo htmlspecialchars($row['precio']); ?> €</p>
        </div>
    <?php endwhile; ?>
    </div>
</main>

<?php include 'footer.php'; ?>