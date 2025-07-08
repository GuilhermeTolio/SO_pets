<?php
class Doacao {
    private $conn;
    private $table_name = "doacao";

    public $id;
    public $tipo;
    public $valor;
    public $descricao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (tipo, valor, descricao) 
                  VALUES (:tipo, :valor, :descricao)";

        $stmt = $this->conn->prepare($query);

        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));

        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":descricao", $this->descricao);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
    public function read() {
        $query = "SELECT id, tipo, valor, descricao 
                  FROM " . $this->table_name . " 
                  ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    public function readOne() {
        $query = "SELECT id, tipo, valor, descricao 
                  FROM " . $this->table_name . " 
                  WHERE id = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->tipo = $row['tipo'];
            $this->valor = $row['valor'];
            $this->descricao = $row['descricao'];
            return true;
        }

        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET tipo = :tipo, valor = :valor, descricao = :descricao 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
