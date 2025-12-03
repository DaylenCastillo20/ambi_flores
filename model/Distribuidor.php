<?php
require_once 'Conexion.php';
class Distribuidor {
    private int $id_distribuidor;
    private string $Nombre_distribuidor;
    private string $Telefono_distribuidor;
    private string $Email_distribuidor;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_distribuidor(): int { return $this->id_distribuidor; }
    public function setId_distribuidor(int $id_distribuidor): void { $this->id_distribuidor = $id_distribuidor; }
    public function getNombre_distribuidor(): string { return $this->Nombre_distribuidor; }
    public function setNombre_distribuidor(string $Nombre_distribuidor): void { $this->Nombre_distribuidor = $Nombre_distribuidor; }
    public function getTelefono_distribuidor(): string { return $this->Telefono_distribuidor; }
    public function setTelefono_distribuidor(string $Telefono_distribuidor): void { $this->Telefono_distribuidor = $Telefono_distribuidor; }
    public function getEmail_distribuidor(): string { return $this->Email_distribuidor; }
    public function setEmail_distribuidor(string $Email_distribuidor): void { $this->Email_distribuidor = $Email_distribuidor; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO distribuidor (Nombre_distribuidor, Telefono_distribuidor, Email_distribuidor) VALUES (:Nombre_distribuidor, :Telefono_distribuidor, :Email_distribuidor)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Nombre_distribuidor' => $this->Nombre_distribuidor,
                ':Telefono_distribuidor' => $this->Telefono_distribuidor,
                ':Email_distribuidor' => $this->Email_distribuidor
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM distribuidor");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_distribuidor): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM distribuidor WHERE id_distribuidor = :id_distribuidor");
        $stmt->execute([':id_distribuidor' => $id_distribuidor]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE distribuidor SET Nombre_distribuidor = :Nombre_distribuidor, Telefono_distribuidor = :Telefono_distribuidor, Email_distribuidor = :Email_distribuidor WHERE id_distribuidor = :id_distribuidor";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Nombre_distribuidor' => $this->Nombre_distribuidor,
                ':Telefono_distribuidor' => $this->Telefono_distribuidor,
                ':Email_distribuidor' => $this->Email_distribuidor,
                ':id_distribuidor' => $this->id_distribuidor
        ]);
    }

    // DELETE
    public function delete(int $id_distribuidor): bool {
        $stmt = $this->conn->prepare("DELETE FROM distribuidor WHERE id_distribuidor = :id_distribuidor");
        return $stmt->execute([':id_distribuidor' => $id_distribuidor]);
    }
}
?>
