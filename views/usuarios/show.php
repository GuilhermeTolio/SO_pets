<?php $title = 'Visualizar Usuário - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">👥 Detalhes do Usuário</h1>
            <div>
                <a href="index.php?controller=usuario&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
                <a href="index.php?controller=usuario&action=edit&id=<?= $this->usuario->id ?>" class="btn btn-warning">✏️ Editar</a>
            </div>
        </div>
        
        <div class="grid" style="grid-template-columns: 1fr 1fr;">
            <div>
                <h3>Informações Pessoais</h3>
                <table class="table">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td><?= htmlspecialchars($this->usuario->id) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nome:</strong></td>
                        <td><?= htmlspecialchars($this->usuario->nome) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>
                            <?php if($this->usuario->email): ?>
                                <a href="mailto:<?= htmlspecialchars($this->usuario->email) ?>">
                                    <?= htmlspecialchars($this->usuario->email) ?>
                                </a>
                            <?php else: ?>
                                Não informado
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Telefone:</strong></td>
                        <td>
                            <?php if($this->usuario->telefone): ?>
                                <a href="tel:<?= htmlspecialchars($this->usuario->telefone) ?>">
                                    <?= htmlspecialchars($this->usuario->telefone) ?>
                                </a>
                            <?php else: ?>
                                Não informado
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div>
                <h3>Estatísticas</h3>
                <div class="card" style="background-color: #f8f9fa; padding: 1rem;">
                    <p><strong>Data de Cadastro:</strong> Hoje</p>
                    <p><strong>Status:</strong> <span style="color: #28a745;">Ativo</span></p>
                    <p><strong>Tipo:</strong> Adotante/Voluntário</p>
                </div>
            </div>
        </div>
        
        <?php if($this->usuario->email): ?>
        <div class="card" style="margin-top: 2rem; background-color: #e3f2fd;">
            <h3>Ações de Comunicação</h3>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="mailto:<?= htmlspecialchars($this->usuario->email) ?>?subject=Contato ONG Pets" 
                   class="btn btn-primary">Enviar Email</a>
                <?php if($this->usuario->telefone): ?>
                <a href="https://wa.me/55<?= preg_replace('/\D/', '', $this->usuario->telefone) ?>?text=Olá, <?= urlencode($this->usuario->nome) ?>!" 
                   class="btn btn-success" target="_blank">💬 WhatsApp</a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
