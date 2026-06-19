<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Formulario</title>

<style>
body{
    margin: 0;
    background-color: #a8f0e6;
    font-family: Arial, sans-serif;
}

.formulario{
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
    width:750px;
    margin:30px auto;
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

<form action="informacion.php" method="POST">

<div class="formulario">

<h1>Formulario de Solicitud</h1>

<!-- DATOS DEL SOLICITANTE -->
<h2>DATOS DEL SOLICITANTE</h2>
<input type="text" name="nombre" placeholder="Nombre completo">
<input type="text" name="apellido_p" placeholder="Apellido paterno">
<input type="text" name="apellido_m" placeholder="Apellido materno">
<input type="text" name="rfc" placeholder="RFC">
<input type="text" name="curp" placeholder="CURP">
<input type="text" name="nacionalidad" placeholder="Nacionalidad">
<input type="email" name="correo" placeholder="Correo electrónico">

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

<!-- DIRECCIÓN -->
<h2>DIRECCIÓN</h2>
<input type="text" name="domicilio" placeholder="Domicilio">
<input type="text" name="colonia" placeholder="Colonia">
<input type="text" name="municipio" placeholder="Municipio">
<input type="text" name="cp" placeholder="Código postal">

<select name="habita">
    <option>Propia</option>
    <option>Rentada</option>
    <option>Familiar</option>
</select>

<input type="text" name="antiguedad_domicilio" placeholder="Antigüedad domicilio">
<input type="text" name="tel_casa" placeholder="Teléfono casa">
<input type="text" name="celular" placeholder="Celular">

<!-- DEPENDIENTES ECONÓMICOS -->
<h2>DEPENDIENTES ECONÓMICOS</h2>
<h3>Dependiente 1</h3>
<input type="text" name="dependiente1" placeholder="Nombre">
<input type="text" name="rfc_dep1" placeholder="RFC">
<input type="text" name="tel_dep1" placeholder="Teléfono">
<input type="text" name="cel_dep1" placeholder="Celular">
<input type="text" name="parentesco1" placeholder="Parentesco">

<h3>Dependiente 2</h3>
<input type="text" name="dependiente2" placeholder="Nombre">
<input type="text" name="rfc_dep2" placeholder="RFC">
<input type="text" name="tel_dep2" placeholder="Teléfono">
<input type="text" name="cel_dep2" placeholder="Celular">
<input type="text" name="parentesco2" placeholder="Parentesco">

<!-- FINANCIERO (solo inputs, cálculo va a otro archivo) -->
<h2>INFORMACIÓN FINANCIERA</h2>
<input type="number" id="monto" name="monto" placeholder="Ingreso mensual">
<input type="number" id="plazos" name="plazos" placeholder="Plazos">
<input type="text" id="resultado" name="resultado" placeholder="Pago mensual" readonly>

<!-- BOTÓN FINAL -->
<button type="submit" name="solicitar">Solicitar crédito</button>

</div>
</form>

</body>
</html>