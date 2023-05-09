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
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link href="./assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
  <title>
     CONSULTORIA
  </title>
  <meta content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0" name="viewport">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="./assets/CSS/login.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
    <div class="login-form">
      <form class="sign-in-htm" action="./api/user/login.php" method="GET">
        <div class="group">
          <label for="user" class="label">Usuario</label>
          <input id="usuario" name="usuario" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Recordarme</label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Ingresar">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a style="color: white" href="#forgot">Olvido Password?</a>
        </div>
      </form>
      <form class="sign-up-htm" action="./api/user/signup.php" method="POST">
        <div class="group">
          <label for="user" class="label">Nombre</label>
          <input id="nombre" name="nombre" type="text" class="input">
        </div>
        <div class="group">
          <label for="user" class="label">Usuario</label>
          <input id="usuario" name="usuario" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
      
        <div class="group">
          <label for="user" class="label">Correo Eletronico</label>
          <input id="correo" name="correo" type="text" class="input">
        </div>
        <div class="group">
          <label for="user" class="label">Telefono</label>
          <input id="telefono" name="telefono" type="text" class="input">
        </div>
        <div class="group">
          <label for="user" class="label">Rol</label>
          <select style="background-color: white; color: black;" id="rol" name="rol" type="text" class="input">
          <?php
                     $sentencia ="SELECT * FROM rol";
                     $resultado = $conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));
                     while ($fila =$resultado ->fetch_assoc()) {
                     echo "<option value='".$fila['idRol']."'>".$fila['nombre']."</option>";
                      }
                     ?>
                    </select>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Registrar">
        </div>
        <div class="hr"></div>
      </form>
    </div>
  </div>
</div>

</body>
</html>