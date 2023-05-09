<?php
  $conexion= new mysqli("localhost", "root", "", "usuarios");
  //Comprobar conexion
  if(mysqli_connect_errno())
  {
    printf("Fallo la conexion");
  }
  else {
    //printf("Estas conectado");
  }
  session_start();
  $usuario1 = $_GET['usuario1'];
  $rol = $_GET['rol'];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link href="./assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
  <title>
     REGISTRAR CAPACITACION Y USUARIO
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
      <form class="sign-in-htm" action="./api/user/capiusu.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>" method="POST">
        <div class="group">
          <label for="user" class="label">Usuario</label>
           <select style="background-color: rgba(255, 255, 255, 0.7); color: #000;" id="usuario" name="usuario" type="text" class="input">
          <?php
             if ($rol == 1) {
             // Mostrar solo el usuario que inició sesión
              $sentencia = "SELECT * FROM usuario WHERE usuario = '$usuario1'";
              $resultado = $conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
             $fila = $resultado->fetch_assoc();
           echo "<option value='".$fila['id'].",".$fila['usuario']."'>".$fila['usuario']."</option>";
            } elseif ($rol == 2) {
              // Mostrar todos los usuarios
              $sentencia = "SELECT * FROM usuario";
              $resultado = $conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
              while ($fila = $resultado->fetch_assoc()) {
               echo "<option value='".$fila['id'].",".$fila['usuario']."'>".$fila['usuario']."</option>";
              }
            }
           ?>
        </select>
        </div>
        <div class="group">
          <label for="user" class="label">Capacitacion</label>
          <select style="background-color: rgba(255, 255, 255, 0.7); color: #000;" id="capacitacion" name="capacitacion" type="text" class="input">
          <?php
           $fechaActual = date('Y-m-d'); // Obtener la fecha actual del sistema en formato YYYY-MM-DD
           $sentencia = "SELECT * FROM capacitaciones WHERE fechaf >= '$fechaActual' AND cupo > 0";
           $resultado = $conexion->query($sentencia) or die("Error al actualizar datos" . mysqli_error($conexion));
           while ($fila = $resultado->fetch_assoc()) {
               echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
           }
           ?>
           </select>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Ingresar">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
        </div>
      </form>
      <div class="group">
          <button class="button" style="position: absolute;top: 80%;" onclick="location.href='capacitacionesusu.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>'">Volver</button>
      </div>
      <div class="group">
          <button class="button" style="position: absolute;top: 110%;" onclick="location.href='./api/user/cerrar.php?usuario1=<?php echo $usuario1; ?>&metodo=get;'">Cerrar sesión</button>
        </div>
    </div>
  </div>
</div>
</body>
</html>