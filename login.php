<?php
session_start();
include("conexion.php");

$error = "";

if(isset($_POST['login'])){

    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contraseña']);

    $sql = "SELECT id_usuario, usuario, contraseña, id_tipo
            FROM usuario
            WHERE usuario = ? AND contraseña = ?";

    $stmt = mysqli_prepare($conexion, $sql);

    if(!$stmt){
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($resultado) == 1){

        $fila = mysqli_fetch_assoc($resultado);

        $_SESSION['id_usuario'] = $fila['id_usuario'];
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['id_tipo'] = $fila['id_tipo'];

        // Administrador
        if($fila['id_tipo'] == 0){
            header("Location: administrador/index.php");
            exit();
        }

        // Contador
        if($fila['id_tipo'] == 2){
            header("Location: contador/index.php");
            exit();
        }

        // Si tiene un id_tipo distinto
        session_destroy();
        $error = "Tipo de usuario no válido.";

    }else{
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #a8f0e6, #00a896);
    font-family: Arial, sans-serif;
}

.login-box{
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0px 10px 25px rgba(0,0,0,0.2);
    width:320px;
    text-align:center;
}

.login-box h2{
    margin-bottom:20px;
    color:#00a896;
}

.login-box input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:8px;
}

.login-box button{
    width:100%;
    padding:12px;
    background:#00a896;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

.error{
    color:red;
    margin-top:10px;
}
</style>

</head>
<body>

<div class="login-box">

    <h2> Iniciar Sesión</h2>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <button type="submit" name="login">Entrar</button>
    </form>

    <div class="error">
        <?php echo $error; ?>
    </div>

</div>

</body>
</html>