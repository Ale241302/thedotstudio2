<?php
$conexion = new mysqli("localhost", "root", "", "usuarios");
// Comprobar conexión
if (mysqli_connect_errno()) {
    printf("Fallo la conexión");
} else {
    // printf("Estás conectado");
}

session_start();
$usuario1 = $_GET['usuario1'];
$rol =  $_GET['rol'];
$id = $_GET['id'];

// Obtener los valores actuales de la capacitación según el ID
$sql = "SELECT nombre, descripcion, cupo, fechai, fechaf FROM capacitaciones WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nombre, $descripcion, $cupo, $fechai, $fechaf);
$stmt->fetch();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="./assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
    <title>MODIFICAR CAPACITACIONES</title>
    <meta content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0"
        name="viewport">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="./assets/CSS/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/script.js"></script>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
            <div class="login-form">
                <form class="sign-in-htm"
                    action="./api/user/modicapi.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>&id=<?php echo $id; ?>"
                    method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="group">
                        <label for="user" class="label">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="input"
                            value="<?php echo $nombre; ?>" required>
                    </div>
                    <div class="group">
                        <label for="user" class="label">Descripción</label>
                        <input id="descripcion" name="descripcion" type="text" class="input"
                            value="<?php echo $descripcion; ?>" required>
                    </div>
                    <div class="group">
                        <label for="user" class="label">Cupo</label>
                        <input id="cupo" name="cupo" type="text" class="input" value="<?php echo $cupo; ?>" required>
                    </div>
                      <div class="group">
                       <label for="fecha-hora-inicio" class="label">Fecha y hora de inicio</label>
                       <input style="background-color: rgba(255, 255, 255, 0.7); color: #000;" id="fecha-hora-inicio" name="fecha-hora-inicio" type="datetime-local" class="input" value="<?php echo $fechai; ?>" required>
                     </div>
                    <div class="group">
                     <label for="fecha-hora-fin" class="label">Fecha y hora de fin</label>
                     <input style="background-color: rgba(255, 255, 255, 0.7); color: #000;" id="fecha-hora-fin" name="fecha-hora-fin" type="datetime-local" class="input" value="<?php echo $fechaf; ?>" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Ingresar">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                    </div>
                </form>
                <div class="group">
      <div class="group">
          <button id="voler" class="button" style="position: absolute;top: 130%;" onclick="location.href='capacitaciones.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>'">Volver</button>
      </div>
      
    </div>
  </div>
</div>
   <script src="assets/js/fecha.js"></script>
</body>
</html>