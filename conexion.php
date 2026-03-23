<?php
// Usaremos la conexión de XAMPP para que puedas trabajar en local
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "chefika_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$conn->set_charset("utf8"); // Para que las ñ y tildes se vean bien
?>