-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Maio-2023 às 10:13
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `profitbase`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tipo` enum('Salgados','Lanches','Bebidas','Sobremesas') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `situacao` enum('Ativo','Desativado') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Ativo',
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `qnt_estoque` int NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `tipo`, `situacao`, `descricao`, `qnt_estoque`) VALUES
(1, 'Coxinha', '3.50', 'Salgados', 'Ativo', 'Deliciosa coxinha de frango', 10),
(2, 'Pastel de Queijo', '4.00', 'Salgados', 'Ativo', 'Pastel crocante recheado com queijo', 8),
(3, 'Hambúrguer', '12.00', 'Lanches', 'Ativo', 'Saboroso hambúrguer com carne suculenta', 6),
(4, 'Cheeseburger', '14.50', 'Lanches', 'Ativo', 'Hambúrguer com queijo derretido e molho especial', 5),
(5, 'Coca-Cola', '5.00', 'Bebidas', 'Ativo', 'Refrigerante sabor cola', 20),
(6, 'Água Mineral', '2.50', 'Bebidas', 'Ativo', 'Água mineral sem gás', 15),
(7, 'Pudim', '7.00', 'Sobremesas', 'Ativo', 'Delicioso pudim de leite', 12),
(8, 'Sorvete de Chocolate', '6.00', 'Sobremesas', 'Ativo', 'Sorvete cremoso sabor chocolate', 10),
(9, 'Coxinha de Frango com Catupiry', '4.00', 'Salgados', 'Ativo', 'Coxinha recheada com frango e catupiry', 10),
(10, 'Pastel de Carne', '3.50', 'Salgados', 'Ativo', 'Pastel com recheio de carne moída', 8),
(11, 'X-Bacon', '16.00', 'Lanches', 'Ativo', 'Lanche com hambúrguer, bacon, queijo e molho especial', 6),
(12, 'X-Tudo', '18.50', 'Lanches', 'Ativo', 'Lanche completo com hambúrguer, bacon, queijo, ovo e salada', 5),
(13, 'Guaraná Antarctica', '4.50', 'Bebidas', 'Ativo', 'Refrigerante sabor guaraná', 20),
(14, 'Suco de Laranja', '3.00', 'Bebidas', 'Ativo', 'Suco natural de laranja', 15),
(15, 'Brigadeiro', '5.00', 'Sobremesas', 'Ativo', 'Doce de brigadeiro tradicional', 12),
(16, 'Pavê de Chocolate', '8.00', 'Sobremesas', 'Ativo', 'Sobremesa cremosa de chocolate', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
