<?php
include_once '../config/database.php';
include_once '../objects/user.php';
session_start();

if (isset($_GET['usuario'])) {
  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // prepare user object
  $user = new User($db);
  $user->usuario = $_GET['usuario'];

  // log out user
  session_destroy();

  // register log
  $user->log("Cerrada Por Inactividad");
  // redirect to login page
  header('Location: ../../login.php');
  exit;
} else {
  header('Location: ../../login.php');
  exit;
}
?>