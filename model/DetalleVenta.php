<?php
require_once 'Conexion.php';
class DetalleVenta {
    private int $id_venta;
    private int $id_producto;
    private int $CANTIDAD;
    private float $Precio_unitario;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_venta(): int { return $this->id_venta; }
    public function setId_venta(int $id_venta): void { $this->id_venta = $id_venta; }
    public function getId_producto(): int { return $this->id_producto; }
    public function setId_producto(int $id_producto): void { $this->id_producto = $id_producto; }
    public function getCANTIDAD(): int { return $this->CANTIDAD; }
    public function setCANTIDAD(int $CANTIDAD): void { $this->CANTIDAD = $CANTIDAD; }
    public function getPrecio_unitario(): float { return $this->Precio_unitario; }
    public function setPrecio_unitario(float $Precio_unitario): void { $this->Precio_unitario = $Precio_unitario; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO detalle_venta (CANTIDAD, Precio_unitario) VALUES (:CANTIDAD, :Precio_unitario)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':CANTIDAD' => $this->CANTIDAD,
                ':Precio_unitario' => $this->Precio_unitario
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM detalle_venta");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_venta, int $id_producto): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM detalle_venta WHERE id_venta = :id_venta AND id_producto = :id_producto");
        $stmt->execute([':id_venta' => $id_venta, ':id_producto' => $id_producto]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE detalle_venta SET CANTIDAD = :CANTIDAD, Precio_unitario = :Precio_unitario WHERE id_venta = :id_venta AND id_producto = :id_producto";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':CANTIDAD' => $this->CANTIDAD,
                ':Precio_unitario' => $this->Precio_unitario,
                ':id_venta' => $this->id_venta,
                ':id_producto' => $this->id_producto
        ]);
    }

    // DELETE
    public function deleteByIds(int $id_venta, int $id_producto): bool {
        $stmt = $this->conn->prepare("DELETE FROM detalle_venta WHERE id_venta = :id_venta AND id_producto = :id_producto");
        return $stmt->execute([':id_venta' => $id_venta, ':id_producto' => $id_producto]);
    }
}
?>
