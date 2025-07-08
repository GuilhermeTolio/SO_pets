
# 🧪 Testes das Imagens de Status HTTP
---

## 🐕 Testes de Doações (Dog Images)

### 📋 Páginas Normais  
*Teste as páginas principais do CRUD de doações*

- [Lista de Doações](index.php?controller=doacao&action=index)
- [Criar Doação](index.php?controller=doacao&action=create)

### ❌ Páginas de Erro  
*Teste páginas que mostram erros com imagens divertidas*

- [Doação Inexistente (404)](index.php?controller=doacao&action=show&id=99999)
- [Editar Doação Inexistente](index.php?controller=doacao&action=edit&id=99999)

### ✅ Páginas de Sucesso  
*Teste as páginas de confirmação de sucesso*

- [Sucesso - Criação](index.php?controller=doacao&action=success&operation=created)
- [Sucesso - Atualização](index.php?controller=doacao&action=success&operation=updated)
- [Sucesso - Exclusão](index.php?controller=doacao&action=success&operation=deleted)

---

## 😺 Testes de Usuários (Cat Images)

### 📋 Páginas Normais  
*Teste as páginas principais do CRUD de usuários*

- [Lista de Usuários](index.php?controller=usuario&action=index)
- [Criar Usuário](index.php?controller=usuario&action=create)

### ❌ Páginas de Erro  
*Teste páginas que mostram erros com imagens divertidas*

- [Usuário Inexistente (404)](index.php?controller=usuario&action=show&id=99999)
- [Editar Usuário Inexistente](index.php?controller=usuario&action=edit&id=99999)

### ✅ Páginas de Sucesso  
*Teste as páginas de confirmação de sucesso*

- [Sucesso - Criação](index.php?controller=usuario&action=success&operation=created)
- [Sucesso - Atualização](index.php?controller=usuario&action=success&operation=updated)
- [Sucesso - Exclusão](index.php?controller=usuario&action=success&operation=deleted)

---

## 🐱 Testes de Pets (Para Comparação)  
*Compare com o sistema já existente de pets*

- [Lista de Pets](index.php?controller=pet&action=index)
- [Pet Inexistente (404)](index.php?controller=pet&action=show&id=99999)

---

## ⚠️ Página de Erro Genérica  
*Teste a página de erro genérica com diferentes códigos*

- [Erro 400 - Solicitação inválida](views/error.php?code=400&message=Solicitação inválida)
- [Erro 500 - Erro interno do servidor](views/error.php?code=500&message=Erro interno do servidor)

---
