<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'cotizacion';

$conexion = mysqli_connect($server, $username, $password, $database);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


mysqli_set_charset($conexion, "utf8");
?>