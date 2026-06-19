<?php

if(isset($_POST["enviar"]))
{
    include_once 'ser.php'; 

    $monto = $_POST["mont"];
    $plazo = $_POST["plaz"];
    $nombre = $_POST["nombre"];


    $query = mysqli_query($conexion, "INSERT INTO informacion (nombre, monto, plazo) VALUES ('$nombre', '$monto', '$plazo')");
    
    mysqli_close($conexion);

    echo "Se ingreso correctamente " . $nombre . " " . $monto . "<p>";
}

?>