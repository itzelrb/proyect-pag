<?php
$server = 'localhost';
$username = 'admin';
$password = '12345';
$database = 'cotizacion';


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conexion = mysqli_connect($server, $username, $password, $database);
    
    
    mysqli_set_charset($conexion, "utf8");
}
catch (Exception $e) {
    
    die('Connected failed: ' . $e->getMessage());
}

?>