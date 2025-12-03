<?php
require_once 'Conexion.php';
class Compra {
    private int $id_compra;
    private string $Fecha_compra;
    private float $Total_compra;
    private int $id_usuario;
    private int $id_distribuidor;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_compra(): int { return $this->id_compra; }
    public function setId_compra(int $id_compra): void { $this->id_compra = $id_compra; }
    public function getFecha_compra(): string { return $this->Fecha_compra; }
    public function setFecha_compra(string $Fecha_compra): void { $this->Fecha_compra = $Fecha_compra; }
    public function getTotal_compra(): float { return $this->Total_compra; }
    public function setTotal_compra(float $Total_compra): void { $this->Total_compra = $Total_compra; }
    public function getId_usuario(): int { return $this->id_usuario; }
    public function setId_usuario(int $id_usuario): void { $this->id_usuario = $id_usuario; }
    public function getId_distribuidor(): int { return $this->id_distribuidor; }
    public function setId_distribuidor(int $id_distribuidor): void { $this->id_distribuidor = $id_distribuidor; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO compra (Fecha_compra, Total_compra, id_usuario, id_distribuidor) VALUES (:Fecha_compra, :Total_compra, :id_usuario, :id_distribuidor)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Fecha_compra' => $this->Fecha_compra,
                ':Total_compra' => $this->Total_compra,
                ':id_usuario' => $this->id_usuario,
                ':id_distribuidor' => $this->id_distribuidor
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM compra");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_compra): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM compra WHERE id_compra = :id_compra");
        $stmt->execute([':id_compra' => $id_compra]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE compra SET Fecha_compra = :Fecha_compra, Total_compra = :Total_compra, id_usuario = :id_usuario, id_distribuidor = :id_distribuidor WHERE id_compra = :id_compra";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Fecha_compra' => $this->Fecha_compra,
                ':Total_compra' => $this->Total_compra,
                ':id_usuario' => $this->id_usuario,
                ':id_distribuidor' => $this->id_distribuidor,
                ':id_compra' => $this->id_compra
        ]);
    }

    // DELETE
    public function delete(int $id_compra): bool {
        $stmt = $this->conn->prepare("DELETE FROM compra WHERE id_compra = :id_compra");
        return $stmt->execute([':id_compra' => $id_compra]);
    }
}
?>
