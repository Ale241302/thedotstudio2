<?php
class Capi{
 
    // database connection and table name
    private $conn;
    private $table_name = "capacitaciones";
 
    // object properties
    public $id;
    public $nombre;
    public $descripcion;
    public $cupo;
    public $fechai;
    public $fechaf;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function regi(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nombre=:nombre, descripcion=:descripcion, cupo=:cupo, fechai=:fechai, fechaf=:fechaf";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->cupo=htmlspecialchars(strip_tags($this->cupo));
        $this->fechai=htmlspecialchars(strip_tags($this->fechai));
        $this->fechaf=htmlspecialchars(strip_tags($this->fechaf));
    
        // bind values
        
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":cupo", $this->cupo);
        $stmt->bindParam(":fechai", $this->fechai);
        $stmt->bindParam(":fechaf", $this->fechaf);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;
        
    }
    
    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->conn->prepare("SELECT * FROM capacitaciones ");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }
    public function Eliminar($id)
    {
        try  
        {   
            $stm = $this->conn
                        ->prepare("DELETE FROM capacitaciones WHERE id = ?");

            $stm->execute(array($id));
        
        } catch (Exception $e) 
        {   
            $stm = $this->conn->rollback();
            die($e->getMessage());
        }
    }
     function log(){
        session_start(); // Iniciamos la sesión
        $usuario = $_GET['usuario1'];
        $fecha = date('Y-m-d H:i:s');
        $accion = "Creacion de Capacitacion";
        $stmt2 = $this->conn->prepare('INSERT INTO log (usuario, accion, fecha) VALUES (:usuario, :accion, :fecha)');
        $stmt2->bindValue(':usuario', $usuario);
        $stmt2->bindValue(':accion', $accion);
        $stmt2->bindValue(':fecha', $fecha);
        $stmt2->execute();
        return $stmt2;
    }
    function log2(){
        session_start(); // Iniciamos la sesión
        $usuario = $_GET['usuario1'];
        $fecha = date('Y-m-d H:i:s');
        $accion = "Modificacion de Capacitacion";
        $stmt2 = $this->conn->prepare('INSERT INTO log (usuario, accion, fecha) VALUES (:usuario, :accion, :fecha)');
        $stmt2->bindValue(':usuario', $usuario);
        $stmt2->bindValue(':accion', $accion);
        $stmt2->bindValue(':fecha', $fecha);
        $stmt2->execute();
        return $stmt2;
    }
    function log3(){
        session_start(); // Iniciamos la sesión
        $usuario = $_GET['usuario1'];
        $fecha = date('Y-m-d H:i:s');
        $accion = "Eliminacion de Capacitacion";
        $stmt2 = $this->conn->prepare('INSERT INTO log (usuario, accion, fecha) VALUES (:usuario, :accion, :fecha)');
        $stmt2->bindValue(':usuario', $usuario);
        $stmt2->bindValue(':accion', $accion);
        $stmt2->bindValue(':fecha', $fecha);
        $stmt2->execute();
        return $stmt2;
    }
    
    public function Actualizar($data)
{
    try {
        $sql = "UPDATE capacitaciones SET 
                    nombre = :nombre, 
                    descripcion = :descripcion,
                    cupo = :cupo,
                    fechai = :fechai,
                    fechaf = :fechaf
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nombre", $data->nombre);
        $stmt->bindParam(":descripcion", $data->descripcion);
        $stmt->bindParam(":cupo", $data->cupo);
        $stmt->bindParam(":fechai", $data->fechai);
        $stmt->bindParam(":fechaf", $data->fechaf);
        $stmt->bindParam(":id", $data->id);

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die("Error al ejecutar la consulta de actualización: " . $e->getMessage());
    }
}

}
?>