<?php $title = 'Início - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Bem-vindo ao Sistema da ONG Pets!</h1>
            <p>Sistema de gerenciamento para organizações de proteção animal</p>
        </div>
        
        <div class="grid">
            <div class="home-card">
                <h3>🐾 Gerenciar Pets</h3>
                <p>Cadastre, consulte e gerencie informações dos pets disponíveis para adoção</p>
                <a href="index.php?controller=pet&action=index" class="btn btn-primary">Acessar Pets</a>
            </div>
            
            <div class="home-card">
                <h3>👥 Gerenciar Usuários</h3>
                <p>Cadastre e gerencie informações dos adotantes e voluntários</p>
                <a href="index.php?controller=usuario&action=index" class="btn btn-success">Acessar Usuários</a>
            </div>
            
            <div class="home-card">
                <h3>💝 Gerenciar Doações</h3>
                <p>Registre e acompanhe as doações recebidas pela organização</p>
                <a href="index.php?controller=doacao&action=index" class="btn btn-warning">Acessar Doações</a>
            </div>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>

<?php include 'views/partials/footer.php'; ?>
