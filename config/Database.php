<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'ong_pets';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function getConnection() {
        $this->pdo = null;

        try {
            $this->pdo = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->pdo;
    }
}
?>
