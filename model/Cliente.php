<?php
require_once 'Conexion.php';
class Cliente {
    private int $id_cliente;
    private string $Nombre_cliente;
    private string $Telefono_cliente;
    private string $Direccion;
    private string $Email_cliente;
    private PDO $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function getId_cliente(): int { return $this->id_cliente; }
    public function setId_cliente(int $id_cliente): void { $this->id_cliente = $id_cliente; }
    public function getNombre_cliente(): string { return $this->Nombre_cliente; }
    public function setNombre_cliente(string $Nombre_cliente): void { $this->Nombre_cliente = $Nombre_cliente; }
    public function getTelefono_cliente(): string { return $this->Telefono_cliente; }
    public function setTelefono_cliente(string $Telefono_cliente): void { $this->Telefono_cliente = $Telefono_cliente; }
    public function getDireccion(): string { return $this->Direccion; }
    public function setDireccion(string $Direccion): void { $this->Direccion = $Direccion; }
    public function getEmail_cliente(): string { return $this->Email_cliente; }
    public function setEmail_cliente(string $Email_cliente): void { $this->Email_cliente = $Email_cliente; }

    // CREATE
    public function create(): bool {
        $sql = "INSERT INTO cliente (Nombre_cliente, Telefono_cliente, Direccion, Email_cliente) VALUES (:Nombre_cliente, :Telefono_cliente, :Direccion, :Email_cliente)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Nombre_cliente' => $this->Nombre_cliente,
                ':Telefono_cliente' => $this->Telefono_cliente,
                ':Direccion' => $this->Direccion,
                ':Email_cliente' => $this->Email_cliente
        ]);
    }

    // READ ALL
    public function readAll(): array {
        $stmt = $this->conn->query("SELECT * FROM cliente");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ BY ID
    public function readById(int $id_cliente): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE id_cliente = :id_cliente");
        $stmt->execute([':id_cliente' => $id_cliente]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // UPDATE
    public function update(): bool {
        $sql = "UPDATE cliente SET Nombre_cliente = :Nombre_cliente, Telefono_cliente = :Telefono_cliente, Direccion = :Direccion, Email_cliente = :Email_cliente WHERE id_cliente = :id_cliente";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
                ':Nombre_cliente' => $this->Nombre_cliente,
                ':Telefono_cliente' => $this->Telefono_cliente,
                ':Direccion' => $this->Direccion,
                ':Email_cliente' => $this->Email_cliente,
                ':id_cliente' => $this->id_cliente
        ]);
    }

    // DELETE
    public function delete(int $id_cliente): bool {
        $stmt = $this->conn->prepare("DELETE FROM cliente WHERE id_cliente = :id_cliente");
        return $stmt->execute([':id_cliente' => $id_cliente]);
    }
}
?>
