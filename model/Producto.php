<?php
require_once 'Conexion.php';
class Producto {
    private int $id_producto;
    private string $nombre_producto;
    private int $id_categoria;
    private int $unidad;
    private float $precio;
    private string $estado;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_producto(): int { return $this->id_producto; }
    public function setId_producto(int $id_producto): void { $this->id_producto = $id_producto; }
    public function getNombre_producto(): string { return $this->nombre_producto; }
    public function setNombre_producto(string $nombre_producto): void { $this->nombre_producto = $nombre_producto; }
    public function getId_categoria(): int { return $this->id_categoria; }
    public function setId_categoria(int $id_categoria): void { $this->id_categoria = $id_categoria; }
    public function getUnidad(): int { return $this->unidad; }
    public function setUnidad(int $unidad): void { $this->unidad = $unidad; }
    public function getPrecio(): float { return $this->precio; }
    public function setPrecio(float $precio): void { $this->precio = $precio; }
    public function getEstado(): string { return $this->estado; }
    public function setEstado(string $estado): void { $this->estado = $estado; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO producto (nombre_producto, id_categoria, unidad, precio, estado) VALUES (:nombre_producto, :id_categoria, :unidad, :precio, :estado)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':nombre_producto' => $this->nombre_producto,
                ':id_categoria' => $this->id_categoria,
                ':unidad' => $this->unidad,
                ':precio' => $this->precio,
                ':estado' => $this->estado
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM producto");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_producto): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM producto WHERE id_producto = :id_producto");
        $stmt->execute([':id_producto' => $id_producto]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE producto SET nombre_producto = :nombre_producto, id_categoria = :id_categoria, unidad = :unidad, precio = :precio, estado = :estado WHERE id_producto = :id_producto";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':nombre_producto' => $this->nombre_producto,
                ':id_categoria' => $this->id_categoria,
                ':unidad' => $this->unidad,
                ':precio' => $this->precio,
                ':estado' => $this->estado,
                ':id_producto' => $this->id_producto
        ]);
    }

    // DELETE
    public function delete(int $id_producto): bool {
        $stmt = $this->conn->prepare("DELETE FROM producto WHERE id_producto = :id_producto");
        return $stmt->execute([':id_producto' => $id_producto]);
    }
}
?>
