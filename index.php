<?php
session_start();

// Roteamento simples
$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch($controller) {
    case 'pet':
        require_once 'controllers/PetController.php';
        $petController = new PetController();
        
        switch($action) {
            case 'index':
                $petController->index();
                break;
            case 'create':
                $petController->create();
                break;
            case 'store':
                $petController->store();
                break;
            case 'show':
                $petController->show($id);
                break;
            case 'edit':
                $petController->edit($id);
                break;
            case 'update':
                $petController->update($id);
                break;
            case 'delete':
                $petController->delete($id);
                break;
        }
        break;
        
    case 'usuario':
        require_once 'controllers/UsuarioController.php';
        $usuarioController = new UsuarioController();
        
        switch($action) {
            case 'index':
                $usuarioController->index();
                break;
            case 'create':
                $usuarioController->create();
                break;
            case 'store':
                $usuarioController->store();
                break;
            case 'show':
                $usuarioController->show($id);
                break;
            case 'edit':
                $usuarioController->edit($id);
                break;
            case 'update':
                $usuarioController->update($id);
                break;
            case 'delete':
                $usuarioController->delete($id);
                break;
        }
        break;
        
    case 'doacao':
        require_once 'controllers/DoacaoController.php';
        $doacaoController = new DoacaoController();
        
        switch($action) {
            case 'index':
                $doacaoController->index();
                break;
            case 'create':
                $doacaoController->create();
                break;
            case 'store':
                $doacaoController->store();
                break;
            case 'show':
                $doacaoController->show($id);
                break;
            case 'edit':
                $doacaoController->edit($id);
                break;
            case 'update':
                $doacaoController->update($id);
                break;
            case 'delete':
                $doacaoController->delete($id);
                break;
        }
        break;
        
    default:
        include 'views/home.php';
        break;
}
?>
