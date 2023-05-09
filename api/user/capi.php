<?php
 
// Obtener la conexión a la base de datos
include_once '../config/database.php';
 
// Incluir las clases Capi y User
include_once '../objects/capi.php';

// Crear una instancia de la clase Database
$database = new Database();
$db = $database->getConnection();

// Iniciar sesión
session_start();
$usuario = $_GET['usuario1'];
$rol = $_GET['rol'];
// Crear una instancia de la clase Capi
$capi = new Capi($db);

// Crear una instancia de la clase User
 
// Obtener los valores del formulario y asignarlos a la instancia de Capi
$capi->nombre = $_POST['nombre'];
$capi->descripcion = $_POST['descripcion'];
$capi->cupo = $_POST['cupo'];
$capi->fechai = $_POST['fechai'];
$capi->fechaf = $_POST['fechaf'];
// Start output buffering
ob_start();

// Crear el registro de capacitación
if ($capi->regi()) {
	$capi->log();
    // Redireccionar a la página "capacitaciones.php" con el parámetro "usuario" en la URL
   header('Location: ../../capacitaciones.php?usuario1=' . urlencode($usuario) . '&rol=' . urlencode($rol) .'');
    // Enviar el buffer de salida al navegador
    ob_end_flush();
} else {
    echo "Error en el registro";
    exit;
}
?>
