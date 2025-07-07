<?php $title = 'Registrar Doação - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">💝 Registrar Nova Doação</h1>
            <a href="index.php?controller=doacao&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
        </div>
        
        <form method="POST" action="index.php?controller=doacao&action=store">
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo de Doação <span class="required">*</span></label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="">Selecione o tipo de doação</option>
                    <option value="Dinheiro">💰 Dinheiro</option>
                    <option value="Ração">🥘 Ração</option>
                    <option value="Medicamento">💊 Medicamento</option>
                    <option value="Brinquedo">🧸 Brinquedo</option>
                    <option value="Roupa/Cobertor">👕 Roupa/Cobertor</option>
                    <option value="Cama/Casinha">🛏️ Cama/Casinha</option>
                    <option value="Material de Limpeza">🧽 Material de Limpeza</option>
                    <option value="Transporte">🚗 Transporte</option>
                    <option value="Outro">📦 Outro</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="number" id="valor" name="valor" class="form-control" 
                       step="0.01" min="0" placeholder="0,00">
                <small style="color: #666;">Deixe em branco se for doação sem valor monetário</small>
            </div>
            
            <div class="form-group">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="4" 
                          placeholder="Descreva os detalhes da doação (quantidade, estado, observações, etc.)"></textarea>
            </div>
            
            <div class="card" style="background-color: #f8f9fa; margin: 1rem 0;">
                <h4>💡 Dicas para o Preenchimento</h4>
                <ul style="margin-left: 1.5rem;">
                    <li><strong>Dinheiro:</strong> Informe o valor exato</li>
                    <li><strong>Ração:</strong> Especifique marca, sabor e quantidade (kg)</li>
                    <li><strong>Medicamentos:</strong> Informe nome, dosagem e validade</li>
                    <li><strong>Outros itens:</strong> Descreva estado de conservação e quantidade</li>
                </ul>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">💾 Registrar Doação</button>
                <a href="index.php?controller=doacao&action=index" class="btn btn-secondary">❌ Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Mostrar/ocultar campo de valor baseado no tipo
    document.getElementById('tipo').addEventListener('change', function() {
        const valorGroup = document.getElementById('valor').parentElement;
        const tiposComValor = ['Dinheiro', 'Transporte'];
        
        if (tiposComValor.includes(this.value)) {
            valorGroup.style.display = 'block';
            document.getElementById('valor').focus();
        }
    });
</script>

<?php include 'views/partials/footer.php'; ?>
