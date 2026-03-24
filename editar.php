<?php
session_start();
if (!isset($_SESSION['admin_logeado']) || $_SESSION['admin_logeado'] !== true) {
    header("Location: login.php");
    exit();
}

require_once 'conexion.php';

// Si se ha enviado el formulario para actualizar el plato
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_plato'])) {
    $id = $_POST['id_plato'];
    $nombre = $_POST['nombre_plato'];
    $desc = $_POST['desc_plato'];
    $precio = $_POST['precio_plato'];
    
    // Si han subido una foto nueva
    if (isset($_FILES['imagen_plato']) && $_FILES['imagen_plato']['error'] == 0) {
        $nombre_imagen = time() . "_" . basename($_FILES["imagen_plato"]["name"]);
        $ruta_destino = "imgs/" . $nombre_imagen;
        move_uploaded_file($_FILES["imagen_plato"]["tmp_name"], $ruta_destino);
        
        $stmt = $conn->prepare("UPDATE platos SET nombre=?, descripcion=?, precio=?, imagen=? WHERE id=?");
        $stmt->bind_param("ssdsi", $nombre, $desc, $precio, $nombre_imagen, $id);
    } else {
        // Si no cambian la foto, actualizamos solo el texto
        $stmt = $conn->prepare("UPDATE platos SET nombre=?, descripcion=?, precio=? WHERE id=?");
        $stmt->bind_param("ssdi", $nombre, $desc, $precio, $id);
    }
    
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php");
    exit();
}

// Cargar los datos del plato al abrir la página
if (isset($_GET['id'])) {
    $id_plato = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM platos WHERE id = ?");
    $stmt->bind_param("i", $id_plato);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $plato = $resultado->fetch_assoc();
    $stmt->close();

    if (!$plato) {
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
    <h1 style="text-align: center;">Editar Plato</h1>
    
    <div class="admin-form">
        <form method="POST" action="editar.php" enctype="multipart/form-data">
            <input type="hidden" name="editar_plato" value="1">
            <input type="hidden" name="id_plato" value="<?php echo $plato['id']; ?>">
            
            <label>Nombre del plato:</label>
            <input type="text" name="nombre_plato" value="<?php echo htmlspecialchars($plato['nombre']); ?>" required>
            
            <label>Descripción:</label>
            <textarea name="desc_plato" rows="3" required><?php echo htmlspecialchars($plato['descripcion']); ?></textarea>
            
            <label>Precio (€):</label>
            <input type="number" step="0.01" name="precio_plato" value="<?php echo $plato['precio']; ?>" required>
            
            <label style="display: block; margin-top: 15px; font-weight: bold;">Foto actual:</label>
            <img src="imgs/<?php echo $plato['imagen']; ?>" style="width: 150px; border-radius: 8px; margin-bottom: 15px; display: block;">
            
            <label>Cambiar foto (Opcional):</label>
            <input type="file" name="imagen_plato" accept="image/*" style="border: none; padding-left: 0;">
            
            <button type="submit" class="btn-reservar" style="width: 100%; margin-top: 20px;">Actualizar Plato</button>
            <a href="admin.php" style="display: block; text-align: center; margin-top: 15px; color: #555; text-decoration: none;">Cancelar y volver</a>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>