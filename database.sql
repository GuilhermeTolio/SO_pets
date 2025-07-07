-- Banco de dados para Sistema ONG Pets
-- Execute estes comandos no seu MySQL/MariaDB

-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS ong_pets CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ong_pets;

-- Tabela de pets
CREATE TABLE IF NOT EXISTS pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(20), 
    raca VARCHAR(100),
    idade INTEGER CHECK (idade >= 0),
    sexo CHAR(1) CHECK (sexo IN ('M', 'F')),
    cor VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255),
    telefone VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela de doações
CREATE TABLE IF NOT EXISTS doacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100) NOT NULL,
    valor DECIMAL(10,2),
    descricao TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserir dados de exemplo
INSERT INTO pets (nome, especie, raca, idade, sexo, cor) VALUES 
('Rex', 'Cão', 'Labrador', 3, 'M', 'Dourado'),
('Mimi', 'Gato', 'Persa', 2, 'F', 'Branco'),
('Bob', 'Cão', 'Vira-lata', 5, 'M', 'Preto e branco'),
('Luna', 'Gato', 'Siamês', 1, 'F', 'Cinza');

INSERT INTO usuario (nome, email, telefone) VALUES 
('João Silva', 'joao@email.com', '(11) 99999-1234'),
('Maria Santos', 'maria@email.com', '(11) 88888-5678'),
('Pedro Oliveira', 'pedro@email.com', '(11) 77777-9012');

INSERT INTO doacao (tipo, valor, descricao) VALUES 
('Dinheiro', 100.00, 'Doação em dinheiro para medicamentos'),
('Ração', NULL, 'Ração Premium para cães - 15kg'),
('Medicamento', 50.00, 'Vermífugo e vacinas'),
('Brinquedo', NULL, 'Brinquedos diversos para entretenimento dos pets');

-- Verificar se as tabelas foram criadas
SHOW TABLES;

-- Verificar dados inseridos
SELECT 'PETS' as tabela, COUNT(*) as registros FROM pets
UNION ALL
SELECT 'USUARIOS' as tabela, COUNT(*) as registros FROM usuario  
UNION ALL
SELECT 'DOAÇÕES' as tabela, COUNT(*) as registros FROM doacao;
