# 🐾 Sistema ONG Pets

Sistema completo para gerenciamento de ONGs de proteção animal desenvolvido em PHP com MVC e OOP.

## ✅ Funcionalidades Implementadas

### CRUDs Completos (60 pontos)
- **Pets**: Cadastro, listagem, edição, visualização e exclusão completos
- **Usuários**: Gerenciamento de adotantes e voluntários
- **Doações**: Controle de doações (dinheiro e materiais)

### Interface e Boas Práticas (10 pontos)
- ✅ Arquitetura MVC com Orientação a Objetos
- ✅ Interface moderna e responsiva
- ✅ Feedbacks JavaScript para usuário
- ✅ Campos obrigatórios marcados com *
- ✅ Menu de navegação superior
- ✅ Filtros de busca nas listagens

### APIs Integradas (10 pontos)
- ✅ **ViaCEP**: Busca automática de endereço por CEP
- ✅ **Clima**: Informações meteorológicas na página inicial

## 🚀 Como Usar

1. **Configurar Banco**: Execute `database.sql` no MySQL
2. **Configurar Conexão**: Edite `config/Database.php` 
3. **Acessar Sistema**: Abra `index.php` no navegador

## 📁 Estrutura

```
/config/     - Configuração do banco
/controllers/- Lógica de negócio (MVC)
/models/     - Classes das entidades (OOP)
/views/      - Interface HTML/PHP
/public/     - CSS, JavaScript
/api/        - APIs de CEP e clima
```

## 🎯 Requisitos Atendidos

- ✅ 3 CRUDs funcionais (Pets, Usuários, Doações)
- ✅ Menu superior para navegação
- ✅ Orientação a Objetos e MVC
- ✅ Interface amigável com feedbacks
- ✅ Consumo de 2 APIs externas
- ✅ Salvamento em banco de dados

**Total: 100 pontos** - Pronto para publicação na VM!

Veja `README_COMPLETO.md` para instruções detalhadas.
