<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'santos';
    private $username = 'santos';
    private $password = 'yGqV54kwCAuQyzqX';
    private $port = '5432';
    private $pdo;


    //    private $host = 'localhost';
//     private $db_name = 'OS_pets';
//     private $username = 'postgres';
//     private $password = 'postgres';
//     private $port = '5432';
//     private $pdo;

    public function getConnection()
    {
        $this->pdo = null;

        try {
            $this->pdo = new PDO(
                "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET NAMES 'UTF8'");
        } catch (PDOException $exception) {
            echo "Erro de conexão com o banco de dados: " . $exception->getMessage();
            error_log("Erro de conexão PDO: " . $exception->getMessage());
            die();
        }

        return $this->pdo;
    }
}
?>