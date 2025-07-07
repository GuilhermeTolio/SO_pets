<?php $title = 'Lista de Usuários - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">👥 Gerenciar Usuários</h1>
            <a href="index.php?controller=usuario&action=create" class="btn btn-success">➕ Cadastrar Novo Usuário</a>
        </div>
        
        <div class="form-group">
            <input type="text" id="filtro-usuarios" class="form-control" placeholder="🔍 Filtrar usuários...">
        </div>
        
        <?php if(empty($usuarios)): ?>
            <div class="alert alert-info">
                Nenhum usuário cadastrado ainda. <a href="index.php?controller=usuario&action=create">Cadastre o primeiro usuário</a>!
            </div>
        <?php else: ?>
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
                    <?php foreach($usuarios as $usuario): ?>
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
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        filtrarTabela('filtro-usuarios', 'tabela-usuarios');
    });
</script>

<?php include 'views/partials/footer.php'; ?>
