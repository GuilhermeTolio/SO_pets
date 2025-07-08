<?php $title = 'Editar Pet - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <?php if (isset($statusImage)): ?>
        <?php echo $statusImage; ?>
        
        <div style="text-align: center; margin: 20px 0;">
            <a href="index.php?controller=pet&action=edit&id=<?= $this->pet->id ?>" class="btn btn-primary">🔄 Tentar Novamente</a>
            <a href="index.php?controller=pet&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
        </div>
    <?php else: ?>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">✏️ Editar Pet: <?= htmlspecialchars($this->pet->nome) ?></h1>
            <a href="index.php?controller=pet&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
        </div>
        
        <form method="POST" action="index.php?controller=pet&action=update&id=<?= $this->pet->id ?>">
            <div class="form-group">
                <label for="nome" class="form-label">Nome <span class="required">*</span></label>
                <input type="text" id="nome" name="nome" class="form-control" required 
                       value="<?= htmlspecialchars($this->pet->nome) ?>"
                       placeholder="Digite o nome do pet">
            </div>
            
            <div class="form-group">
                <label for="especie" class="form-label">Espécie</label>
                <select id="especie" name="especie" class="form-control">
                    <option value="">Selecione a espécie</option>
                    <option value="Cão" <?= $this->pet->especie === 'Cão' ? 'selected' : '' ?>>Cão</option>
                    <option value="Gato" <?= $this->pet->especie === 'Gato' ? 'selected' : '' ?>>Gato</option>
                    <option value="Coelho" <?= $this->pet->especie === 'Coelho' ? 'selected' : '' ?>>🐰 Coelho</option>
                    <option value="Pássaro" <?= $this->pet->especie === 'Pássaro' ? 'selected' : '' ?>>🐦 Pássaro</option>
                    <option value="Outro" <?= $this->pet->especie === 'Outro' ? 'selected' : '' ?>>Outro</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" id="raca" name="raca" class="form-control" 
                       value="<?= htmlspecialchars($this->pet->raca) ?>"
                       placeholder="Digite a raça do pet">
            </div>
            
            <div class="form-group">
                <label for="idade" class="form-label">Idade (anos)</label>
                <input type="number" id="idade" name="idade" class="form-control" 
                       value="<?= htmlspecialchars($this->pet->idade) ?>"
                       min="0" max="30" placeholder="Idade em anos">
            </div>
            
            <div class="form-group">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" name="sexo" class="form-control">
                    <option value="">Selecione o sexo</option>
                    <option value="M" <?= $this->pet->sexo === 'M' ? 'selected' : '' ?>>♂️ Macho</option>
                    <option value="F" <?= $this->pet->sexo === 'F' ? 'selected' : '' ?>>♀️ Fêmea</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" id="cor" name="cor" class="form-control" 
                       value="<?= htmlspecialchars($this->pet->cor) ?>"
                       placeholder="Digite a cor predominante">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">💾 Salvar Alterações</button>
                <a href="index.php?controller=pet&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    <?php endif; ?>
</div>

<?php include 'views/partials/footer.php'; ?>
