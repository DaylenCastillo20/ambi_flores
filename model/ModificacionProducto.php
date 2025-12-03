<?php
require_once 'Conexion.php';
class ModificacionProducto {
    private int $id_modificacion;
    private int $id_producto;
    private string $Campo_modificado;
    private float $Precio_anterior;
    private float $Precio_posterior;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_modificacion(): int { return $this->id_modificacion; }
    public function setId_modificacion(int $id_modificacion): void { $this->id_modificacion = $id_modificacion; }
    public function getId_producto(): int { return $this->id_producto; }
    public function setId_producto(int $id_producto): void { $this->id_producto = $id_producto; }
    public function getCampo_modificado(): string { return $this->Campo_modificado; }
    public function setCampo_modificado(string $Campo_modificado): void { $this->Campo_modificado = $Campo_modificado; }
    public function getPrecio_anterior(): float { return $this->Precio_anterior; }
    public function setPrecio_anterior(float $Precio_anterior): void { $this->Precio_anterior = $Precio_anterior; }
    public function getPrecio_posterior(): float { return $this->Precio_posterior; }
    public function setPrecio_posterior(float $Precio_posterior): void { $this->Precio_posterior = $Precio_posterior; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO modificacion_producto (Campo_modificado, Precio_anterior, Precio_posterior) VALUES (:Campo_modificado, :Precio_anterior, :Precio_posterior)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Campo_modificado' => $this->Campo_modificado,
                ':Precio_anterior' => $this->Precio_anterior,
                ':Precio_posterior' => $this->Precio_posterior
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM modificacion_producto");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_modificacion, int $id_producto): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM modificacion_producto WHERE id_modificacion = :id_modificacion AND id_producto = :id_producto");
        $stmt->execute([':id_modificacion' => $id_modificacion, ':id_producto' => $id_producto]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE modificacion_producto SET Campo_modificado = :Campo_modificado, Precio_anterior = :Precio_anterior, Precio_posterior = :Precio_posterior WHERE id_modificacion = :id_modificacion AND id_producto = :id_producto";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Campo_modificado' => $this->Campo_modificado,
                ':Precio_anterior' => $this->Precio_anterior,
                ':Precio_posterior' => $this->Precio_posterior,
                ':id_modificacion' => $this->id_modificacion,
                ':id_producto' => $this->id_producto
        ]);
    }

    // DELETE
    public function deleteByIds(int $id_modificacion, int $id_producto): bool {
        $stmt = $this->conn->prepare("DELETE FROM modificacion_producto WHERE id_modificacion = :id_modificacion AND id_producto = :id_producto");
        return $stmt->execute([':id_modificacion' => $id_modificacion, ':id_producto' => $id_producto]);
    }
}
?>
