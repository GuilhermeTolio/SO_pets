<?php $title = 'Lista de Pets - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">🐕 Gerenciar Pets</h1>
            <a href="index.php?controller=pet&action=create" class="btn btn-success">➕ Cadastrar Novo Pet</a>
        </div>
        
        <div class="form-group">
            <input type="text" id="filtro-pets" class="form-control" placeholder="🔍 Filtrar pets...">
        </div>
        
        <?php if(empty($pets)): ?>
            <div class="alert alert-info">
                Nenhum pet cadastrado ainda. <a href="index.php?controller=pet&action=create">Cadastre o primeiro pet</a>!
            </div>
        <?php else: ?>
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
                    <?php foreach($pets as $pet): ?>
                        <tr>
                            <td><?= htmlspecialchars($pet['id']) ?></td>
                            <td><?= htmlspecialchars($pet['nome']) ?></td>
                            <td><?= htmlspecialchars($pet['especie']) ?></td>
                            <td><?= htmlspecialchars($pet['raca']) ?></td>
                            <td><?= htmlspecialchars($pet['idade']) ?> anos</td>
                            <td><?= $pet['sexo'] === 'M' ? 'Macho' : 'Fêmea' ?></td>
                            <td><?= htmlspecialchars($pet['cor']) ?></td>
                            <td>
                                <a href="index.php?controller=pet&action=show&id=<?= $pet['id'] ?>" 
                                   class="btn btn-primary" title="Visualizar">👁️</a>
                                <a href="index.php?controller=pet&action=edit&id=<?= $pet['id'] ?>" 
                                   class="btn btn-warning" title="Editar">✏️</a>
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
    document.addEventListener('DOMContentLoaded', function() {
        filtrarTabela('filtro-pets', 'tabela-pets');
    });
</script>

<?php include 'views/partials/footer.php'; ?>
