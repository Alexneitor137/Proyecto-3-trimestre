<?php
// session_start() SIEMPRE debe ser la primera línea de código, antes de cualquier HTML
session_start();

// Si el admin ya está logeado, lo mandamos directo al panel para que no tenga que volver a poner la clave
if (isset($_SESSION['admin_logeado']) && $_SESSION['admin_logeado'] === true) {
    header("Location: admin.php");
    exit();
}

$error = "";

// Comprobamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Aquí defines tu usuario y contraseña.
    if ($usuario === 'admin' && $password === 'proyecto2026') {
        // Credenciales correctas: Creamos la sesión
        $_SESSION['admin_logeado'] = true;
        header("Location: admin.php"); // Lo enviamos al panel
        exit();
    } else {
        $error = "<div style='color: red; margin-bottom: 15px;'>Usuario o contraseña incorrectos.</div>";
    }
}

include 'header.php';
?>

<main style="padding: 40px 20px; max-width: 400px; margin: 0 auto; min-height: 50vh;">
    <h1 style="text-align: center;">Acceso Privado</h1>
    
    <div class="admin-form" style="margin-top: 30px;">
        <?php echo $error; ?>
        
        <form method="POST" action="login.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit" class="btn-reservar" style="width: 100%; margin-top: 20px;">Entrar al Panel</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
