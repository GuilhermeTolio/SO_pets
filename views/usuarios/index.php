<?php $title = 'Lista de Usuários - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>
<?php require_once 'helpers/StatusImageHelper.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">👥 Gerenciar Usuários</h1>
            <a href="index.php?controller=usuario&action=create" class="btn btn-success">➕ Cadastrar Novo Usuário</a>
        </div>

        <div class="form-group">
            <input type="text" id="filtro-usuarios" class="form-control" placeholder="Filtrar usuários...">
        </div>

        <?php if (!empty($usuarios)): ?>
            <table class="table" id="tabela-usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['id']) ?></td>
                            <td><?= htmlspecialchars($usuario['nome']) ?></td>
                            <td><?= htmlspecialchars($usuario['email']) ?></td>
                            <td><?= htmlspecialchars($usuario['telefone']) ?></td>
                            <td>
                                <a href="index.php?controller=usuario&action=show&id=<?= $usuario['id'] ?>"
                                    class="btn btn-primary" title="Visualizar">👁️</a>
                                <a href="index.php?controller=usuario&action=edit&id=<?= $usuario['id'] ?>"
                                    class="btn btn-warning" title="Editar">✏️</a>
                                <a href="javascript:void(0)"
                                    onclick="confirmDelete('index.php?controller=usuario&action=delete&id=<?= $usuario['id'] ?>', 'usuário')"
                                    class="btn btn-danger" title="Excluir">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div style="max-width: 600px; margin: 2rem auto;">
                <?php 
                echo StatusImageHelper::getStatusCard(
                    204, 
                    '👥 Nenhum Usuário Cadastrado', 
                    'Não há usuários registrados no sistema ainda. Que tal cadastrar o primeiro?',
                    'cat'
                );
                ?>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="index.php?controller=usuario&action=create" class="btn btn-success">➕ Cadastrar Primeiro Usuário</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        filtrarTabela('filtro-usuarios', 'tabela-usuarios');
    });
</script>

<?php include 'views/partials/footer.php'; ?>