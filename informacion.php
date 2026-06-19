x<?php
session_start();
include("conexion.php");

/*  PROTECCIÓN: solo usuarios logueados */
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

/* ===================== VARIABLES ===================== */
$monto = "";
$plazos = "";
$resultado = "";

/* DATOS */
$nombre = "";
$apellido_p = "";
$apellido_m = "";
$rfc = "";
$curp = "";
$nacionalidad = "";
$correo = "";
$estado_civil = "";
$antiguedad_empleo = "";
$cargo = "";
$fecha_nacimiento = "";
$sexo = "";

$domicilio = "";
$colonia = "";
$municipio = "";
$cp = "";
$habita = "";
$antiguedad_domicilio = "";
$tel_casa = "";
$celular = "";

$dependiente1 = "";
$rfc_dep1 = "";
$tel_dep1 = "";
$cel_dep1 = "";
$parentesco1 = "";

$dependiente2 = "";
$rfc_dep2 = "";
$tel_dep2 = "";
$cel_dep2 = "";
$parentesco2 = "";

$ingreso = "";
$renta = "";
$hipoteca = "";
$otras_deudas = "";
$auto = "";
$valor_autos = "";
$valor_inmuebles = "";

$banco1 = "";
$cuenta1 = "";

$banco2 = "";
$cuenta2 = "";

$comentarios = "";

/* ===================== GUARDAR DATOS ===================== */
if(isset($_POST['solicitar'])){

    $monto = $_POST["monto"];
    $plazos = $_POST["plazos"];
    $resultado = $_POST["resultado"];

    $nombre = $_POST["nombre"];
    $apellido_p = $_POST["apellido_p"];
    $apellido_m = $_POST["apellido_m"];
    $rfc = $_POST["rfc"];
    $curp = $_POST["curp"];
    $nacionalidad = $_POST["nacionalidad"];
    $correo = $_POST["correo"];
    $estado_civil = $_POST["estado_civil"];
    $antiguedad_empleo = $_POST["antiguedad_empleo"];
    $cargo = $_POST["cargo"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $sexo = $_POST["sexo"];

    $domicilio = $_POST["domicilio"];
    $colonia = $_POST["colonia"];
    $municipio = $_POST["municipio"];
    $cp = $_POST["cp"];
    $habita = $_POST["habita"];
    $antiguedad_domicilio = $_POST["antiguedad_domicilio"];
    $tel_casa = $_POST["tel_casa"];
    $celular = $_POST["celular"];

    $dependiente1 = $_POST["dependiente1"];
    $rfc_dep1 = $_POST["rfc_dep1"];
    $tel_dep1 = $_POST["tel_dep1"];
    $cel_dep1 = $_POST["cel_dep1"];
    $parentesco1 = $_POST["parentesco1"];

    $dependiente2 = $_POST["dependiente2"];
    $rfc_dep2 = $_POST["rfc_dep2"];
    $tel_dep2 = $_POST["tel_dep2"];
    $cel_dep2 = $_POST["cel_dep2"];
    $parentesco2 = $_POST["parentesco2"];

    $ingreso = $_POST["ingreso"];
    $renta = $_POST["renta"];
    $hipoteca = $_POST["hipoteca"];
    $otras_deudas = $_POST["otras_deudas"];
    $auto = $_POST["auto"];
    $valor_autos = $_POST["valor_autos"];
    $valor_inmuebles = $_POST["valor_inmuebles"];

    $banco1 = $_POST["banco1"];
    $cuenta1 = $_POST["cuenta1"];

    $banco2 = $_POST["banco2"];
    $cuenta2 = $_POST["cuenta2"];

    $comentarios = $_POST["comentarios"];

    /* ===================== INSERT ===================== */
    $sql = "INSERT INTO informacion(
        nombre, monto, plazos, resultado,
        apellido_p, apellido_m, rfc, curp, nacionalidad, correo,
        estado_civil, antiguedad_empleo, cargo, fecha_nacimiento, sexo,
        domicilio, colonia, municipio, cp, habita, antiguedad_domicilio, tel_casa, celular,
        dependiente1, rfc_dep1, tel_dep1, cel_dep1, parentesco1,
        dependiente2, rfc_dep2, tel_dep2, cel_dep2, parentesco2,
        ingreso, renta, hipoteca, otras_deudas, auto, valor_autos, valor_inmuebles,
        banco1, cuenta1, banco2, cuenta2,
        comentarios
    ) VALUES (
        '$nombre','$monto','$plazos','$resultado',
        '$apellido_p','$apellido_m','$rfc','$curp','$nacionalidad','$correo',
        '$estado_civil','$antiguedad_empleo','$cargo','$fecha_nacimiento','$sexo',
        '$domicilio','$colonia','$municipio','$cp','$habita','$antiguedad_domicilio','$tel_casa','$celular',
        '$dependiente1','$rfc_dep1','$tel_dep1','$cel_dep1','$parentesco1',
        '$dependiente2','$rfc_dep2','$tel_dep2','$cel_dep2','$parentesco2',
        '$ingreso','$renta','$hipoteca','$otras_deudas','$auto','$valor_autos','$valor_inmuebles',
        '$banco1','$cuenta1','$banco2','$cuenta2',
        '$comentarios'
    )";

    mysqli_query($conexion, $sql);

    echo "<h2 style='text-align:center;color:green;'>
            Datos guardados correctamente </h2>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Formulario</title>

<style>
body{
    margin:0;
    background:#a8f0e6;
    font-family:Arial;
}

.formulario{
    background:white;
    width:800px;
    margin:30px auto;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

input, select, textarea{
    width:100%;
    padding:10px;
    margin:8px 0;
    box-sizing:border-box;
}

h1,h2,h3{
    color:#008b7a;
}

button{
    width:100%;
    padding:10px;
    background:#00a896;
    color:white;
    border:none;
    cursor:pointer;
}

button:hover{
    background:#028090;
}

.botones{
    display:flex;
    gap:10px;
}
</style>
</head>

<body>

<h3 style="text-align:center;">
    Bienvenido <?php echo $_SESSION['usuario']; ?>
</h3>

<div class="formulario">

<form method="POST" action="informacion.php">

<h1>Formulario de Solicitud</h1>

<h2>DATOS DEL SOLICITANTE</h2>

<input type="text" name="nombre" placeholder="Nombre completo">
<input type="text" name="apellido_p" placeholder="Apellido paterno">
<input type="text" name="apellido_m" placeholder="Apellido materno">
<input type="text" name="rfc" placeholder="RFC">
<input type="text" name="curp" placeholder="CURP">
<input type="text" name="nacionalidad" placeholder="Nacionalidad">
<input type="email" name="correo" placeholder="Correo">

<select name="estado_civil">
<option>Soltero</option>
<option>Casado</option>
<option>Divorciado</option>
</select>

<input type="text" name="antiguedad_empleo" placeholder="Antigüedad empleo">
<input type="text" name="cargo" placeholder="Cargo">
<input type="date" name="fecha_nacimiento">

<select name="sexo">
<option>Masculino</option>
<option>Femenino</option>
</select>

<h2>CRÉDITO</h2>

<input type="number" id="monto" name="monto" placeholder="Monto">
<input type="number" id="plazos" name="plazos" placeholder="Plazos">

<input type="text" id="resultado" name="resultado" placeholder="Pago mensual" readonly>

<div class="botones">
<button type="button" onclick="calcular()">Calcular</button>
<button type="submit" name="solicitar">Solicitar crédito</button>
</div>

</form>

</div>

<script>
function calcular(){
    let a1 = 0.0258620689655172;
    let monto = document.getElementById("monto").value;
    let plazos = document.getElementById("plazos").value;

    let ra = (a1 * Math.pow(1 + a1, plazos) * monto) / (Math.pow(1 + a1, plazos) - 1);
    document.getElementById("resultado").value = Math.round(ra);
}
</script>

</body>
</html>