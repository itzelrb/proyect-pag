<?php
include("conexion.php");

$mensaje = "";

if(isset($_POST['registrar'])){

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contraseña'];
    $id_tipo = $_POST['id_tipo'];

    $sql = "INSERT INTO usuario (usuario, contraseña, id_tipo)
            VALUES ('$usuario','$contrasena','$id_tipo')";

    if(mysqli_query($conexion, $sql)){
        $mensaje = "Usuario registrado correctamente";
    }else{
        $mensaje = "Error al registrar usuario";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de Usuarios</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #a8f0e6, #00a896);
}

.contenedor{
    background:white;
    width:400px;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    text-align:center;
}

h2{
    color:#00a896;
    margin-bottom:25px;
}

input, select{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}

button{
    width:100%;
    padding:12px;
    background:#00a896;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
    margin-top:10px;
}

button:hover{
    background:#028090;
}

.mensaje{
    margin-top:15px;
    color:green;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="contenedor">

    <h2>Registrar Usuario</h2>

    <form method="POST">

        <input
            type="text"
            name="usuario"
            placeholder="Usuario"
            required>

        <input
            type="password"
            name="contraseña"
            placeholder="Contraseña"
            required>

        <select name="id_tipo" required>
    <option value="">Seleccione un tipo</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>

        <button type="submit" name="registrar">
            Registrar
        </button>

    </form>

    <div class="mensaje">
        <?php echo $mensaje; ?>
    </div>

</div>

</body>
</html>