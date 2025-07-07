<?php $title = 'Lista de Doações - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">💝 Gerenciar Doações</h1>
            <a href="index.php?controller=doacao&action=create" class="btn btn-success">➕ Registrar Nova Doação</a>
        </div>
        
        <div class="form-group">
            <input type="text" id="filtro-doacoes" class="form-control" placeholder="🔍 Filtrar doações...">
        </div>
        
        <?php if(empty($doacoes)): ?>
            <div class="alert alert-info">
                Nenhuma doação registrada ainda. <a href="index.php?controller=doacao&action=create">Registre a primeira doação</a>!
            </div>
        <?php else: ?>
            <table class="table" id="tabela-doacoes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($doacoes as $doacao): ?>
                        <tr>
                            <td><?= htmlspecialchars($doacao['id']) ?></td>
                            <td>
                                <?php
                                $tipos = [
                                    'Dinheiro' => '💰',
                                    'Ração' => '🥘',
                                    'Medicamento' => '💊',
                                    'Brinquedo' => '🧸',
                                    'Roupa' => '👕',
                                    'Cama' => '🛏️',
                                    'Outro' => '📦'
                                ];
                                $icone = '';
                                foreach($tipos as $tipo => $emoji) {
                                    if(stripos($doacao['tipo'], $tipo) !== false) {
                                        $icone = $emoji . ' ';
                                        break;
                                    }
                                }
                                echo $icone . htmlspecialchars($doacao['tipo']);
                                ?>
                            </td>
                            <td>
                                <?php if($doacao['valor'] && $doacao['valor'] > 0): ?>
                                    R$ <?= number_format($doacao['valor'], 2, ',', '.') ?>
                                <?php else: ?>
                                    <span style="color: #666;">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars(substr($doacao['descricao'], 0, 50)) ?><?= strlen($doacao['descricao']) > 50 ? '...' : '' ?></td>
                            <td>
                                <a href="index.php?controller=doacao&action=show&id=<?= $doacao['id'] ?>" 
                                   class="btn btn-primary" title="Visualizar">👁️</a>
                                <a href="index.php?controller=doacao&action=edit&id=<?= $doacao['id'] ?>" 
                                   class="btn btn-warning" title="Editar">✏️</a>
                                <a href="javascript:void(0)" 
                                   onclick="confirmDelete('index.php?controller=doacao&action=delete&id=<?= $doacao['id'] ?>', 'doação')" 
                                   class="btn btn-danger" title="Excluir">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="card" style="margin-top: 2rem; background-color: #f8f9fa;">
                <h3>📊 Resumo das Doações</h3>
                <div class="grid">
                    <div>
                        <strong>Total de Doações:</strong> <?= count($doacoes) ?>
                    </div>
                    <div>
                        <strong>Valor Total:</strong> 
                        R$ <?= number_format(array_sum(array_column($doacoes, 'valor')), 2, ',', '.') ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        filtrarTabela('filtro-doacoes', 'tabela-doacoes');
    });
</script>

<?php include 'views/partials/footer.php'; ?>
