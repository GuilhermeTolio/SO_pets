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
                $title_msg = '👥 Usuário Cadastrado com Sucesso!';
                $message = 'O usuário foi registrado com sucesso no sistema.';
                break;
            case 'updated':
                $title_msg = '👥 Usuário Atualizado com Sucesso!';
                $message = 'As informações do usuário foram atualizadas com sucesso.';
                break;
            case 'deleted':
                $title_msg = '👥 Usuário Removido com Sucesso!';
                $message = 'O usuário foi removido do sistema com sucesso.';
                break;
            default:
                $title_msg = '👥 Operação Realizada com Sucesso!';
                $message = 'A operação foi realizada com sucesso.';
        }
        
        echo StatusImageHelper::getStatusCard(
            200, 
            $title_msg, 
            $message,
            'cat'
        );
        ?>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="index.php?controller=usuario&action=index" class="btn btn-primary">⬅️ Voltar à Lista de Usuários</a>
            <a href="index.php?controller=usuario&action=create" class="btn btn-success">➕ Cadastrar Novo Usuário</a>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
