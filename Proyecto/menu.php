<?php
$conn = new mysqli("localhost", "root", "", "chefika");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM platos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menú - Chefika</title>
</head>
<body>
    <h1>Nuestro Menú</h1>

    <?php while($row = $result->fetch_assoc()): ?>
        <div>
            <h2><?php echo $row['nombre']; ?></h2>
            <p><?php echo $row['descripcion']; ?></p>
            <p><strong><?php echo $row['precio']; ?> €</strong></p>
            <hr>
        </div>
    <?php endwhile; ?>

</body>
</html>