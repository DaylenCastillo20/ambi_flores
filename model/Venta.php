<?php
require_once 'Conexion.php';
class Venta {
    private int $id_venta;
    private string $Fecha_venta;
    private float $Total_venta;
    private int $id_usuario;
    private int $id_cliente;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_venta(): int { return $this->id_venta; }
    public function setId_venta(int $id_venta): void { $this->id_venta = $id_venta; }
    public function getFecha_venta(): string { return $this->Fecha_venta; }
    public function setFecha_venta(string $Fecha_venta): void { $this->Fecha_venta = $Fecha_venta; }
    public function getTotal_venta(): float { return $this->Total_venta; }
    public function setTotal_venta(float $Total_venta): void { $this->Total_venta = $Total_venta; }
    public function getId_usuario(): int { return $this->id_usuario; }
    public function setId_usuario(int $id_usuario): void { $this->id_usuario = $id_usuario; }
    public function getId_cliente(): int { return $this->id_cliente; }
    public function setId_cliente(int $id_cliente): void { $this->id_cliente = $id_cliente; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO venta (Fecha_venta, Total_venta, id_usuario, id_cliente) VALUES (:Fecha_venta, :Total_venta, :id_usuario, :id_cliente)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Fecha_venta' => $this->Fecha_venta,
                ':Total_venta' => $this->Total_venta,
                ':id_usuario' => $this->id_usuario,
                ':id_cliente' => $this->id_cliente
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM venta");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_venta): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM venta WHERE id_venta = :id_venta");
        $stmt->execute([':id_venta' => $id_venta]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE venta SET Fecha_venta = :Fecha_venta, Total_venta = :Total_venta, id_usuario = :id_usuario, id_cliente = :id_cliente WHERE id_venta = :id_venta";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Fecha_venta' => $this->Fecha_venta,
                ':Total_venta' => $this->Total_venta,
                ':id_usuario' => $this->id_usuario,
                ':id_cliente' => $this->id_cliente,
                ':id_venta' => $this->id_venta
        ]);
    }

    // DELETE
    public function delete(int $id_venta): bool {
        $stmt = $this->conn->prepare("DELETE FROM venta WHERE id_venta = :id_venta");
        return $stmt->execute([':id_venta' => $id_venta]);
    }
}
?>
