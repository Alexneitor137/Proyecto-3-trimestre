<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprobamos qué idioma está activo en la sesión (por defecto: español)
$idioma_actual = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'es';

// Nuestro diccionario
$textos = [
    'es' => [
        'nav_inicio' => 'Inicio',
        'nav_menu' => 'Menú',
        'nav_reservar' => 'Reservar',
        'hero_titulo' => 'Vive la experiencia',
        'hero_desc' => 'Ingredientes frescos, recetas tradicionales con un toque de innovación y un ambiente inmejorable. Déjanos sorprenderte con los sabores preparados por nuestros chefs expertos.',
        'btn_reserva' => '¡Reserva tu mesa ahora!',
        'titulo_platos' => 'Nuestros Platos Estrella',
        'btn_ver_menu' => 'Ver el Menú Completo',
        'nuestro_menu' => 'Nuestro Menú',
        'reserva_titulo' => 'Reserva tu mesa',
        'lbl_nombre' => 'Nombre completo:',
        'lbl_telefono' => 'Teléfono:',
        'lbl_email' => 'Email:',
        'lbl_fecha' => 'Fecha:',
        'lbl_hora' => 'Hora:',
        'lbl_personas' => 'Número de comensales:',
        'btn_confirmar' => 'Confirmar Reserva',
        'footer_dir' => 'Calle Principal 123, Valencia',
        'footer_tel' => 'Tel: 960 00 00 00',
        'footer_proyecto' => 'Proyecto Final de Programación'
    ],
    'en' => [
        'nav_inicio' => 'Home',
        'nav_menu' => 'Menu',
        'nav_reservar' => 'Book a Table',
        'hero_titulo' => 'Live the experience',
        'hero_desc' => 'Fresh ingredients, traditional recipes with a touch of innovation, and an unbeatable atmosphere. Let us surprise you with the flavors prepared by our expert chefs.',
        'btn_reserva' => 'Book your table now!',
        'titulo_platos' => 'Our Signature Dishes',
        'btn_ver_menu' => 'See Full Menu',
        'nuestro_menu' => 'Our Menu',
        'reserva_titulo' => 'Book your table',
        'lbl_nombre' => 'Full Name:',
        'lbl_telefono' => 'Phone:',
        'lbl_email' => 'Email:',
        'lbl_fecha' => 'Date:',
        'lbl_hora' => 'Time:',
        'lbl_personas' => 'Number of guests:',
        'btn_confirmar' => 'Confirm Booking',
        'footer_dir' => '123 Main Street, Valencia',
        'footer_tel' => 'Phone: +34 960 00 00 00',
        'footer_proyecto' => 'Final Programming Project',
    ]
];

// Función mágica para traducir rápidamente en nuestros archivos
function __($clave) {
    global $textos, $idioma_actual;
    // Si existe la traducción, la devuelve. Si no, devuelve la clave.
    return isset($textos[$idioma_actual][$clave]) ? $textos[$idioma_actual][$clave] : $clave;
}
?>