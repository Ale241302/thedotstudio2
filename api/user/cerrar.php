<?php
session_start();
include_once '../config/database.php';
include_once '../objects/user.php';
if (isset($_GET['usuario'])) {
  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // prepare user object
  $user = new User($db);
  $user->usuario = $_GET['usuario'];
 
  // register log
  $user->log("Cierre de sesión");

  // log out user
  session_destroy();

  // redirect to login page
  header('Location: ../../login.php');
  exit;
} else {
  header('Location: ../../login.php');
  exit;
}
?>
