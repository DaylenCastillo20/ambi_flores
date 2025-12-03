<?php
require_once 'Conexion.php';
class Usuario {
    private int $id_usuario;
    private string $Nombre_usuario;
    private string $Email_usuario;
    private string $Telefono;
    private string $Contraseña;
    private string $Rol;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_usuario(): int { return $this->id_usuario; }
    public function setId_usuario(int $id_usuario): void { $this->id_usuario = $id_usuario; }
    public function getNombre_usuario(): string { return $this->Nombre_usuario; }
    public function setNombre_usuario(string $Nombre_usuario): void { $this->Nombre_usuario = $Nombre_usuario; }
    public function getEmail_usuario(): string { return $this->Email_usuario; }
    public function setEmail_usuario(string $Email_usuario): void { $this->Email_usuario = $Email_usuario; }
    public function getTelefono(): string { return $this->Telefono; }
    public function setTelefono(string $Telefono): void { $this->Telefono = $Telefono; }
    public function getContraseña(): string { return $this->Contraseña; }
    public function setContraseña(string $Contraseña): void { $this->Contraseña = $Contraseña; }
    public function getRol(): string { return $this->Rol; }
    public function setRol(string $Rol): void { $this->Rol = $Rol; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO usuario (Nombre_usuario, Email_usuario, Telefono, Contraseña, Rol) VALUES (:Nombre_usuario, :Email_usuario, :Telefono, :Contraseña, :Rol)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Nombre_usuario' => $this->Nombre_usuario,
                ':Email_usuario' => $this->Email_usuario,
                ':Telefono' => $this->Telefono,
                ':Contraseña' => $this->Contraseña,
                ':Rol' => $this->Rol
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM usuario");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_usuario): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
        $stmt->execute([':id_usuario' => $id_usuario]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE usuario SET Nombre_usuario = :Nombre_usuario, Email_usuario = :Email_usuario, Telefono = :Telefono, Contraseña = :Contraseña, Rol = :Rol WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Nombre_usuario' => $this->Nombre_usuario,
                ':Email_usuario' => $this->Email_usuario,
                ':Telefono' => $this->Telefono,
                ':Contraseña' => $this->Contraseña,
                ':Rol' => $this->Rol,
                ':id_usuario' => $this->id_usuario
        ]);
    }

    // DELETE
    public function delete(int $id_usuario): bool {
        $stmt = $this->conn->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario");
        return $stmt->execute([':id_usuario' => $id_usuario]);
    }
}
?>
