<?php
require_once 'config/Database.php';
require_once 'models/Pet.php';
require_once 'helpers/StatusImageHelper.php';
require_once 'helpers/ErrorHelper.php';

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
            if (strpos($e->getMessage(), 'relation "pets" does not exist') !== false) {
                ErrorHelper::handleTableNotFound('pets');
            } else {
                ErrorHelper::handleDatabaseError($e, 'carregar lista de pets');
            }
        }
    }

    public function create() {
        include 'views/pets/create.php';
    }

    public function store() {
        if($_POST) {
            if (empty($_POST['nome'])) {
                $errorMsg = "O nome do pet é obrigatório!";
                $statusImage = StatusImageHelper::getStatusCard(400, "Erro de Validação", $errorMsg, 'cat');
                include 'views/pets/create.php';
                return;
            }
            
            $this->pet->nome = $_POST['nome'];
            $this->pet->especie = $_POST['especie'];
            $this->pet->raca = $_POST['raca'];
            $this->pet->idade = $_POST['idade'];
            $this->pet->sexo = $_POST['sexo'];
            $this->pet->cor = $_POST['cor'];

            try {
                if($this->pet->create()) {
                    $successMsg = "Pet cadastrado com sucesso! Agora ele está disponível para adoção.";
                    $statusImage = StatusImageHelper::getStatusCard(201, "Pet Cadastrado!", $successMsg, 'dog');
                    header("Location: index.php?controller=pet&action=index&msg=success&status=201");
                } else {
                    $errorMsg = "Erro interno do servidor. Tente novamente mais tarde.";
                    $statusImage = StatusImageHelper::getStatusCard(500, "Erro Interno", $errorMsg, 'cat');
                    include 'views/pets/create.php';
                }
            } catch (Exception $e) {
                $errorMsg = "Erro interno do servidor: " . $e->getMessage();
                $statusImage = StatusImageHelper::getStatusCard(500, "Erro Interno", $errorMsg, 'cat');
                error_log("Erro no PetController::store(): " . $e->getMessage());
                include 'views/pets/create.php';
            }
        }
    }

    public function show($id) {
        $this->pet->id = $id;
        if($this->pet->readOne()) {
            include 'views/pets/show.php';
        } else {
            $errorMsg = "O pet que você está procurando não foi encontrado no nosso sistema.";
            $statusImage = StatusImageHelper::getStatusCard(404, "Pet Não Encontrado", $errorMsg, 'cat');
            include 'views/pets/not_found.php';
        }
    }

    public function edit($id) {
        $this->pet->id = $id;
        if($this->pet->readOne()) {
            include 'views/pets/edit.php';
        } else {
            $errorMsg = "O pet que você está tentando editar não foi encontrado no nosso sistema.";
            $statusImage = StatusImageHelper::getStatusCard(404, "Pet Não Encontrado", $errorMsg, 'cat');
            include 'views/pets/not_found.php';
        }
    }

    public function update($id) {
        if($_POST) {
            if (empty($_POST['nome'])) {
                $this->pet->id = $id;
                if($this->pet->readOne()) {
                    $errorMsg = "O nome do pet é obrigatório!";
                    $statusImage = StatusImageHelper::getStatusCard(400, "Erro de Validação", $errorMsg, 'cat');
                    include 'views/pets/edit.php';
                    return;
                }
            }
            
            $this->pet->id = $id;
            $this->pet->nome = $_POST['nome'];
            $this->pet->especie = $_POST['especie'];
            $this->pet->raca = $_POST['raca'];
            $this->pet->idade = $_POST['idade'];
            $this->pet->sexo = $_POST['sexo'];
            $this->pet->cor = $_POST['cor'];

            try {
                if($this->pet->update()) {
                    header("Location: index.php?controller=pet&action=index&msg=updated&status=200");
                } else {
                    if($this->pet->readOne()) {
                        $errorMsg = "Erro interno do servidor. Tente novamente mais tarde.";
                        $statusImage = StatusImageHelper::getStatusCard(500, "Erro Interno", $errorMsg, 'cat');
                        include 'views/pets/edit.php';
                    }
                }
            } catch (Exception $e) {
                if($this->pet->readOne()) {
                    $errorMsg = "Erro interno do servidor: " . $e->getMessage();
                    $statusImage = StatusImageHelper::getStatusCard(500, "Erro Interno", $errorMsg, 'cat');
                    error_log("Erro no PetController::update(): " . $e->getMessage());
                    include 'views/pets/edit.php';
                }
            }
        }
    }

    public function delete($id) {
        try {
            $this->pet->id = $id;
            if($this->pet->delete()) {
                header("Location: index.php?controller=pet&action=index&msg=deleted&status=200");
            } else {
                header("Location: index.php?controller=pet&action=index&msg=error&status=500");
            }
        } catch (Exception $e) {
            error_log("Erro no PetController::delete(): " . $e->getMessage());
            header("Location: index.php?controller=pet&action=index&msg=error&status=500");
        }
    }
}
?>
