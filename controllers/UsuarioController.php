<?php
require_once 'config/Database.php';
require_once 'models/Usuario.php';

class UsuarioController {
    private $db;
    private $usuario;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function index() {
        $stmt = $this->usuario->read();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/usuarios/index.php';
    }

    public function create() {
        include 'views/usuarios/create.php';
    }

    public function store() {
        if($_POST) {
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->telefone = $_POST['telefone'];

            if($this->usuario->create()) {
                header("Location: index.php?controller=usuario&action=success&operation=created");
            } else {
                header("Location: index.php?controller=usuario&action=create&msg=Erro ao cadastrar usuário!");
            }
        }
    }

    public function show($id) {
        $this->usuario->id = $id;
        if($this->usuario->readOne()) {
            include 'views/usuarios/show.php';
        } else {
            include 'views/usuarios/not_found.php';
        }
    }

    public function edit($id) {
        $this->usuario->id = $id;
        if($this->usuario->readOne()) {
            include 'views/usuarios/edit.php';
        } else {
            include 'views/usuarios/not_found.php';
        }
    }

    public function update($id) {
        if($_POST) {
            $this->usuario->id = $id;
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->telefone = $_POST['telefone'];

            if($this->usuario->update()) {
                header("Location: index.php?controller=usuario&action=success&operation=updated");
            } else {
                header("Location: index.php?controller=usuario&action=index&msg=Erro ao atualizar usuário!");
            }
        }
    }

    public function delete($id) {
        $this->usuario->id = $id;
        if($this->usuario->delete()) {
            header("Location: index.php?controller=usuario&action=success&operation=deleted");
        } else {
            header("Location: index.php?controller=usuario&action=index&msg=Erro ao excluir usuário!");
        }
    }

    public function success() {
        include 'views/usuarios/success.php';
    }
}
?>
