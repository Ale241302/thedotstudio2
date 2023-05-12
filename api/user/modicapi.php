<?php
// Obtener la conexión a la base de datos
include_once '../config/database.php';

// Incluir la clase Capi
include_once '../objects/capi.php';

// Crear una instancia de la clase Database
$database = new Database();
$db = $database->getConnection();

// Iniciar sesión
session_start();

// Obtener los valores del formulario y asignarlos a variables
$usuario1 = isset($_GET['usuario1']) ? $_GET['usuario1'] : '';
$rol = isset($_GET['rol']) ? $_GET['rol'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
$cupo = isset($_POST['cupo']) ? $_POST['cupo'] : '';
$fechai = isset($_POST['fecha-hora-inicio']) ? $_POST['fecha-hora-inicio'] : '';
$fechaf = isset($_POST['fecha-hora-fin']) ? $_POST['fecha-hora-fin'] : '';
// Crear una instancia de la clase Capi
$capi = new Capi($db);

// Start output buffering
ob_start();

// Crear el objeto $data con los valores actualizados
$data = new stdClass();
$data->id = $id;
$data->nombre = $nombre;
$data->descripcion = $descripcion;
$data->cupo = $cupo;
$data->fechai = $fechai;
$data->fechaf = $fechaf;

// Actualizar el registro de capacitación
if ($capi->Actualizar($data)) {
	$capi->log2();
    // Redireccionar a la página "capacitaciones.php" con los parámetros "usuario" y "rol" en la URL
    header('Location: ../../capacitaciones.php?usuario1=' . urlencode($usuario1) . '&rol=' . urlencode($rol));
    // Enviar el buffer de salida al navegador
    ob_end_flush();
} else {
    echo "error al modificar";
    exit;
}
?>

