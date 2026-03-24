<?php 
// Cargamos el diccionario al principio de cada página que use el header
require_once 'lenguajes.php'; 
?>
<!DOCTYPE html>
<html lang="<?php echo $idioma_actual; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chefika</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <header>
        <img src="imgs/gorro-chef.png" alt="Logo" id="Logo">
        <h1>Chefika</h1>
        
        <nav style="margin-left: auto; padding-right: 20px; display: flex; align-items: center;">
            <a href="index.php" style="color: white; margin: 0 10px; text-decoration: none;"><?php echo __('nav_inicio'); ?></a>
            <a href="menu.php" style="color: white; margin: 0 10px; text-decoration: none;"><?php echo __('nav_menu'); ?></a>
            <a href="reserva.php" style="color: white; margin: 0 10px; text-decoration: none;"><?php echo __('nav_reservar'); ?></a> 
            
            <div style="margin-left: 20px; border-left: 1px solid rgba(255,255,255,0.3); padding-left: 20px;">
                <a href="idioma.php?lang=es" style="color: white; text-decoration: none; opacity: <?php echo $idioma_actual == 'es' ? '1' : '0.5'; ?>;">🇪🇸 ES</a>
                <span style="color: white; margin: 0 5px;">|</span>
                <a href="idioma.php?lang=en" style="color: white; text-decoration: none; opacity: <?php echo $idioma_actual == 'en' ? '1' : '0.5'; ?>;">🇬🇧 EN</a>
            </div>
        </nav>
    </header>