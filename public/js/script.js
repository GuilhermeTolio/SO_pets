// Função para mostrar mensagens de feedback
function showMessage(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.innerHTML = message;
    
    const container = document.querySelector('.container');
    container.insertBefore(alertDiv, container.firstChild);
    
    // Remove a mensagem após 5 segundos
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}

// Função para confirmar exclusão
function confirmDelete(url, item) {
    if (confirm(`Tem certeza que deseja excluir este ${item}?`)) {
        window.location.href = url;
    }
}

// Função para buscar CEP via API
async function buscarCep() {
    const cepInput = document.getElementById('cep');
    const cep = cepInput.value.replace(/\D/g, '');
    
    if (cep.length !== 8) {
        showMessage('CEP deve conter 8 dígitos', 'danger');
        return;
    }
    
    try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();
        
        if (data.erro) {
            showMessage('CEP não encontrado', 'danger');
            return;
        }
        
        // Preenche os campos de endereço
        document.getElementById('logradouro').value = data.logradouro || '';
        document.getElementById('bairro').value = data.bairro || '';
        document.getElementById('cidade').value = data.localidade || '';
        document.getElementById('uf').value = data.uf || '';
        
        showMessage('CEP encontrado com sucesso!', 'success');
    } catch (error) {
        showMessage('Erro ao buscar CEP', 'danger');
    }
}

// Função para buscar informações do clima
async function buscarClima() {
    try {
        const response = await fetch('api/clima.php');
        const data = await response.json();
        
        if (data.error) {
            console.log('Erro ao buscar clima:', data.error);
            return;
        }
        
        const weatherWidget = document.getElementById('weather-widget');
        if (weatherWidget) {
            weatherWidget.innerHTML = `
                <h4>Clima em ${data.cidade}</h4>
                <div class="weather-info">
                    <div>
                        <strong>${data.temperatura}°C</strong>
                        <br>
                        <small>${data.descricao}</small>
                    </div>
                    <div>
                        <strong>Umidade:</strong> ${data.umidade}%
                    </div>
                </div>
            `;
        }
    } catch (error) {
        console.log('Erro ao buscar clima:', error);
    }
}

// Função para validar formulários
function validarFormulario(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.style.borderColor = '#dc3545';
            isValid = false;
        } else {
            field.style.borderColor = '#e9ecef';
        }
    });
    
    if (!isValid) {
        showMessage('Por favor, preencha todos os campos obrigatórios', 'danger');
    }
    
    return isValid;
}

// Função para formatar telefone
function formatarTelefone(input) {
    let value = input.value.replace(/\D/g, '');
    
    if (value.length <= 11) {
        value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        if (value.length < 14) {
            value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
        }
    }
    
    input.value = value;
}

// Função para formatar CEP
function formatarCep(input) {
    let value = input.value.replace(/\D/g, '');
    value = value.replace(/(\d{5})(\d{3})/, '$1-$2');
    input.value = value;
}

// Event listeners quando a página carrega
document.addEventListener('DOMContentLoaded', function() {
    // Mostrar mensagem se houver na URL
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('msg');
    if (message) {
        showMessage(decodeURIComponent(message), 'success');
    }
    
    // Buscar clima na página inicial
    if (document.getElementById('weather-widget')) {
        buscarClima();
    }
    
    // Adicionar event listeners para formulários
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validarFormulario(form)) {
                e.preventDefault();
            }
        });
    });
    
    // Adicionar event listeners para campos de telefone
    const telefoneInputs = document.querySelectorAll('input[name="telefone"]');
    telefoneInputs.forEach(input => {
        input.addEventListener('input', function() {
            formatarTelefone(this);
        });
    });
    
    // Adicionar event listeners para campos de CEP
    const cepInputs = document.querySelectorAll('input[name="cep"]');
    cepInputs.forEach(input => {
        input.addEventListener('input', function() {
            formatarCep(this);
        });
        
        input.addEventListener('blur', function() {
            if (this.value.length === 9) {
                buscarCep();
            }
        });
    });
});

// Função para animar contadores na página inicial
function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const increment = target / 100;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current);
                setTimeout(updateCounter, 20);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    });
}

// Função para filtrar tabelas
function filtrarTabela(inputId, tableId) {
    const input = document.getElementById(inputId);
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName('tr');
    
    input.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        
        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let found = false;
            
            for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];
                if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
            
            row.style.display = found ? '' : 'none';
        }
    });
}
