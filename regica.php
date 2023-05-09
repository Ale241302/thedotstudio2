<?php
session_start();
$usuario1 = $_GET['usuario1'];
$rol =  $_GET['rol'];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link href="./assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
  <title>
     CAPACITACIONES
  </title>
  <meta content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0" name="viewport">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="./assets/CSS/login.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>
</head>
<body>
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <form class="sign-in-htm" action="./api/user/capi.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>" method="POST">
        <div class="group">
          <label for="user" class="label">Nombre</label>
          <input id="nombre" name="nombre" type="text" class="input">
        </div>
        <div class="group">
           <label for="user" class="label">Descripcion</label>
          <input id="descripcion" name="descripcion" type="text" class="input">
        </div>
        <div class="group">
          <label for="user" class="label">Cupo</label>
          <input id="cupo" name="cupo" type="text" class="input">
        </div>
        <div class="group">
        <label for="user" class="label">Fecha de inicio</label>
        <input style="background-color: rgba(255, 255, 255, 0.7); color: #000;"id="fechai" name="fechai" type="date" class="input">
    </div>
    <div class="group">
        <label for="user" class="label">Fecha de fin</label>
        <input style="background-color: rgba(255, 255, 255, 0.7); color: #000;" id="fechaf" name="fechaf" type="date" class="input">
    </div>
        <div class="group">
          <input type="submit" class="button" value="Ingresar">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
        </div>
      </form>
      <div class="group">
          <button class="button" style="position: absolute;top: 130%;" onclick="location.href='capacitaciones.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>'">Volver</button>
      </div>
    </div>
  </div>
</div>
<script>
  // Obtener la fecha actual
  var today = new Date().toISOString().split("T")[0];
  
  // Establecer la fecha mínima para los campos de fecha de inicio y fecha de fin
  document.getElementById("fechai").min = today;
  document.getElementById("fechaf").min = today;
</script>
</body>
</html>