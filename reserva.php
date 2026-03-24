<?php
// 1. Conectamos a la base de datos
require_once 'conexion.php';

// Variables para mensajes de éxito o error
$mensaje = "";

// 2. Comprobamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $num_personas = $_POST['num_personas'];

    // 3. Preparamos la consulta SQL para insertar los datos (usamos prepare para seguridad)
    $stmt = $conn->prepare("INSERT INTO reservas (nombre_cliente, telefono, email, fecha, hora, num_personas) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Las "s" significan String y la "i" significa Integer
    $stmt->bind_param("sssssi", $nombre, $telefono, $email, $fecha, $hora, $num_personas);

    if ($stmt->execute()) {
        $mensaje = "<div style='background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>¡Reserva confirmada con éxito! Te esperamos.</div>";
    } else {
        $mensaje = "<div style='background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>Error al realizar la reserva. Por favor, intenta de nuevo.</div>";
    }
    $stmt->close();
}

// 4. Cargamos la cabecera
include 'header.php';
?>

<main style="padding: 40px 20px; max-width: 600px; margin: 0 auto;">
    <h1 style="text-align: center; margin-bottom: 30px;">Reserva tu mesa</h1>
    
    <?php echo $mensaje; ?>
    
    <form method="POST" action="reserva.php" class="reserva-form">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Juan Pérez">

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required placeholder="Ej: 600123456">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Ej: juan@email.com">
        
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>

        <label for="num_personas">Número de comensales:</label>
        <input type="number" id="num_personas" name="num_personas" min="1" max="20" required value="2">

        <button type="submit" class="btn-reservar">Confirmar Reserva</button>
    </form>
</main>

<?php 
// 5. Cargamos el pie de página
include 'footer.php'; 
?>