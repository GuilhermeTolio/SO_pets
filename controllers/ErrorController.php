<?php
require_once 'helpers/StatusImageHelper.php';

class ErrorController {
    
    public function show() {
        $errorCode = $_GET['code'] ?? 500;
        $errorMessage = $_GET['message'] ?? 'Ocorreu um erro inesperado no sistema.';
        
        include 'views/error_standalone.php';
    }
}
?>
