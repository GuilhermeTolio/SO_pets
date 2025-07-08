<?php
require_once 'config/Database.php';
require_once 'models/Doacao.php';

class DoacaoController {
    private $db;
    private $doacao;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->doacao = new Doacao($this->db);
    }

    public function index() {
        $stmt = $this->doacao->read();
        $doacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/doacoes/index.php';
    }

    public function create() {
        include 'views/doacoes/create.php';
    }

    public function store() {
        if($_POST) {
            $this->doacao->tipo = $_POST['tipo'];
            $this->doacao->valor = $_POST['valor'];
            $this->doacao->descricao = $_POST['descricao'];

            if($this->doacao->create()) {
                header("Location: index.php?controller=doacao&action=success&operation=created");
            } else {
                header("Location: index.php?controller=doacao&action=create&msg=Erro ao cadastrar doação!");
            }
        }
    }

    public function show($id) {
        $this->doacao->id = $id;
        if($this->doacao->readOne()) {
            include 'views/doacoes/show.php';
        } else {
            include 'views/doacoes/not_found.php';
        }
    }

    public function edit($id) {
        $this->doacao->id = $id;
        if($this->doacao->readOne()) {
            include 'views/doacoes/edit.php';
        } else {
            include 'views/doacoes/not_found.php';
        }
    }

    public function update($id) {
        if($_POST) {
            $this->doacao->id = $id;
            $this->doacao->tipo = $_POST['tipo'];
            $this->doacao->valor = $_POST['valor'];
            $this->doacao->descricao = $_POST['descricao'];

            if($this->doacao->update()) {
                header("Location: index.php?controller=doacao&action=success&operation=updated");
            } else {
                header("Location: index.php?controller=doacao&action=index&msg=Erro ao atualizar doação!");
            }
        }
    }

    public function delete($id) {
        $this->doacao->id = $id;
        if($this->doacao->delete()) {
            header("Location: index.php?controller=doacao&action=success&operation=deleted");
        } else {
            header("Location: index.php?controller=doacao&action=index&msg=Erro ao excluir doação!");
        }
    }

    public function success() {
        include 'views/doacoes/success.php';
    }
}
?>
