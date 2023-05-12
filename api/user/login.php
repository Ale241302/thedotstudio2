<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
session_start();

// prepare user object
$user = new User($db);

// check if the username and password are provided
if (!isset($_GET['usuario']) || !isset($_GET['password'])) {
    die('Usuario o contraseña no proporcionados.');
}

// set username and password properties
$user->usuario = $_GET['usuario'];
$user->password = base64_encode($_GET['password']);

// validate user credentials
$stmt = $user->login();

if ($stmt->rowCount() > 0) {
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // get user's role from the database
    $stmt2 = $db->prepare("SELECT rol FROM usuario WHERE usuario = :usuario");
    $stmt2->bindParam(':usuario', $user->usuario);
    $stmt2->execute();
    $user->log("Inicio de Sesión");
    // fetch the role from the database
    $resultado = $stmt2->fetch();

    // store the role in the session variable
    $rol = $resultado['rol'];

    // redirect to the appropriate page based on the role
        header('Location: ../../capacitacionesusu.php?usuario1=' . urlencode($user->usuario) . '&rol=' . urlencode($rol));

    exit();
} else {
    echo "<script>alert('Usuario o contraseña incorrecto.')</script>";
    echo "<script>window.location.href='../../login.php';</script>";
    exit();
}
?>