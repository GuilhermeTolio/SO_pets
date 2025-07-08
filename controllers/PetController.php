<?php
require_once 'config/Database.php';
require_once 'models/Pet.php';

class PetController {
    private $db;
    private $pet;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pet = new Pet($this->db);
    }

    public function index() {
        try {
            $stmt = $this->pet->read();
            $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include 'views/pets/index.php';
        } catch (Exception $e) {
            echo "Erro ao carregar pets: " . $e->getMessage();
            error_log("Erro no PetController::index(): " . $e->getMessage());
            die();
        }
    }

    public function create() {
        include 'views/pets/create.php';
    }

    public function store() {
        if($_POST) {
            $this->pet->nome = $_POST['nome'];
            $this->pet->especie = $_POST['especie'];
            $this->pet->raca = $_POST['raca'];
            $this->pet->idade = $_POST['idade'];
            $this->pet->sexo = $_POST['sexo'];
            $this->pet->cor = $_POST['cor'];

            if($this->pet->create()) {
                header("Location: index.php?controller=pet&action=index&msg=Pet cadastrado com sucesso!");
            } else {
                header("Location: index.php?controller=pet&action=create&msg=Erro ao cadastrar pet!");
            }
        }
    }

    public function show($id) {
        $this->pet->id = $id;
        if($this->pet->readOne()) {
            include 'views/pets/show.php';
        } else {
            header("Location: index.php?controller=pet&action=index&msg=Pet não encontrado!");
        }
    }

    public function edit($id) {
        $this->pet->id = $id;
        if($this->pet->readOne()) {
            include 'views/pets/edit.php';
        } else {
            header("Location: index.php?controller=pet&action=index&msg=Pet não encontrado!");
        }
    }

    public function update($id) {
        if($_POST) {
            $this->pet->id = $id;
            $this->pet->nome = $_POST['nome'];
            $this->pet->especie = $_POST['especie'];
            $this->pet->raca = $_POST['raca'];
            $this->pet->idade = $_POST['idade'];
            $this->pet->sexo = $_POST['sexo'];
            $this->pet->cor = $_POST['cor'];

            if($this->pet->update()) {
                header("Location: index.php?controller=pet&action=index&msg=Pet atualizado com sucesso!");
            } else {
                header("Location: index.php?controller=pet&action=index&msg=Erro ao atualizar pet!");
            }
        }
    }

    public function delete($id) {
        $this->pet->id = $id;
        if($this->pet->delete()) {
            header("Location: index.php?controller=pet&action=index&msg=Pet excluído com sucesso!");
        } else {
            header("Location: index.php?controller=pet&action=index&msg=Erro ao excluir pet!");
        }
    }
}
?>
