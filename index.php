<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function handleError($message, $code = 500) {
    $_GET['code'] = $code;
    $_GET['message'] = $message;
    include 'views/error_standalone.php';
    exit();
}

set_exception_handler(function($exception) {
    error_log("Exceção não capturada: " . $exception->getMessage());
    handleError("Erro interno do sistema: " . $exception->getMessage(), 500);
});

set_error_handler(function($severity, $message, $file, $line) {
    if (error_reporting() & $severity) {
        error_log("Erro PHP: $message em $file:$line");
        handleError("Erro no sistema: " . $message, 500);
    }
});

session_start();

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

try {
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
                case 'success':
                    $usuarioController->success();
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
                case 'success':
                    $doacaoController->success();
                    break;
            }
            break;
            
        case 'error':
            require_once 'controllers/ErrorController.php';
            $errorController = new ErrorController();
            $errorController->show();
            break;
            
        default:
            include 'views/home.php';
            break;
    }
} catch (Exception $e) {
    error_log("Erro capturado no index.php: " . $e->getMessage());
    handleError("Erro no sistema: " . $e->getMessage(), 500);
} catch (Error $e) {
    error_log("Erro fatal capturado no index.php: " . $e->getMessage());
    handleError("Erro crítico no sistema: " . $e->getMessage(), 500);
}
?>
