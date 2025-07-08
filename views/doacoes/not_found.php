<?php $title = 'Doação Não Encontrada - Sistema ONG Pets'; ?>
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
                '💝 Doação Não Encontrada', 
                'A doação que você está procurando não foi encontrada no nosso sistema.',
                'dog'
            );
            ?>
        <?php endif; ?>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="index.php?controller=doacao&action=index" class="btn btn-primary">⬅️ Voltar à Lista de Doações</a>
            <a href="index.php?controller=doacao&action=create" class="btn btn-success">➕ Cadastrar Nova Doação</a>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
