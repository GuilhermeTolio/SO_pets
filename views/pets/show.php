<?php $title = 'Visualizar Pet - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">🐕 Detalhes do Pet</h1>
            <div>
                <a href="index.php?controller=pet&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
                <a href="index.php?controller=pet&action=edit&id=<?= $this->pet->id ?>" class="btn btn-warning">✏️ Editar</a>
            </div>
        </div>
        
        <div class="grid" style="grid-template-columns: 1fr 1fr;">
            <div>
                <h3>📝 Informações Básicas</h3>
                <table class="table">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td><?= htmlspecialchars($this->pet->id) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nome:</strong></td>
                        <td><?= htmlspecialchars($this->pet->nome) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Espécie:</strong></td>
                        <td>
                            <?php
                            $especies = [
                                'Cão' => '🐕',
                                'Gato' => '🐱',
                                'Coelho' => '🐰',
                                'Pássaro' => '🐦',
                                'Outro' => '🐾'
                            ];
                            echo isset($especies[$this->pet->especie]) ? $especies[$this->pet->especie] . ' ' : '';
                            echo htmlspecialchars($this->pet->especie);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Raça:</strong></td>
                        <td><?= htmlspecialchars($this->pet->raca ?: 'Não informado') ?></td>
                    </tr>
                </table>
            </div>
            
            <div>
                <h3>🔍 Características</h3>
                <table class="table">
                    <tr>
                        <td><strong>Idade:</strong></td>
                        <td><?= htmlspecialchars($this->pet->idade ?: 'Não informado') ?> <?= $this->pet->idade ? 'anos' : '' ?></td>
                    </tr>
                    <tr>
                        <td><strong>Sexo:</strong></td>
                        <td>
                            <?php if($this->pet->sexo === 'M'): ?>
                                ♂️ Macho
                            <?php elseif($this->pet->sexo === 'F'): ?>
                                ♀️ Fêmea
                            <?php else: ?>
                                Não informado
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Cor:</strong></td>
                        <td><?= htmlspecialchars($this->pet->cor ?: 'Não informado') ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card" style="margin-top: 2rem; background-color: #f8f9fa;">
            <h3>🎯 Ações Disponíveis</h3>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="index.php?controller=pet&action=edit&id=<?= $this->pet->id ?>" 
                   class="btn btn-warning">✏️ Editar Informações</a>
                <a href="javascript:void(0)" 
                   onclick="confirmDelete('index.php?controller=pet&action=delete&id=<?= $this->pet->id ?>', 'pet')" 
                   class="btn btn-danger">🗑️ Excluir Pet</a>
                <a href="index.php?controller=pet&action=index" 
                   class="btn btn-primary">📋 Ver Todos os Pets</a>
                <a href="index.php?controller=pet&action=create" 
                   class="btn btn-success">➕ Cadastrar Novo Pet</a>
            </div>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
