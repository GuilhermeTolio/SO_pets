<?php $title = 'Editar Usuário - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">✏️ Editar Usuário: <?= htmlspecialchars($this->usuario->nome) ?></h1>
            <a href="index.php?controller=usuario&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
        </div>
        
        <form method="POST" action="index.php?controller=usuario&action=update&id=<?= $this->usuario->id ?>">
            <div class="form-group">
                <label for="nome" class="form-label">Nome Completo <span class="required">*</span></label>
                <input type="text" id="nome" name="nome" class="form-control" required 
                       value="<?= htmlspecialchars($this->usuario->nome) ?>"
                       placeholder="Digite o nome completo">
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="<?= htmlspecialchars($this->usuario->email) ?>"
                       placeholder="Digite o email">
            </div>
            
            <div class="form-group">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" id="telefone" name="telefone" class="form-control" 
                       value="<?= htmlspecialchars($this->usuario->telefone) ?>"
                       placeholder="11999887766" maxlength="11">
                <small class="form-text text-muted">Digite apenas números (máximo 11 dígitos)</small>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">💾 Salvar Alterações</button>
                <a href="index.php?controller=usuario&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
