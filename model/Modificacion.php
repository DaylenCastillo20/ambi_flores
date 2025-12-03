<?php
require_once 'Conexion.php';
class Modificacion {
    private int $id_modificacion;
    private string $fecha_modificacion;
    private int $id_usuario;
    private string $Descripcion;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_modificacion(): int { return $this->id_modificacion; }
    public function setId_modificacion(int $id_modificacion): void { $this->id_modificacion = $id_modificacion; }
    public function getFecha_modificacion(): string { return $this->fecha_modificacion; }
    public function setFecha_modificacion(string $fecha_modificacion): void { $this->fecha_modificacion = $fecha_modificacion; }
    public function getId_usuario(): int { return $this->id_usuario; }
    public function setId_usuario(int $id_usuario): void { $this->id_usuario = $id_usuario; }
    public function getDescripcion(): string { return $this->Descripcion; }
    public function setDescripcion(string $Descripcion): void { $this->Descripcion = $Descripcion; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO modificacion (fecha_modificacion, id_usuario, Descripcion) VALUES (:fecha_modificacion, :id_usuario, :Descripcion)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':fecha_modificacion' => $this->fecha_modificacion,
                ':id_usuario' => $this->id_usuario,
                ':Descripcion' => $this->Descripcion
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM modificacion");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_modificacion): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM modificacion WHERE id_modificacion = :id_modificacion");
        $stmt->execute([':id_modificacion' => $id_modificacion]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE modificacion SET fecha_modificacion = :fecha_modificacion, id_usuario = :id_usuario, Descripcion = :Descripcion WHERE id_modificacion = :id_modificacion";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':fecha_modificacion' => $this->fecha_modificacion,
                ':id_usuario' => $this->id_usuario,
                ':Descripcion' => $this->Descripcion,
                ':id_modificacion' => $this->id_modificacion
        ]);
    }

    // DELETE
    public function delete(int $id_modificacion): bool {
        $stmt = $this->conn->prepare("DELETE FROM modificacion WHERE id_modificacion = :id_modificacion");
        return $stmt->execute([':id_modificacion' => $id_modificacion]);
    }
}
?>
