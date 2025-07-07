<?php $title = 'Visualizar Doação - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">💝 Detalhes da Doação</h1>
            <div>
                <a href="index.php?controller=doacao&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
                <a href="index.php?controller=doacao&action=edit&id=<?= $this->doacao->id ?>" class="btn btn-warning">✏️ Editar</a>
            </div>
        </div>
        
        <div class="grid" style="grid-template-columns: 1fr 1fr;">
            <div>
                <h3>📝 Informações da Doação</h3>
                <table class="table">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td><?= htmlspecialchars($this->doacao->id) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tipo:</strong></td>
                        <td>
                            <?php
                            $tipos = [
                                'Dinheiro' => '💰',
                                'Ração' => '🥘',
                                'Medicamento' => '💊',
                                'Brinquedo' => '🧸',
                                'Roupa' => '👕',
                                'Cama' => '🛏️',
                                'Material' => '🧽',
                                'Transporte' => '🚗',
                                'Outro' => '📦'
                            ];
                            $icone = '📦';
                            foreach($tipos as $tipo => $emoji) {
                                if(stripos($this->doacao->tipo, $tipo) !== false) {
                                    $icone = $emoji;
                                    break;
                                }
                            }
                            echo $icone . ' ' . htmlspecialchars($this->doacao->tipo);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Valor:</strong></td>
                        <td>
                            <?php if($this->doacao->valor && $this->doacao->valor > 0): ?>
                                <span style="color: #28a745; font-weight: bold;">
                                    R$ <?= number_format($this->doacao->valor, 2, ',', '.') ?>
                                </span>
                            <?php else: ?>
                                <span style="color: #666;">Sem valor monetário</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div>
                <h3>📊 Status da Doação</h3>
                <div class="card" style="background-color: #f8f9fa; padding: 1rem;">
                    <p><strong>Status:</strong> <span style="color: #28a745;">✅ Recebida</span></p>
                    <p><strong>Data de Registro:</strong> Hoje</p>
                    <p><strong>Categoria:</strong> 
                        <?php
                        if(stripos($this->doacao->tipo, 'Dinheiro') !== false) {
                            echo '<span style="color: #007bff;">💰 Monetária</span>';
                        } else {
                            echo '<span style="color: #28a745;">📦 Material</span>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        
        <?php if($this->doacao->descricao): ?>
        <div style="margin-top: 2rem;">
            <h3>📄 Descrição Detalhada</h3>
            <div class="card" style="background-color: #f8f9fa; padding: 1.5rem;">
                <p style="margin: 0; white-space: pre-wrap;"><?= htmlspecialchars($this->doacao->descricao) ?></p>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="card" style="margin-top: 2rem; background-color: #f8f9fa;">
            <h3>🎯 Ações Disponíveis</h3>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="index.php?controller=doacao&action=edit&id=<?= $this->doacao->id ?>" 
                   class="btn btn-warning">✏️ Editar Doação</a>
                <a href="javascript:void(0)" 
                   onclick="confirmDelete('index.php?controller=doacao&action=delete&id=<?= $this->doacao->id ?>', 'doação')" 
                   class="btn btn-danger">🗑️ Excluir Doação</a>
                <a href="index.php?controller=doacao&action=index" 
                   class="btn btn-primary">📋 Ver Todas as Doações</a>
                <a href="index.php?controller=doacao&action=create" 
                   class="btn btn-success">➕ Registrar Nova Doação</a>
            </div>
        </div>
        
        <div class="card" style="margin-top: 2rem; background-color: #e3f2fd;">
            <h3>🙏 Agradecimento</h3>
            <p>Esta doação é muito importante para o cuidado dos nossos pets! Cada contribuição faz a diferença na vida dos animais que cuidamos.</p>
            <p><strong>💝 Muito obrigado pela generosidade!</strong></p>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
