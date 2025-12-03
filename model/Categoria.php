<?php
require_once 'Conexion.php';
class Categoria {
    private int $id_categoria;
    private string $nombre_categoria;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_categoria(): int { return $this->id_categoria; }
    public function setId_categoria(int $id_categoria): void { $this->id_categoria = $id_categoria; }
    public function getNombre_categoria(): string { return $this->nombre_categoria; }
    public function setNombre_categoria(string $nombre_categoria): void { $this->nombre_categoria = $nombre_categoria; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO categoria (nombre_categoria) VALUES (:nombre_categoria)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':nombre_categoria' => $this->nombre_categoria
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_categoria): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM categoria WHERE id_categoria = :id_categoria");
        $stmt->execute([':id_categoria' => $id_categoria]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE categoria SET nombre_categoria = :nombre_categoria WHERE id_categoria = :id_categoria";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':nombre_categoria' => $this->nombre_categoria,
                ':id_categoria' => $this->id_categoria
        ]);
    }

    // DELETE
    public function delete(int $id_categoria): bool {
        $stmt = $this->conn->prepare("DELETE FROM categoria WHERE id_categoria = :id_categoria");
        return $stmt->execute([':id_categoria' => $id_categoria]);
    }
}
?>
