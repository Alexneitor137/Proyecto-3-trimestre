<?php
session_start();
session_destroy(); // Destruimos todas las sesiones activas
header("Location: index.php"); // Lo devolvemos a la página principal
exit();
?>