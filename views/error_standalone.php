<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro - Sistema ONG Pets</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px; 
            background: #f5f5f5; 
            color: #333;
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            background: white; 
            border-radius: 12px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .error-card { 
            padding: 30px; 
            text-align: center; 
            border-left: 5px solid #dc3545;
        }
        .error-card h2 { 
            margin-bottom: 10px; 
            color: #333; 
        }
        .error-card p { 
            color: #666; 
            margin-bottom: 20px; 
        }
        .image-container { 
            margin: 20px 0; 
        }
        .status-image { 
            max-width: 300px; 
            border-radius: 8px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
        }
        .fallback { 
            display: none; 
            padding: 20px; 
            background: #f8f9fa; 
            border-radius: 8px; 
            color: #6c757d; 
        }
        .btn { 
            display: inline-block; 
            margin: 5px; 
            padding: 10px 20px; 
            background: #007bff; 
            color: white; 
            text-decoration: none; 
            border-radius: 4px; 
        }
        .btn:hover { 
            background: #0056b3; 
        }
        .btn-secondary { 
            background: #6c757d; 
        }
        .btn-secondary:hover { 
            background: #545b62; 
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
        $errorCode = $_GET['code'] ?? 500;
        $errorMessage = $_GET['message'] ?? 'Ocorreu um erro inesperado no sistema.';
        $title_msg = '';
        
        switch($errorCode) {
            case 400:
                $title_msg = '❌ Solicitação Inválida';
                break;
            case 404:
                $title_msg = '🔍 Página Não Encontrada';
                break;
            case 500:
                $title_msg = '⚠️ Erro Interno do Servidor';
                break;
            default:
                $title_msg = '❌ Erro no Sistema';
        }
        ?>
        
        <div class="error-card">
            <h2><?= $title_msg ?></h2>
            <p><?= htmlspecialchars($errorMessage) ?></p>
            
            <div class="image-container">
                <img src="https://http.cat/<?= $errorCode ?>" 
                     alt="HTTP Cat <?= $errorCode ?>" 
                     class="status-image"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                
                <div class="fallback">
                    <p>🔄 Status <?= $errorCode ?></p>
                    <p><?= htmlspecialchars($errorMessage) ?></p>
                </div>
            </div>
            
            <p style="margin-top: 15px; font-size: 14px; color: #999;">Status HTTP: <?= $errorCode ?></p>
        </div>
        
        <div style="text-align: center; margin: 30px;">
            <a href="<?= dirname($_SERVER['PHP_SELF']) !== '/SO_pets/views' ? '' : '../' ?>index.php" class="btn">🏠 Voltar ao Início</a>

        </div>
    </div>
</body>
</html>
