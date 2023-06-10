-- 1º Executar esse primeiro
CREATE DATABASE IF NOT EXISTS loja;

-- 2º Executar esse
use loja;

-- 3º Executar todos os CREATE
CREATE TABLE
  `produto` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) NOT NULL,
    `descricao` varchar(255) NOT NULL,
    `preco` double NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci
