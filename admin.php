<?php
session_start();

// Si NO existe la sesión o no es true, lo expulsamos a la página de login
if (!isset($_SESSION['admin_logeado']) || $_SESSION['admin_logeado'] !== true) {
    header("Location: login.php");
    exit(); // Detenemos la ejecución de la página inmediatamente
}

// 1. Conectamos a la base de datos
require_once 'conexion.php';

// 2. Lógica para AÑADIR un plato nuevo si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_plato'])) {
    $nombre = $_POST['nombre_plato'];
    $desc = $_POST['desc_plato'];
    $precio = $_POST['precio_plato'];
    // Por ahora ponemos una imagen por defecto
    $imagen = "default.jpg"; 

    $stmt = $conn->prepare("INSERT INTO platos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nombre, $desc, $precio, $imagen);
    $stmt->execute();
    $stmt->close();
    
    // Recargamos la página para que el plato aparezca en la tabla de abajo
    header("Location: admin.php");
    exit();
}

// 3. Obtenemos todas las reservas ordenadas de la más reciente a la más antigua
$resultado_reservas = $conn->query("SELECT * FROM reservas ORDER BY fecha DESC, hora DESC");

// 4. Obtenemos todos los platos
$resultado_platos = $conn->query("SELECT * FROM platos");

include 'header.php'; 
?>

<main style="padding: 40px 20px; max-width: 1000px; margin: 0 auto;">
    <h1 style="text-align: center; color: #e67e22;">Panel de Control - Chefika</h1>
    <p style="text-align: center; margin-bottom: 40px;">Gestión interna del restaurante</p>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="logout.php" style="background-color: #dc3545; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Cerrar Sesión</a>
    </div>

    <h2>📅 Reservas de Clientes</h2>
    <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Personas</th>
        </tr>
        <?php while($reserva = $resultado_reservas->fetch_assoc()): ?>
        <tr>
            <td><?php echo $reserva['id']; ?></td>
            <td><?php echo htmlspecialchars($reserva['nombre_cliente']); ?></td>
            <td><?php echo htmlspecialchars($reserva['telefono']); ?></td>
            <td><?php echo $reserva['fecha']; ?></td>
            <td><?php echo $reserva['hora']; ?></td>
            <td><?php echo $reserva['num_personas']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <hr style="margin: 40px 0; border: 1px solid #ccc;">

    <h2>🍽️ Gestión del Menú</h2>
    
    <div class="admin-form">
        <h3>Añadir Nuevo Plato</h3>
        <form method="POST" action="admin.php">
            <input type="hidden" name="add_plato" value="1">
            
            <input type="text" name="nombre_plato" placeholder="Nombre del plato" required>
            <textarea name="desc_plato" rows="2" placeholder="Descripción breve" required></textarea>
            <input type="number" step="0.01" name="precio_plato" placeholder="Precio (ej: 12.50)" required>
            
            <button type="submit" class="btn-reservar" style="width: 100%;">Guardar Plato</button>
        </form>
    </div>

    <table class="admin-table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php while($plato = $resultado_platos->fetch_assoc()): ?>
        <tr>
            <td><?php echo $plato['id']; ?></td>
            <td><?php echo htmlspecialchars($plato['nombre']); ?></td>
            <td><?php echo $plato['precio']; ?> €</td>
        </tr>
        <?php endwhile; ?>
    </table>

</main>

<?php include 'footer.php'; ?>