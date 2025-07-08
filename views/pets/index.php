<?php 
require_once 'helpers/StatusImageHelper.php';
$title = 'Lista de Pets - Sistema ONG Pets'; 
?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <?php if (isset($_GET['msg']) && isset($_GET['status'])): ?>
        <div style="max-width: 600px; margin: 0 auto 30px;">
            <?php 
            $statusCode = $_GET['status'];
            $msg = $_GET['msg'];
            
            if ($msg === 'success' && $statusCode == '201') {
                echo StatusImageHelper::getStatusCard(201, "Pet Cadastrado com Sucesso!", "O novo pet foi adicionado ao sistema!", 'dog');
            } elseif ($msg === 'updated' && $statusCode == '200') {
                echo StatusImageHelper::getStatusCard(200, "✅ Pet Atualizado com Sucesso!", "As informações do pet foram atualizadas no sistema.", 'dog');
            } elseif ($msg === 'deleted' && $statusCode == '200') {
                echo StatusImageHelper::getStatusCard(200, "🗑️ Pet Removido com Sucesso!", "O pet foi removido do sistema.", 'dog');
            } elseif ($msg === 'error' && $statusCode == '500') {
                echo StatusImageHelper::getStatusCard(500, "💥 Erro na Operação", "Ocorreu um erro ao processar a solicitação. Tente novamente.", 'cat');
            }
            ?>
        </div>
    <?php endif; ?>
    
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Gerenciar Pets</h1>
            <a href="index.php?controller=pet&action=create" class="btn btn-success">➕ Cadastrar Novo Pet</a>
        </div>

        <div class="form-group">
            <input type="text" id="filtro-pets" class="form-control" placeholder="Filtrar pets...">
        </div>

        <?php if (!empty($pets)): ?>
            <table class="table" id="tabela-pets">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th>Idade</th>
                        <th>Sexo</th>
                        <th>Cor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pets as $pet): ?>
                        <tr>
                            <td><?= htmlspecialchars($pet['id']) ?></td>
                            <td><?= htmlspecialchars($pet['nome']) ?></td>
                            <td><?= htmlspecialchars($pet['especie']) ?></td>
                            <td><?= htmlspecialchars($pet['raca']) ?></td>
                            <td><?= htmlspecialchars($pet['idade']) ?> anos</td>
                            <td><?= $pet['sexo'] === 'M' ? 'Macho' : 'Fêmea' ?></td>
                            <td><?= htmlspecialchars($pet['cor']) ?></td>
                            <td>
                                <a href="index.php?controller=pet&action=show&id=<?= $pet['id'] ?>" class="btn btn-primary"
                                    title="Visualizar">👁️</a>
                                <a href="index.php?controller=pet&action=edit&id=<?= $pet['id'] ?>" class="btn btn-warning"
                                    title="Editar">✏️</a>
                                <a href="javascript:void(0)"
                                    onclick="confirmDelete('index.php?controller=pet&action=delete&id=<?= $pet['id'] ?>', 'pet')"
                                    class="btn btn-danger" title="Excluir">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        filtrarTabela('filtro-pets', 'tabela-pets');
    });
</script>

<?php include 'views/partials/footer.php'; ?>