<?php
require_once 'conexion.php';
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $num_personas = $_POST['num_personas'];

    $stmt = $conn->prepare("INSERT INTO reservas (nombre_cliente, telefono, email, fecha, hora, num_personas) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $nombre, $telefono, $email, $fecha, $hora, $num_personas);

    if ($stmt->execute()) {
        $mensaje = "<div style='background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>OK</div>";
    }
    $stmt->close();
}

include 'header.php';
?>

<main style="padding: 40px 20px; max-width: 600px; margin: 0 auto;">
    <h1 style="text-align: center; margin-bottom: 30px;"><?php echo __('reserva_titulo'); ?></h1>
<form method="POST" action="reserva.php" class="reserva-form">
    <label><?php echo __('lbl_nombre'); ?></label>
    <input type="text" name="nombre" required>

    <label><?php echo __('lbl_telefono'); ?></label>
    <input type="tel" name="telefono" required>

    <label><?php echo __('lbl_email'); ?></label>
    <input type="email" name="email" required>

    <label><?php echo __('lbl_fecha'); ?></label>
    <input type="date" name="fecha" required>

    <label><?php echo __('lbl_hora'); ?></label>
    <input type="time" name="hora" required>

    <label><?php echo __('lbl_personas'); ?></label>
    <input type="number" name="num_personas" min="1" max="20" required value="2">

    <button type="submit" class="btn-reservar"><?php echo __('btn_confirmar'); ?></button>
</form>
</main>

<?php include 'footer.php'; ?>