<?php
session_start();

// Si le pasamos un idioma por la URL (ej: idioma.php?lang=en)
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    // Solo permitimos español o inglés por seguridad
    if ($lang === 'es' || $lang === 'en') {
        $_SESSION['lang'] = $lang;
    }
}

// Te devolvemos a la página en la que estabas antes de hacer clic
$pagina_anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header("Location: $pagina_anterior");
exit();
?>