<?php $title = 'Cadastrar Usuário - Sistema ONG Pets'; ?>
<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">👥 Cadastrar Novo Usuário</h1>
            <a href="index.php?controller=usuario&action=index" class="btn btn-secondary">⬅️ Voltar à Lista</a>
        </div>
        
        <form method="POST" action="index.php?controller=usuario&action=store">
            <div class="form-group">
                <label for="nome" class="form-label">Nome Completo <span class="required">*</span></label>
                <input type="text" id="nome" name="nome" class="form-control" required 
                       placeholder="Digite o nome completo">
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" 
                       placeholder="Digite o email">
            </div>
            
            <div class="form-group">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" id="telefone" name="telefone" class="form-control" 
                       placeholder="(00) 00000-0000">
            </div>
            
            <h3>📍 Endereço (Opcional)</h3>
            <div class="form-group">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" 
                       placeholder="00000-000" maxlength="9">
            </div>
            
            <div class="grid" style="grid-template-columns: 2fr 1fr 1fr;">
                <div class="form-group">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" id="logradouro" name="logradouro" class="form-control" 
                           placeholder="Rua, Avenida, etc.">
                </div>
                
                <div class="form-group">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="form-control" 
                           placeholder="Bairro">
                </div>
                
                <div class="form-group">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" id="numero" name="numero" class="form-control" 
                           placeholder="Nº">
                </div>
            </div>
            
            <div class="grid" style="grid-template-columns: 2fr 1fr;">
                <div class="form-group">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="form-control" 
                           placeholder="Cidade">
                </div>
                
                <div class="form-group">
                    <label for="uf" class="form-label">UF</label>
                    <input type="text" id="uf" name="uf" class="form-control" 
                           placeholder="UF" maxlength="2">
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">💾 Cadastrar Usuário</button>
                <a href="index.php?controller=usuario&action=index" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
