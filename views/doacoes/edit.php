<?php $title = 'Editar Doação - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">✏️ Editar Doação: <?= htmlspecialchars($this->doacao->tipo) ?></h1>
            <a href="index.php?controller=doacao&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
        </div>
        
        <form method="POST" action="index.php?controller=doacao&action=update&id=<?= $this->doacao->id ?>">
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo de Doação <span class="required">*</span></label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="">Selecione o tipo de doação</option>
                    <option value="Dinheiro" <?= $this->doacao->tipo === 'Dinheiro' ? 'selected' : '' ?>>Dinheiro</option>
                    <option value="Ração" <?= $this->doacao->tipo === 'Ração' ? 'selected' : '' ?>>🥘 Ração</option>
                    <option value="Medicamento" <?= $this->doacao->tipo === 'Medicamento' ? 'selected' : '' ?>>💊 Medicamento</option>
                    <option value="Brinquedo" <?= $this->doacao->tipo === 'Brinquedo' ? 'selected' : '' ?>>🧸 Brinquedo</option>
                    <option value="Roupa/Cobertor" <?= $this->doacao->tipo === 'Roupa/Cobertor' ? 'selected' : '' ?>>👕 Roupa/Cobertor</option>
                    <option value="Cama/Casinha" <?= $this->doacao->tipo === 'Cama/Casinha' ? 'selected' : '' ?>>🛏️ Cama/Casinha</option>
                    <option value="Material de Limpeza" <?= $this->doacao->tipo === 'Material de Limpeza' ? 'selected' : '' ?>>🧽 Material de Limpeza</option>
                    <option value="Transporte" <?= $this->doacao->tipo === 'Transporte' ? 'selected' : '' ?>>🚗 Transporte</option>
                    <option value="Outro" <?= $this->doacao->tipo === 'Outro' ? 'selected' : '' ?>>📦 Outro</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="number" id="valor" name="valor" class="form-control" 
                       value="<?= htmlspecialchars($this->doacao->valor) ?>"
                       step="0.01" min="0" placeholder="0,00">
                <small style="color: #666;">Deixe em branco se for doação sem valor monetário</small>
            </div>
            
            <div class="form-group">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="4" 
                          placeholder="Descreva os detalhes da doação"><?= htmlspecialchars($this->doacao->descricao) ?></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">💾 Salvar Alterações</button>
                <a href="index.php?controller=doacao&action=show&id=<?= $this->doacao->id ?>" class="btn btn-primary">👁️ Visualizar</a>
                <a href="index.php?controller=doacao&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
