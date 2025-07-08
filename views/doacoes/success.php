<?php $title = 'Operação Realizada com Sucesso - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>
<?php require_once 'helpers/StatusImageHelper.php'; ?>

<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <?php 
        $operation = $_GET['operation'] ?? 'created';
        $message = '';
        $title_msg = '';
        
        switch($operation) {
            case 'created':
                $title_msg = '💝 Doação Cadastrada com Sucesso!';
                $message = 'A doação foi registrada com sucesso no sistema.';
                break;
            case 'updated':
                $title_msg = '💝 Doação Atualizada com Sucesso!';
                $message = 'As informações da doação foram atualizadas com sucesso.';
                break;
            case 'deleted':
                $title_msg = '💝 Doação Removida com Sucesso!';
                $message = 'A doação foi removida do sistema com sucesso.';
                break;
            default:
                $title_msg = '💝 Operação Realizada com Sucesso!';
                $message = 'A operação foi realizada com sucesso.';
        }
        
        echo StatusImageHelper::getStatusCard(
            200, 
            $title_msg, 
            $message,
            'dog'
        );
        ?>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="index.php?controller=doacao&action=index" class="btn btn-primary">⬅️ Voltar à Lista de Doações</a>
            <a href="index.php?controller=doacao&action=create" class="btn btn-success">➕ Cadastrar Nova Doação</a>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
