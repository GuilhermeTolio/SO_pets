function showMessage(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.innerHTML = message;
    
    const container = document.querySelector('.container');
    container.insertBefore(alertDiv, container.firstChild);
    
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}

function confirmDelete(url, item) {
    if (confirm(`Tem certeza que deseja excluir este ${item}?`)) {
        window.location.href = url;
    }
}

async function buscarFotoCachorro() {
    try {
        const response = await fetch('api/dog.php');
        const data = await response.json();
        
        if (data.success) {
            const dogWidget = document.getElementById('dog-widget');
            if (dogWidget) {
                dogWidget.innerHTML = `
                    <h4>Cachorro do Dia</h4>
                    <div style="text-align: center;">
                        <img src="${data.image_url}" 
                             alt="Cachorro aleatório" 
                             style="max-width: 100%; max-height: 150px; border-radius: 8px; margin: 10px 0; object-fit: cover;">
                        <p style="margin: 0; font-size: 0.8em; opacity: 0.9;">
                            ${data.message}
                        </p>
                    </div>
                `;
            }
        } else {
            console.log('Erro ao buscar foto de cachorro:', data.error);
        }
    } catch (error) {
        console.log('Erro ao buscar foto de cachorro:', error);
    }
}

async function buscarFotoGato() {
    try {
        const response = await fetch('api/cat.php');
        const data = await response.json();
        
        if (data.success) {
            const catWidget = document.getElementById('cat-widget');
            if (catWidget) {
                catWidget.innerHTML = `
                    <h4>Gato do Dia</h4>
                    <div style="text-align: center;">
                        <img src="${data.image_url}" 
                             alt="Gato aleatório" 
                             style="max-width: 100%; max-height: 150px; border-radius: 8px; margin: 10px 0; object-fit: cover;">
                        <p style="margin: 0; font-size: 0.8em; opacity: 0.9;">
                            ${data.message}
                        </p>
                    </div>
                `;
            }
        } else {
            console.log('Erro ao buscar foto de gato:', data.error);
        }
    } catch (error) {
        console.log('Erro ao buscar foto de gato:', error);
    }
}

function toggleSidebar() {
    const sidebar = document.getElementById('pets-sidebar');
    sidebar.classList.toggle('open');
}

async function buscarClima() {
    return;
}

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

document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('msg');
    if (message) {
        showMessage(decodeURIComponent(message), 'success');
    }
    
    if (document.getElementById('dog-widget')) {
        buscarFotoCachorro();
    }
    
    if (document.getElementById('cat-widget')) {
        buscarFotoGato();
    }
    
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validarFormulario(form)) {
                e.preventDefault();
            }
        });
    });
    
    const telefoneInputs = document.querySelectorAll('input[name="telefone"]');
    telefoneInputs.forEach(input => {
        input.addEventListener('input', function() {
            formatarTelefone(this);
        });
    });
});

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
