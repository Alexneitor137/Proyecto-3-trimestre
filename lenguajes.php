<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$idioma_actual = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'es';

$textos = [
    'es' => [
        // Navegación
        'nav_inicio' => 'Inicio', 'nav_menu' => 'Menú', 'nav_reservar' => 'Reservar',
        // Home (index.php)
        'hero_titulo' => 'Vive la experiencia',
        'hero_desc' => 'Ingredientes frescos, recetas tradicionales con un toque de innovación y un ambiente inmejorable.',
        'btn_reserva' => '¡Reserva tu mesa ahora!',
        'titulo_platos' => 'Nuestros Platos Estrella',
        'btn_ver_menu' => 'Ver el Menú Completo',
        'plato_1' => 'Paella Valenciana', 'plato_2' => 'Hamburguesa Chefika', 'plato_3' => 'Tarta de Queso',
        // Menú (menu.php)
        'nuestro_menu' => 'Nuestro Menú',
        // Reservas (reserva.php)
        'reserva_titulo' => 'Reserva tu mesa',
        'lbl_nombre' => 'Nombre completo:', 'lbl_telefono' => 'Teléfono:', 'lbl_email' => 'Email:',
        'lbl_fecha' => 'Fecha:', 'lbl_hora' => 'Hora:', 'lbl_personas' => 'Número de comensales:',
        'btn_confirmar' => 'Confirmar Reserva',
        // Footer y contacto
        'footer_dir' => 'Calle Principal 123, Valencia', 'footer_tel' => 'Tel: 960 00 00 00',
        'footer_proyecto' => 'Proyecto Final de Programación',
        // DESCRIPCIONES (Lo que sí traducimos en el menú)
        'Auténtica paella con pollo, conejo y bajoqueta.' => 'Auténtica paella con pollo, conejo y bajoqueta.',
        'Doble carne de ternera con queso fundido y pan brioche.' => 'Doble carne de ternera con queso fundido y pan brioche.',
        'Nuestra famosa tarta de queso casera al horno.' => 'Nuestra famosa tarta de queso casera al horno.',
        'HotDog suculento' => 'HotDog suculento'
    ],
    'en' => [
        // Navigation
        'nav_inicio' => 'Home', 'nav_menu' => 'Menu', 'nav_reservar' => 'Bookings',
        // Home (index.php)
        'hero_titulo' => 'Live the experience',
        'hero_desc' => 'Fresh ingredients, traditional recipes with a touch of innovation, and an unbeatable atmosphere.',
        'btn_reserva' => 'Book your table now!',
        'titulo_platos' => 'Our Signature Dishes',
        'btn_ver_menu' => 'See Full Menu',
        'plato_1' => 'Valencian Paella', 'plato_2' => 'Chefika Burger', 'plato_3' => 'Cheesecake',
        // Menu (menu.php)
        'nuestro_menu' => 'Our Menu',
        // Reservations (reserva.php)
        'reserva_titulo' => 'Book your table',
        'lbl_nombre' => 'Full Name:', 'lbl_telefono' => 'Phone:', 'lbl_email' => 'Email:',
        'lbl_fecha' => 'Date:', 'lbl_hora' => 'Time:', 'lbl_personas' => 'Number of guests:',
        'btn_confirmar' => 'Confirm Booking',
        // Footer & Contact
        'footer_dir' => '123 Main Street, Valencia', 'footer_tel' => 'Phone: +34 960 00 00 00',
        'footer_proyecto' => 'Final Programming Project',
        // DESCRIPTIONS (Translated)
        'Auténtica paella con pollo, conejo y bajoqueta.' => 'Authentic paella with chicken, rabbit, and green beans.',
        'Doble carne de ternera con queso fundido y pan brioche.' => 'Double beef patty with melted cheese and brioche bun.',
        'Nuestra famosa tarta de queso casera al horno.' => 'Our famous homemade baked cheesecake.',
        'HotDog suculento' => 'Succulent Hot Dog'
    ]
];

function __($clave) {
    global $textos, $idioma_actual;
    $c = trim($clave);
    return (isset($textos[$idioma_actual][$c])) ? $textos[$idioma_actual][$c] : $clave;
}
?>