<?php
session_start();
if (!isset($_SESSION['admin_logeado']) || $_SESSION['admin_logeado'] !== true) {
    header("Location: login.php");
    exit();
}

require_once 'conexion.php';

// --- 1. LÓGICA PARA ELIMINAR UN PLATO ---
if (isset($_POST['eliminar_plato'])) {
    $id_borrar = $_POST['id_plato'];
    
    // Preparamos la consulta para borrar
    $stmt_del = $conn->prepare("DELETE FROM platos WHERE id = ?");
    $stmt_del->bind_param("i", $id_borrar);
    $stmt_del->execute();
    $stmt_del->close();
    
    header("Location: admin.php");
    exit();
}

// --- 2. LÓGICA PARA AÑADIR UN PLATO CON IMAGEN ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_plato'])) {
    $nombre = $_POST['nombre_plato'];
    $desc = $_POST['desc_plato'];
    $precio = $_POST['precio_plato'];
    $nombre_imagen = "default.jpg"; // Imagen por defecto si no suben ninguna

    // Comprobamos si se ha subido un archivo y si no hay errores
    if (isset($_FILES['imagen_plato']) && $_FILES['imagen_plato']['error'] == 0) {
        // Generamos un nombre único para que no se sobrescriban fotos con el mismo nombre
        $nombre_imagen = time() . "_" . basename($_FILES["imagen_plato"]["name"]);
        $ruta_destino = "imgs/" . $nombre_imagen;

        // Movemos el archivo de la memoria temporal a tu carpeta imgs/
        move_uploaded_file($_FILES["imagen_plato"]["tmp_name"], $ruta_destino);
    }

    $stmt = $conn->prepare("INSERT INTO platos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nombre, $desc, $precio, $nombre_imagen);
    $stmt->execute();
    $stmt->close();
    
    header("Location: admin.php");
    exit();
}

// --- 3. OBTENER DATOS PARA LAS TABLAS ---
$resultado_reservas = $conn->query("SELECT * FROM reservas ORDER BY fecha DESC, hora DESC");
$resultado_platos = $conn->query("SELECT * FROM platos");

include 'header.php'; 
?>

<main style="padding: 40px 20px; max-width: 1000px; margin: 0 auto;">
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="logout.php" style="background-color: #dc3545; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">Cerrar Sesión</a>
    </div>

    <h1 style="text-align: center; color: #e67e22;">Panel de Control - Chefika</h1>

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
        <form method="POST" action="admin.php" enctype="multipart/form-data">
            <input type="hidden" name="add_plato" value="1">
            
            <input type="text" name="nombre_plato" placeholder="Nombre del plato" required>
            <textarea name="desc_plato" rows="2" placeholder="Descripción breve" required></textarea>
            <input type="number" step="0.01" name="precio_plato" placeholder="Precio (ej: 12.50)" required>
            
            <label for="imagen_plato" style="font-weight: bold; display: block; margin-top: 10px;">Foto del plato:</label>
            <input type="file" name="imagen_plato" id="imagen_plato" accept="image/*" style="border: none; padding-left: 0;">
            
            <button type="submit" class="btn-reservar" style="width: 100%;">Guardar Plato</button>
        </form>
    </div>

    <table class="admin-table">
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php while($plato = $resultado_platos->fetch_assoc()): ?>
        <tr>
            <td>
                <img src="imgs/<?php echo $plato['imagen']; ?>" alt="Foto plato" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
            </td>
            <td><?php echo htmlspecialchars($plato['nombre']); ?></td>
            <td><?php echo $plato['precio']; ?> €</td>
            <td>
                <a href="editar.php?id=<?php echo $plato['id']; ?>" class="btn-accion btn-editar">Editar</a>
                
                <form method="POST" action="admin.php" style="display: inline-block; margin: 0;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este plato?');">
                    <input type="hidden" name="id_plato" value="<?php echo $plato['id']; ?>">
                    <button type="submit" name="eliminar_plato" class="btn-accion btn-eliminar">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</main>

<?php include 'footer.php'; ?>