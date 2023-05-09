<?php
class User {
    private $conn;
    private $table_name = "usuario";

    public $id;
    public $usuario;
    public $password;
    public $nombre;
    public $correo;
    public $telefono;
    public $accion;
    public $fecha;
    public $rol;

    public function __construct($db){
        $this->conn = $db;
    }

    public function signup() {
        if($this->isAlreadyExist()) {
            return false;
        }

        $query = "INSERT INTO {$this->table_name} 
            SET usuario=:usuario, password=:password, nombre=:nombre, correo=:correo, telefono=:telefono, rol=:rol";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':usuario' => $this->usuario,
            ':password' => $this->password,
            ':nombre' => $this->nombre,
            ':correo' => $this->correo,
            ':telefono' => $this->telefono,
            ':rol' => $this->rol,
        ]);

        if($stmt->rowCount() > 0) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    public function login() {
        $query = "SELECT id, usuario, password FROM {$this->table_name} WHERE usuario=:usuario AND password=:password";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':usuario' => $this->usuario,
            ':password' => $this->password,
        ]);

        return $stmt;
    }

    public function log($accion) {
    try {
        $fecha = date('Y-m-d H:i:s');
        $stmt = $this->conn->prepare('INSERT INTO log (usuario, accion, fecha) VALUES (:usuario, :accion, :fecha)');
        $stmt->execute([
            ':usuario' => $this->usuario,
            ':accion' => $accion,
            ':fecha' => $fecha,
        ]);
    } catch (PDOException $e) {
        // Handle the error, log it to a file or database, or display an error message
        echo "Error: " . $e->getMessage();
    }

    return $stmt;
    }
 
    private function isAlreadyExist() {
        $query = "SELECT COUNT(*) as count FROM {$this->table_name} WHERE usuario=:usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':usuario' => $this->usuario,
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }
}

?>