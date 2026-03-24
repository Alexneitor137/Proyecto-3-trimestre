<?php
session_start();
if (!isset($_SESSION['admin_logeado']) || $_SESSION['admin_logeado'] !== true) {
    header("Location: login.php");
    exit();
}

require_once 'conexion.php';

// Si el administrador ha pulsado en "Actualizar Reserva"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_reserva'])) {
    $id = $_POST['id_reserva'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $num_personas = $_POST['num_personas'];

    // Actualizamos solo fecha, hora y comensales
    $stmt = $conn->prepare("UPDATE reservas SET fecha=?, hora=?, num_personas=? WHERE id=?");
    $stmt->bind_param("ssii", $fecha, $hora, $num_personas, $id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: admin.php");
    exit();
}

// Cargar los datos de la reserva seleccionada
if (isset($_GET['id'])) {
    $id_reserva = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM reservas WHERE id = ?");
    $stmt->bind_param("i", $id_reserva);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $reserva = $resultado->fetch_assoc();
    $stmt->close();

    if (!$reserva) {
        header("Location: admin.php");
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
}

include 'header.php';
?>

<main style="padding: 40px 20px; max-width: 600px; margin: 0 auto; min-height: 60vh;">
    <h1 style="text-align: center;">Editar Reserva</h1>
    
    <div class="admin-form">
        <form method="POST" action="editar_reserva.php">
            <input type="hidden" name="editar_reserva" value="1">
            <input type="hidden" name="id_reserva" value="<?php echo $reserva['id']; ?>">
            
            <div style="background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #eee;">
                <p style="margin-bottom: 8px;"><strong>Cliente:</strong> <?php echo htmlspecialchars($reserva['nombre_cliente']); ?></p>
                <p style="margin-bottom: 8px;"><strong>Teléfono:</strong> <?php echo htmlspecialchars($reserva['telefono']); ?></p>
                <p style="margin-bottom: 0;"><strong>Email:</strong> 
                    <?php 
                    if (!empty($reserva['email'])) {
                        echo htmlspecialchars($reserva['email']);
                    } else {
                        echo "<span style='color: #999; font-style: italic;'>No proporcionado</span>";
                    }
                    ?>
                </p>
            </div>
            
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" value="<?php echo $reserva['fecha']; ?>" required>
            
            <label for="hora">Hora:</label>
            <input type="time" name="hora" value="<?php echo $reserva['hora']; ?>" required>
            
            <label for="num_personas">Número de personas:</label>
            <input type="number" name="num_personas" value="<?php echo $reserva['num_personas']; ?>" min="1" max="20" required>
            
            <button type="submit" class="btn-reservar" style="width: 100%; margin-top: 20px;">Actualizar Reserva</button>
            <a href="admin.php" style="display: block; text-align: center; margin-top: 15px; color: #555; text-decoration: none;">Cancelar y volver</a>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>