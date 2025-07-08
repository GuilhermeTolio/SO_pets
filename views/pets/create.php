<?php $title = 'Cadastrar Pet - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Cadastrar Novo Pet</h1>
            <a href="index.php?controller=pet&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
        </div>
        
        <form method="POST" action="index.php?controller=pet&action=store">
            <div class="form-group">
                <label for="nome" class="form-label">Nome <span class="required">*</span></label>
                <input type="text" id="nome" name="nome" class="form-control" required 
                       placeholder="Digite o nome do pet">
            </div>
            
            <div class="form-group">
                <label for="especie" class="form-label">Espécie</label>
                <select id="especie" name="especie" class="form-control">
                    <option value="">Selecione a espécie</option>
                    <option value="Cão">Cão</option>
                    <option value="Gato">Gato</option>
                    <option value="Coelho">🐰 Coelho</option>
                    <option value="Pássaro">🐦 Pássaro</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" id="raca" name="raca" class="form-control" 
                       placeholder="Digite a raça do pet">
            </div>
            
            <div class="form-group">
                <label for="idade" class="form-label">Idade (anos)</label>
                <input type="number" id="idade" name="idade" class="form-control" 
                       min="0" max="30" placeholder="Idade em anos">
            </div>
            
            <div class="form-group">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" name="sexo" class="form-control">
                    <option value="">Selecione o sexo</option>
                    <option value="M">♂️ Macho</option>
                    <option value="F">♀️ Fêmea</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" id="cor" name="cor" class="form-control" 
                       placeholder="Digite a cor predominante">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">💾 Cadastrar Pet</button>
                <a href="index.php?controller=pet&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
