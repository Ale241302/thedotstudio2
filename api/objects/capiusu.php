<?php

class Capiusu{
 
    // database connection and table name
    private $conn;
    private $table_name = "usuario_has_capacitaciones";
 
    // object properties
    public $capacitacion;
    public $usuario;
    public $fecha;

    // constructor with $db as database connection
     public function __construct($db) {
        $this->conn = $db;
       
    }

    function regi(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    usuario=:usuario, capacitacion=:capacitacion, fecha=:fecha";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->usuario=htmlspecialchars(strip_tags($this->usuario));
        $this->capacitacion=htmlspecialchars(strip_tags($this->capacitacion));
        $this->fecha=htmlspecialchars(strip_tags($this->fecha));
    
        // bind values
        
        $stmt->bindParam(":usuario", $this->usuario);
        $stmt->bindParam(":capacitacion", $this->capacitacion);
        $stmt->bindParam(":fecha", $this->fecha);
    
        // execute query
        if($stmt->execute()){
        $this->id = $this->conn->lastInsertId();

        // Restar el valor de "cupo" en la tabla "capacitaciones"
        $query = "UPDATE capacitaciones SET cupo = cupo - 1 WHERE id = :capacitacion";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":capacitacion", $this->capacitacion);
        $stmt->execute();

        return true;
    }
    
        return false;
        
    }
    
    
 public function Listar2() {
  try {
    $result = array();
    $rolUsuario = $_GET['rol']; // Obtener el rol del usuario que inicia sesión desde la URL
    $usuario = $_GET['usuario1']; // Obtener el nombre de usuario que inicia sesión desde la URL
    // Comprobar el rol del usuario que inicia sesión y ajustar la consulta en consecuencia
    if ($rolUsuario == 1) {
      // Mostrar solo el usuario que inició sesión
      $stm = $this->conn->prepare("SELECT usuario_has_capacitaciones.fecha, usuario.rol, usuario.id AS usuario, usuario.usuario AS nomusu, capacitaciones.nombre, capacitaciones.fechaf, capacitaciones.fechai, capacitaciones.id AS capacitacion FROM usuario_has_capacitaciones INNER JOIN usuario ON usuario.id = usuario_has_capacitaciones.usuario INNER JOIN capacitaciones ON capacitaciones.id = usuario_has_capacitaciones.capacitacion WHERE usuario.usuario = :usuario");
      $stm->bindParam(':usuario', $usuario);
     
    } elseif ($rolUsuario == 2) {
      // Mostrar todos los usuarios sin importar el rol
      $stm = $this->conn->prepare("SELECT usuario_has_capacitaciones.fecha, usuario.rol, usuario.id AS usuario, usuario.usuario AS nomusu, capacitaciones.nombre, capacitaciones.fechaf, capacitaciones.fechai, capacitaciones.id AS capacitacion FROM usuario_has_capacitaciones INNER JOIN usuario ON usuario.id = usuario_has_capacitaciones.usuario INNER JOIN capacitaciones ON capacitaciones.id = usuario_has_capacitaciones.capacitacion");
    } else {
      // Caso de manejo de error o manejo predeterminado si no se encuentra un rol válido
      // Puedes personalizar esto según tus necesidades
      return $result; // Devolver un array vacío o un mensaje de error, según corresponda
    }

    $stm->execute();

    return $stm->fetchAll(PDO::FETCH_OBJ);
  } catch(Exception $e) {
    die($e->getMessage());
  }
}


public function Eliminar($data)
    {
        try {
            // Obtener la información de la capacitación antes de eliminar el registro
        $query = "SELECT capacitacion FROM usuario_has_capacitaciones WHERE usuario = :usuario AND capacitacion = :capacitacion";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":usuario", $data->usuario);
        $stmt->bindParam(":capacitacion", $data->capacitacion);
        $stmt->execute();
        $capacitacion = $stmt->fetchColumn();

        // Eliminar el registro de la tabla "usuario_has_capacitaciones"
        $sql = "DELETE FROM usuario_has_capacitaciones WHERE usuario = :usuario AND capacitacion = :capacitacion";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":usuario", $data->usuario);
        $stmt->bindParam(":capacitacion", $data->capacitacion);
        $stmt->execute();

        // Sumar 1 al campo "cupo" en la tabla "capacitaciones"
        $query = "UPDATE capacitaciones SET cupo = cupo + 1 WHERE id = :capacitacion_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":capacitacion_id", $capacitacion);
        $stmt->execute();
        return true;

        } catch (PDOException $e) {
            die("Error al ejecutar la consulta de eliminación: " . $e->getMessage());
        }
    }
    function log4($usuario2){
       
        $fecha = date('Y-m-d H:i:s');
        $usuario = $_GET['usuario1'];
        $accion = "Inscripcion a Capacitacion ".$usuario2;
        $stmt2 = $this->conn->prepare('INSERT INTO log (usuario, accion, fecha) VALUES (:usuario, :accion, :fecha)');
        $stmt2->bindValue(':usuario', $usuario);
        $stmt2->bindValue(':accion', $accion);
        $stmt2->bindValue(':fecha', $fecha);
        $stmt2->execute();
        return $stmt2;
        }

    public function log5($usuario2){
    session_start(); // Iniciamos la sesión
    $usuario = $_GET['usuario1'];
    $fecha = date('Y-m-d H:i:s');
    $accion = "Eliminacion Inscripcion Capacitacion ".$usuario2;
    $stmt2 = $this->conn->prepare('INSERT INTO log (usuario, accion, fecha) VALUES (:usuario, :accion, :fecha)');
    $stmt2->bindValue(':usuario', $usuario);
    $stmt2->bindValue(':accion', $accion);
    $stmt2->bindValue(':fecha', $fecha);
    $stmt2->execute();
    return $stmt2;
    }
}
?>