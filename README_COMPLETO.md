# 🐾 Sistema ONG Pets

Sistema completo de gerenciamento para ONGs de proteção animal, desenvolvido em PHP com arquitetura MVC e orientação a objetos.

## 📋 Funcionalidades

### ✅ CRUDs Completos
- **Pets**: Cadastro, listagem, edição, visualização e exclusão
- **Usuários**: Gerenciamento de adotantes e voluntários  
- **Doações**: Controle de doações recebidas (dinheiro e materiais)

### 🎨 Interface
- Design moderno e responsivo
- Menus de navegação intuitivos
- Feedbacks em tempo real com JavaScript
- Campos obrigatórios marcados com *
- Filtros de busca nas listagens

### 🌐 APIs Integradas
- **ViaCEP**: Busca automática de endereço por CEP
- **Clima**: Informações meteorológicas na página inicial

### 🏗️ Arquitetura
- **MVC**: Model-View-Controller
- **OOP**: Programação Orientada a Objetos
- **PSR**: Padrões de código PHP
- **Responsivo**: Interface adaptável a diferentes dispositivos

## 🚀 Instalação

### Pré-requisitos
- PHP 7.4 ou superior
- MySQL 5.7 ou superior (ou MariaDB)
- Servidor web (Apache/Nginx)

### Passo a Passo

1. **Clone ou baixe o projeto**
   ```bash
   git clone [seu-repositorio]
   cd SO_pets
   ```

2. **Configure o banco de dados**
   - Crie um banco MySQL chamado `ong_pets`
   - Execute o arquivo `database.sql` no seu MySQL:
   ```sql
   mysql -u root -p < database.sql
   ```

3. **Configure a conexão**
   - Edite o arquivo `config/Database.php`
   - Ajuste as credenciais do banco:
   ```php
   private $host = 'localhost';
   private $db_name = 'ong_pets';
   private $username = 'seu_usuario';
   private $password = 'sua_senha';
   ```

4. **Configure o servidor web**
   - Aponte o document root para a pasta do projeto
   - Certifique-se que o PHP está habilitado
   - Habilite mod_rewrite (Apache) se necessário

5. **Teste a instalação**
   - Acesse `http://localhost/SO_pets`
   - Você deve ver a página inicial do sistema

## 📁 Estrutura do Projeto

```
SO_pets/
├── config/
│   └── Database.php          # Configuração do banco
├── controllers/
│   ├── PetController.php     # Controller dos pets
│   ├── UsuarioController.php # Controller dos usuários
│   └── DoacaoController.php  # Controller das doações
├── models/
│   ├── Pet.php              # Model do pet
│   ├── Usuario.php          # Model do usuário
│   └── Doacao.php           # Model da doação
├── views/
│   ├── partials/
│   │   ├── header.php       # Cabeçalho das páginas
│   │   └── footer.php       # Rodapé das páginas
│   ├── pets/                # Views dos pets
│   ├── usuarios/            # Views dos usuários
│   ├── doacoes/             # Views das doações
│   └── home.php             # Página inicial
├── public/
│   ├── css/
│   │   └── style.css        # Estilos CSS
│   └── js/
│       └── script.js        # JavaScript
├── api/
│   ├── cep.php              # API de consulta CEP
│   └── clima.php            # API de clima
├── index.php                # Arquivo principal (router)
├── database.sql             # Script do banco de dados
└── README.md               # Este arquivo
```

## 🎯 Como Usar

### Página Inicial
- Acesse a página principal para ver o painel
- Visualize estatísticas e informações do clima
- Use o menu superior para navegar

### Gerenciar Pets
- **Listar**: Veja todos os pets cadastrados
- **Cadastrar**: Adicione novos pets para adoção
- **Editar**: Atualize informações dos pets
- **Visualizar**: Veja detalhes completos
- **Excluir**: Remova pets (com confirmação)

### Gerenciar Usuários
- **Cadastrar**: Adicione adotantes e voluntários
- **Buscar CEP**: Use a integração com ViaCEP
- **Contato**: Links diretos para email e WhatsApp

### Gerenciar Doações
- **Registrar**: Cadastre doações recebidas
- **Tipos**: Dinheiro, ração, medicamentos, etc.
- **Relatórios**: Veja resumos e totais

## 🔧 Configurações Avançadas

### API de Clima Real
Para usar dados reais de clima, edite `api/clima.php`:
```php
$apiKey = 'SUA_CHAVE_OPENWEATHERMAP';
$url = "https://api.openweathermap.org/data/2.5/weather?q=São Paulo&appid={$apiKey}";
```

### Personalização Visual
- Edite `public/css/style.css` para mudar cores e layout
- Modifique `views/partials/header.php` para alterar o menu
- Customize emojis e textos nas views

### Banco de Dados
- Para produção, mude as credenciais em `config/Database.php`
- Execute backups regulares do banco `ong_pets`
- Considere adicionar índices para melhor performance

## 📱 Recursos Mobile

O sistema é totalmente responsivo e funciona perfeitamente em:
- 📱 Smartphones
- 📟 Tablets  
- 💻 Desktops
- 🖥️ Monitores grandes

## 🛡️ Segurança

- ✅ Sanitização de dados de entrada
- ✅ Prepared statements (PDO)
- ✅ Validação de formulários
- ✅ Escape de output HTML
- ✅ Confirmação para exclusões

## 🐛 Resolução de Problemas

### Erro de Conexão com Banco
1. Verifique se o MySQL está rodando
2. Confirme as credenciais em `config/Database.php`
3. Certifique-se que o banco `ong_pets` existe

### Página em Branco
1. Ative a exibição de erros PHP
2. Verifique se todas as pastas existem
3. Confirme permissões de arquivo

### APIs Não Funcionam
1. Verifique se `allow_url_fopen` está habilitado
2. Teste as URLs das APIs externamente
3. Confirme conectividade com internet

## 🎓 Características Técnicas

### Atendimento aos Requisitos
- ✅ **3 CRUDs completos** (Pets, Usuários, Doações)
- ✅ **Orientação a Objetos** (Classes, herança, encapsulamento)
- ✅ **MVC** (Separação de responsabilidades)
- ✅ **Interface amigável** (Design moderno, responsivo)
- ✅ **Feedbacks JavaScript** (Mensagens de sucesso/erro)
- ✅ **Campos obrigatórios** (Marcados com *)
- ✅ **Consumo de APIs** (ViaCEP e Clima)
- ✅ **Menu de navegação** (Superior e links internos)

### Pontuação (Total: 100 pontos)
- **60 pontos**: CRUDs funcionais (20 × 3)
- **10 pontos**: Boas práticas OO/MVC + Interface
- **20 pontos**: Publicação em VM
- **10 pontos**: Consumo de APIs

## 📞 Suporte

Para dúvidas ou problemas:
1. Verifique este README primeiro
2. Consulte os comentários no código
3. Teste em ambiente local antes da VM

## 📄 Licença

Este projeto foi desenvolvido para fins acadêmicos como parte da disciplina de Sistemas Operacionais.

---

**🐾 Desenvolvido com ❤️ para ajudar ONGs de proteção animal!**
