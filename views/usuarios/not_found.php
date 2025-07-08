<?php $title = 'Usuário Não Encontrado - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>
<?php require_once 'helpers/StatusImageHelper.php'; ?>

<div class="container">
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <?php if (isset($statusImage)): ?>
            <?php echo $statusImage; ?>
        <?php else: ?>
            <?php 
            echo StatusImageHelper::getStatusCard(
                404, 
                '👥 Usuário Não Encontrado', 
                'O usuário que você está procurando não foi encontrado no nosso sistema.',
                'cat'
            );
            ?>
        <?php endif; ?>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="index.php?controller=usuario&action=index" class="btn btn-primary">⬅️ Voltar à Lista de Usuários</a>
            <a href="index.php?controller=usuario&action=create" class="btn btn-success">➕ Cadastrar Novo Usuário</a>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
