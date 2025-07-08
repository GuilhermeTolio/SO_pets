<?php
class Pet {
    private $conn;
    private $table_name = "pets";

    public $id;
    public $nome;
    public $especie;
    public $raca;
    public $idade;
    public $sexo;
    public $cor;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nome, especie, raca, idade, sexo, cor) 
                  VALUES (:nome, :especie, :raca, :idade, :sexo, :cor)";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->especie = htmlspecialchars(strip_tags($this->especie));
        $this->raca = htmlspecialchars(strip_tags($this->raca));
        $this->idade = htmlspecialchars(strip_tags($this->idade));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));
        $this->cor = htmlspecialchars(strip_tags($this->cor));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":especie", $this->especie);
        $stmt->bindParam(":raca", $this->raca);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":cor", $this->cor);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read() {
        try {
            $query = "SELECT id, nome, especie, raca, idade, sexo, cor 
                      FROM " . $this->table_name . " 
                      ORDER BY nome ASC";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            error_log("Erro na consulta Pet::read(): " . $e->getMessage());
            throw $e;
        }
    }

    public function readOne() {
        $query = "SELECT id, nome, especie, raca, idade, sexo, cor 
                  FROM " . $this->table_name . " 
                  WHERE id = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->nome = $row['nome'];
            $this->especie = $row['especie'];
            $this->raca = $row['raca'];
            $this->idade = $row['idade'];
            $this->sexo = $row['sexo'];
            $this->cor = $row['cor'];
            return true;
        }

        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nome = :nome, especie = :especie, raca = :raca, 
                      idade = :idade, sexo = :sexo, cor = :cor 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->especie = htmlspecialchars(strip_tags($this->especie));
        $this->raca = htmlspecialchars(strip_tags($this->raca));
        $this->idade = htmlspecialchars(strip_tags($this->idade));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));
        $this->cor = htmlspecialchars(strip_tags($this->cor));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':especie', $this->especie);
        $stmt->bindParam(':raca', $this->raca);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':sexo', $this->sexo);
        $stmt->bindParam(':cor', $this->cor);
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
