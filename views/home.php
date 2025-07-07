<?php $title = 'Início - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div id="weather-widget" class="weather-widget">
        <h4>Carregando informações do clima...</h4>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Bem-vindo ao Sistema da ONG Pets! 🐾</h1>
            <p>Sistema de gerenciamento para organizações de proteção animal</p>
        </div>
        
        <div class="grid">
            <div class="home-card">
                <h3>🐕 Gerenciar Pets</h3>
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
    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Estatísticas Rápidas</h2>
        </div>
        
        <div class="grid">
            <div class="home-card">
                <h3>Pets Cadastrados</h3>
                <p class="counter" data-target="<?= rand(15, 50) ?>" style="font-size: 2em; font-weight: bold; color: #007bff;">0</p>
            </div>
            
            <div class="home-card">
                <h3>Usuários Ativos</h3>
                <p class="counter" data-target="<?= rand(25, 80) ?>" style="font-size: 2em; font-weight: bold; color: #28a745;">0</p>
            </div>
            
            <div class="home-card">
                <h3>Doações Recebidas</h3>
                <p class="counter" data-target="<?= rand(10, 30) ?>" style="font-size: 2em; font-weight: bold; color: #ffc107;">0</p>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Sobre o Sistema</h2>
        </div>
        <p>Este sistema foi desenvolvido para facilitar o gerenciamento de ONGs de proteção animal, oferecendo funcionalidades completas de CRUD para pets, usuários e doações, com interface moderna e consumo de APIs externas.</p>
        
        <h4>Funcionalidades:</h4>
        <ul style="margin-left: 2rem; margin-top: 1rem;">
            <li>✅ CRUD completo para Pets, Usuários e Doações</li>
            <li>✅ Interface responsiva e moderna</li>
            <li>✅ Feedbacks em tempo real</li>
            <li>✅ Validação de formulários</li>
            <li>✅ Consumo de APIs (CEP e Clima)</li>
            <li>✅ Arquitetura MVC com Orientação a Objetos</li>
        </ul>
    </div>
</div>

<script>
    // Animar contadores quando a página carregar
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(animateCounters, 500);
    });
</script>

<?php include 'views/partials/footer.php'; ?>
