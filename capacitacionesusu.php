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
  <title>Gestion de Capacitaciones Con Usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/img/1.png" rel="shortcut icon" type="imagen/x-icon">
  <link rel="stylesheet" href="assets/CSS/styletable.css"/>
  
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<script
      src="https://kit.fontawesome.com/7e5b2d153f.js"
      crossorigin="anonymous"
    ></script>
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
            <a onclick="location.href='./api/user/cerrar.php?usuario=<?php echo $usuario1; ?>&metodo=get;'" class="nav-menu-link nav-link nav-menu-link_active" id="ff">Cerrar Sesion</a>
          </li>
        </ul>
      </nav>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      // Define una variable global que contenga el valor del usuario
      const usuario = "<?php echo $usuario1; ?>";
      </script>
      <script src="assets/js/index.js"></script>
          </header>
<div class="tablap">
   <table class="table">
     <thead>
        <p align="center">Gestion de Capacitaciones Con Usuario</p>

        <tr>
         
         <th>Capacitacion</th>
         <th>Usuario</th>
         <th>Fecha Asistencia</th>
      <?php
              if ($rol >= 1 && $botonActivo) {
       echo'<th colspan="2">Opciones</th>';
      }?>
        </tr>

     </thead>
     <tbody>
            <?php
            require_once'api/config/database.php';
            require_once 'api/objects/capiusu.php';
           $database = new Database(); // Crear una instancia de la clase Database (suponiendo que tienes una clase Database para manejar la conexión a la base de datos)
            $db = $database->getConnection(); // Obtener la conexión a la base de datos
            $capiusu = new Capiusu($db); // Crear una instancia de la clase Capi, pasando la conexión a la base dedatos como argumento
            // Llamar al método Listar() de la instancia de Capi
           $resultado = $capiusu->Listar2();
            foreach($resultado as $r): ?>
        <tr>
            <?php $r->capacitacion; ?>
            <?php $r->usuario; ?>
            <?php $r->fechaf; ?>
            <?php $r->fechai; ?>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->nomusu; ?></td>
            <td><?php echo $r->fecha; ?></td>
         <?php
          // Obtener la fecha y hora actual
          $fecha_actual = time();
          // Convertir la fecha final a un valor de tiempo
          $fechaf = strtotime($r->fechaf);
            if ($rol >= 1 && $botonActivo){
               if ($fechaf >= $fecha_actual) {
                echo '<td id="pupu"><a href="api/user/elicapiusu.php?usuario1=' . $usuario1 . '&rol=' . $rol . '&usuario2=' . $r->usuario . '&capacitacion=' . $r->capacitacion . '&usuario=' . $r->nomusu . '"><button type="button" class="boton2">Eliminar</button></a></td>';
            } else {
                echo '<td></td>'; // Agrega una columna vacía si la diferencia es 0 o negativa
            }
        } else {
            echo '<td></td>'; // Oculta la columna del botón eliminar si la fecha es mayor o igual a la fecha actual
        }
        ?>
        </tr>
    <?php endforeach; ?>
     </tbody>
   </table>
  <?php
     if ($rol >= 1 && $botonActivo) {
    echo '<a href="regicausu.php?usuario1=' . urlencode($usuario1) . '&rol=' . urlencode($rol) . '" id="aa"><button type="button" class="boton">Agregar Capacitacion</button></a>';
     }
    ?>      
   </div>
</html>