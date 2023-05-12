<?php
session_start();
date_default_timezone_set('America/Bogota');
$usuario1 = $_GET['usuario1'];
$rol = $_GET['rol'];
$diaSemana = intval(date('w')) +1 -1;

$horaActual = intval(date('H')) * 3600 + intval(date('i')) * 60 + intval(date('s')); // Convertir la hora actual a segundos

$esDiaLaboral = $diaSemana >= 1 && $diaSemana <= 5;
$estaEnHorario = ($horaActual >= 10 * 3600) && ($horaActual <= 22 * 3600); // Comparar en segundos

$botonActivo = $esDiaLaboral && $estaEnHorario;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <title>Gestion de Capacitaciones</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
  <link rel="stylesheet" href="assets/css/styletable.css"/>
  
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<script
      src="https://kit.fontawesome.com/7e5b2d153f.js"
      crossorigin="anonymous"
    ></script>
    <script>
      // Define una variable global que contenga el valor del usuario
      const usuario = "<?php echo $usuario1; ?>";
      </script>
     <script defer src="assets/js/script.js"></script>
</head>
<header class="header">
      <nav class="nav">
        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
          <li class="nav-menu-item">
            <a href="#" class="nav-menu-link nav-link" id="ff"></a>
          </li>
          <li class="nav-menu-item">
            <a href="capacitacionesusu.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>" class="nav-menu-link nav-link" id="ff">Capacitaciones Y Usuarios</a>
          </li>
          
          <li class="nav-menu-item">
            <a href="capacitaciones.php?usuario1=<?php echo $usuario1; ?>&rol=<?php echo $rol; ?>" class="nav-menu-link nav-link " id="ff">Gestion de Capacitaciones</a>
          </li>
          <li class="nav-menu-item">
            <a href="./api/user/cerrar.php?usuario=<?php echo $usuario1; ?>&metodo=get" class="nav-menu-link nav-link nav-menu-link_active" id="ff">Cerrar Sesion</a>
          </li>
        </ul>
      </nav>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="assets/js/index.js"></script>    
      </header>
<div class="tablap">
   <table class="table">
     <thead>
        <p align="center">Gestion de Capacitaciones</p>

        <tr>
         <th>id</th>
         <th>Nombre</th>
         <th>Descripcion</th>
         <th>Cupos Disponibles</th>
         <th>Fecha de Inicio</th>
         <th>Fecha de Finalizacion</th>
      <?php
              if ($rol != 1 && $botonActivo) {
       echo'<th colspan="2">Opciones</th>';
      }?>
        </tr>

     </thead>
     <tbody>
            <?php
            require_once'api/config/database.php';
            require_once 'api/objects/capi.php';

           $database = new Database(); // Crear una instancia de la clase Database (suponiendo que tienes una clase Database para manejar la conexión a la base de datos)
            $db = $database->getConnection(); // Obtener la conexión a la base de datos
            $capi = new Capi($db); // Crear una instancia de la clase Capi, pasando la conexión a la base dedatos como argumento
            // Llamar al método Listar() de la instancia de Capi
           $resultado = $capi->Listar();
            foreach($resultado as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td><?php echo $r->cupo; ?></td>
            <td><?php echo $r->fechai; ?></td>
            <td><?php echo $r->fechaf; ?></td>
         <?php
             // Obtener la fecha y hora actual
          $fecha_actual = time();
          // Convertir la fecha final a un valor de tiempo
          $fechaf = strtotime($r->fechaf);
              if ($rol != 1 && $botonActivo) {
                 echo '<td id="pupu"><a href="modigica.php?usuario1=' . $usuario1 . '&rol=' . $rol . '&id=' . $r->id . '"><button type="button" class="boton2">Modificar</button></a></td>';
                 if ($fechaf >= $fecha_actual){
                   echo '<td id="pupu"><a href="api/user/elicapi.php?usuario1=' . $usuario1 . '&rol=' .$rol .'&id=' . $r->id . '"> <button type="button" class="boton2">Eliminar</button> </a></td>';
               }else {
            echo '<td></td>'; // Oculta la columna del botón eliminar si la fecha es mayor o igual a la fecha actual
              }
            }else {
            echo '<td></td>'; // Oculta la columna del botón eliminar si la fecha es mayor o igual a la fecha actual
            }
            ?>
        </tr>
    <?php endforeach; ?>

     </tbody>

   </table>
  <?php
     if ($rol != 1 && $botonActivo) {
    echo '<a href="regica.php?usuario1=' . urlencode($usuario1) . '&rol=' . urlencode($rol) . '" id="aa"><button type="button" class="boton">Agregar Capacitacion</button></a>';
     }
    ?>             
   </div>

</body>
</html>
