<?php

class ErrorHelper {
    
    public static function showError($message, $code = 500) {
        error_log("Erro exibido: [$code] $message");
        $_GET['code'] = $code;
        $_GET['message'] = $message;
        include __DIR__ . '/../views/error_standalone.php';
        exit();
    }
    
    public static function handleDatabaseError($exception, $context = '') {
        $message = "Erro no banco de dados";
        if ($context) {
            $message .= " ($context)";
        }
        $message .= ": " . $exception->getMessage();
        
        self::showError($message, 500);
    }
    
    public static function handleTableNotFound($tableName) {
        $message = "Tabela '$tableName' não existe no banco de dados. Verifique se o banco foi criado corretamente.";
        self::showError($message, 500);
    }
}
?>
