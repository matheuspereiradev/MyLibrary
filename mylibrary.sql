-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jun-2019 às 03:08
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylibrary`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigo`
--

CREATE TABLE `amigo` (
  `idAmigo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `Usuario_id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `amigo`
--

INSERT INTO `amigo` (`idAmigo`, `nome`, `telefone`, `Usuario_id_usr`) VALUES
(1, 'Matheus', '0', 3),
(2, 'Matheus Lima', '123456789', 1),
(3, 'Mah', '123', 3),
(5, 'Afonso', '123456', 1),
(6, 'loj', '', 1),
(8, 'Matheus Lima', '2147483647', 1),
(9, 'Matheus Lima', '0', 1),
(11, 'niinguem he', '1234567890', 1),
(12, 'Koma', '992', 1),
(18, 'a', '2', 1),
(19, 'jorge', '2147483647', 1),
(20, 'matheus', '2147483647', 1),
(21, 'Izolda', '2147483647', 1),
(25, 'teste', '88992424740', 1),
(26, 'teste', '88992424740', 1),
(27, 'joaozinho', '88992214032', 1),
(31, 'ze', '', 3),
(34, 'lok', '', 3),
(35, 'k', '', 3),
(36, 'na', '', 3),
(37, 'na', '', 3),
(38, 'Matheus', '', 10),
(43, 'Matheus Lima', '', 1),
(48, 'Jorge', '8889995', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `codEmprestimo` int(11) NOT NULL,
  `dataEmp` date NOT NULL,
  `Livro_idLivro` int(11) NOT NULL,
  `Amigo_idAmigo` int(11) NOT NULL,
  `Usuario_id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`codEmprestimo`, `dataEmp`, `Livro_idLivro`, `Amigo_idAmigo`, `Usuario_id_usr`) VALUES
(3, '2018-12-19', 61, 38, 10),
(5, '2017-11-14', 50, 18, 1),
(6, '2018-12-19', 53, 5, 1),
(14, '2018-12-20', 59, 21, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `idLivro` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `statusEmprestimo` tinyint(1) NOT NULL DEFAULT '0',
  `statusLeitura` tinyint(1) NOT NULL,
  `Usuario_id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`idLivro`, `nome`, `autor`, `data`, `statusEmprestimo`, `statusLeitura`, `Usuario_id_usr`) VALUES
(30, 'San Piero a Sieve', 'Ishmael', '2019-10-28', 0, 2, 2),
(31, 'Fuenlabrada', 'Phelan', '2018-05-13', 0, 3, 2),
(32, 'Fontaine-l\'Evque', 'Brock', '2019-07-21', 0, 3, 2),
(33, 'Velden am Wörther See', 'Emerson', '2019-09-23', 0, 3, 2),
(34, 'Wernigerode', 'Hedley', '2018-07-16', 0, 1, 1),
(35, 'Lestizza', 'Merrill', '2019-10-09', 0, 1, 1),
(36, 'María', 'Rahim', '2019-09-18', 0, 2, 3),
(38, 'Neyveli', 'Xander', '2019-06-10', 0, 1, 1),
(39, 'Sonnino', 'Ashton', '2018-01-26', 0, 1, 1),
(40, 'Niel-bij-As', 'Hilel', '2018-08-04', 0, 1, 1),
(41, 'Nadiad', 'Ryan', '2019-07-15', 0, 2, 2),
(42, 'Pimpri-Chinchwad', 'Raphael', '2019-09-04', 0, 2, 3),
(43, 'Sant\'Angelo a Fasanella', 'Fritz', '2019-10-22', 0, 3, 2),
(44, 'Xhoris', 'Rajah', '2019-06-23', 0, 1, 1),
(46, 'Stratford', 'Cairo', '2019-07-05', 0, 1, 1),
(47, 'Stamford', 'Griffin', '2018-03-20', 0, 1, 1),
(48, 'Lagos', 'Garrett', '2019-03-02', 0, 1, 1),
(49, 'Nasino', 'Ralph', '2018-07-25', 0, 2, 1),
(50, 'Akola', 'mATHEUS', '2019-02-24', 1, 3, 1),
(51, 'Minto', 'Jermaine', '2019-10-31', 0, 1, 1),
(52, 'Grand-Manil', 'Eaton', '2018-11-03', 0, 1, 1),
(53, 'Annapolis', 'Jacob', '2019-08-16', 1, 3, 1),
(55, 'Marzabotto', 'Charles', '2019-05-06', 0, 1, 1),
(58, 'Cheyenne', 'Erasmus', '2018-08-04', 0, 1, 1),
(59, 'Bloxham', 'Quinn', '2018-10-26', 1, 1, 1),
(61, 'As Cronicas de Nárnia', 'C. S. Lewis', '2018-12-19', 1, 2, 10),
(62, 'O codigo perdido', 'dan Brown', '2018-12-19', 0, 2, 10),
(70, 'Iracema', 'José de Alencar', '2018-12-20', 0, 2, 10),
(71, 'Os cristãos o manto do soldado', 'Max Gallo', '2018-12-21', 0, 1, 20),
(72, 'Morte Súbita', 'J. K. Rowling', '2018-12-21', 0, 1, 20),
(73, 'Viagem ao centro da Terra', 'Julio Verne', '2018-12-21', 0, 1, 20),
(74, 'Anjos de fogo', 'L. Mathias', '2018-12-21', 0, 1, 20),
(75, 'Meg, a loba', 'L. Mathias', '2018-12-21', 0, 1, 20),
(76, 'Eva', 'Willian P. Young', '2018-12-21', 0, 1, 20),
(77, 'A travessia', 'Willian P. Young', '2018-12-21', 0, 1, 20),
(78, 'A maldição do tigre', 'Colleen Houck', '2018-12-21', 0, 1, 20),
(79, 'O resgate do tigre', 'Colleen Houck', '2018-12-21', 0, 1, 20),
(80, 'A viagem do tigre', 'Colleen Houck', '2018-12-21', 0, 1, 20),
(81, 'O destino do tigre', 'Colleen Houck', '2018-12-21', 0, 1, 20),
(82, 'A promessa do tigre', 'Colleen Houck', '2018-12-21', 0, 1, 20),
(83, 'O senhor dos anéis II- As duas torres', 'J. R. R. Tolkien', '2018-12-21', 0, 1, 20),
(84, 'Lumen', 'Ben Pastor', '2018-12-21', 0, 1, 20),
(85, 'Darkmouth', 'Shane Hegarty', '2018-12-21', 0, 1, 20),
(86, 'O segredo', 'Rhonda Byrne', '2018-12-21', 0, 1, 20),
(87, 'Soldados do Papel', 'Raul P. Da Rocha E Miklos Palluch', '2018-12-21', 0, 1, 20),
(88, 'Desventuras em série: Mal começo', 'Leminy Snycket', '2018-12-21', 0, 3, 20),
(89, 'Desventuras em série: A Sala dos Répteis', 'Leminy Snycket', '2018-12-21', 0, 3, 20),
(90, 'Desventuras em série: O Lago das Sanguessugas', 'Leminy Snycket', '2018-12-21', 0, 2, 20),
(91, 'Desventuras em série: Serraria Baixo-Astral', 'Leminy Snycket', '2018-12-21', 0, 3, 20),
(92, 'Desventuras em série: Inferno no Colégio Interno', 'Leminy Snycket', '2018-12-21', 0, 1, 20),
(93, 'Desventuras em série: O Elevador Ersatz', 'Leminy Snycket', '2018-12-21', 0, 1, 20),
(94, 'Desventuras em série: A Cidade Sinistra dos Corvos', 'Leminy Snycket', '2018-12-21', 0, 1, 20),
(95, 'Sherlock Holmes Contos', 'Sir Arthur Conan Doyle', '2018-12-21', 0, 1, 20),
(96, 'Antes da Forca', 'Joe Abercrombie', '2018-12-21', 0, 1, 20),
(97, 'Mares de sangue', 'Scott Lynch', '2018-12-21', 0, 1, 20),
(98, 'As crônicas de Nárnia', 'C. S. Lewis', '2018-12-21', 0, 1, 20),
(99, 'Guia do mochileiro das galáxias', 'Douglas Adams', '2018-12-21', 0, 1, 20),
(100, 'A menina que roubava livros', 'Markus Zusak', '2018-12-21', 0, 1, 20),
(101, 'Pegasus e a batalha pelo olimpo', 'Kate O\'hearn', '2018-12-21', 0, 1, 20),
(102, 'Pegasus e as origens do olimpo', 'Kate O\'hearn', '2018-12-21', 0, 1, 20),
(103, 'Pegasus e o fogo do olimpo', 'Kate O\'hearn', '2018-12-21', 0, 1, 20),
(104, 'Pegasus os novos olímpicos', 'Kate O\'hearn', '2018-12-21', 0, 1, 20),
(105, 'O simbolo perdido', 'Dan Brown', '2018-12-21', 0, 1, 20),
(106, 'Claro Enigma', 'Carlos Drummond de Andrade', '2018-12-21', 0, 1, 20),
(107, 'Na companhia de estranhos', 'Robert Wilson', '2018-12-21', 0, 1, 20),
(108, 'O codigo bro', 'Barney Stinson', '2018-12-21', 0, 1, 20),
(109, 'Ansiedade 1: Como enfrentar o mal do século', 'Augusto Cury', '2018-12-21', 0, 1, 20),
(110, 'Ansiedade 2: Autocontrole', 'Augusto Cury', '2018-12-21', 0, 1, 20),
(111, 'The walking dead: O caminho para woodbury', 'Robert Kirkman & Jay Bonansinga', '2018-12-21', 0, 1, 20),
(112, 'The walking dead: a ascenção do governador', 'Robert Kirkman & Jay Bonansinga', '2018-12-21', 0, 1, 20),
(113, 'Ágape', 'Padre Marcelo Rossi', '2018-12-21', 0, 1, 20),
(114, 'A sabedoria de João Paulo II: A visão do papa sobre os temas mais importantes para a humanidade', 'Nick Bakalar e Richard Balkin', '2018-12-21', 0, 1, 20),
(115, 'A cabana', 'Willian P. Young', '2018-12-21', 0, 1, 20),
(116, 'De volta à cabana', 'William P. Young', '2018-12-21', 0, 1, 20),
(117, 'Bíblia Sagrada', 'Igreja Católica', '2018-12-21', 0, 1, 20),
(118, 'A imitação de Cristo', 'Tomás de Kempis', '2018-12-21', 0, 1, 20),
(119, 'Maria poderia ter dito não?', 'Valdeci Toledo', '2018-12-21', 0, 1, 20),
(120, 'A cabana - Reflexões para cada dia do ano', 'Willian P. Young', '2018-12-21', 0, 1, 20),
(121, 'Ecclesia de Eucharistia', 'João Paulo II', '2018-12-21', 0, 1, 20),
(122, 'Estruturas de Dados e Algoritmos em Java', 'Roberto Tamassia', '2018-12-21', 0, 3, 20),
(123, 'UML 2 - UMA ABORDAGEM PRATICA', 'GILLEANES T. A. GUEDES', '2018-12-21', 0, 1, 20),
(124, 'Introdução à programação: 500 algoritmos resolvidos', 'Anita Lopes e Guto Garcia', '2018-12-21', 0, 1, 20),
(125, 'Dicionário Oxford Escolar', 'OXFORD', '2018-12-21', 0, 2, 20),
(126, 'Minidicionário da língua portuguesa', 'Dicionario', '2018-12-21', 0, 1, 20),
(127, 'As cronicas do gelo e do fogo - A dança dos dragões', 'George R. R. Martin', '2018-12-21', 0, 1, 20),
(128, 'As cronicas do gelo e do fogo - A furia dos reis', 'George R. R. Martin', '2018-12-21', 0, 1, 20),
(129, 'As cronicas do gelo e do fogo - A guerra dos tronos', 'George R. R. Martin', '2018-12-21', 0, 1, 20),
(130, 'As cronicas do gelo e do fogo - A tormenta das espadas', 'George R. R. Martin', '2018-12-21', 0, 1, 20),
(131, 'As cronicas do gelo e do fogo - O festim dos corvos', 'George R. R. Martin', '2018-12-21', 0, 1, 20),
(132, 'O mundo de Sofia', 'Jostein Gaarder', '2018-12-21', 0, 1, 20),
(133, 'O menino do pijama listrado', 'John Boyne', '2018-12-21', 0, 1, 20),
(134, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', '2018-12-21', 0, 2, 20),
(135, 'O senhor dos anéis I - A Sociedade do Anel', 'J. R. R. Tolkien', '2018-12-21', 0, 1, 20),
(136, 'Morte e Vida Severina', 'João Cabral de Melo Neto', '2018-12-21', 0, 1, 20),
(137, 'Harry Potter e a camara secreta', 'J. K. Rowling', '2018-12-21', 0, 3, 20),
(138, 'Harry Potter e a ordem da fênix', 'J. K. Rowling', '2018-12-21', 0, 3, 20),
(139, 'Harry Potter e a pedra filosofal', 'J. K. Rowling', '2018-12-21', 0, 3, 20),
(140, 'Harry Potter e as reliquias da morte', 'J. K. Rowling', '2018-12-21', 0, 1, 20),
(141, 'Harry Potter e o cálice de fogo', 'J. K. Rowling', '2018-12-21', 0, 3, 20),
(142, 'Harry Potter e o enigma do príncipe', 'J. K. Rowling', '2018-12-21', 0, 1, 20),
(143, 'Harry Potter e o prisioneiro de azkaban', 'J. K. Rowling', '2018-12-21', 0, 1, 20),
(144, 'Sonho de uma Noite de Verão', 'William Shakespeare', '2018-12-21', 0, 1, 20),
(145, 'O sertanejo', 'José de Alencar', '2018-12-21', 0, 1, 20),
(146, 'Lira dos vinte anos', 'Alvares de Azevedo', '2018-12-21', 0, 1, 20),
(147, 'Marcelino pão e vinho', 'José María Sánchez Silva', '2018-12-21', 0, 1, 20),
(148, 'Orações do cristão - Preces diárias', 'Paulinas', '2018-12-21', 0, 1, 20),
(149, 'O código da Vinci', 'Dan Brown', '2018-12-21', 0, 1, 20),
(152, 'aaempresta', 'aa', '2018-12-23', 0, 2, 20),
(153, 'Dom Casmurro', 'Machado de Assis', '2019-06-14', 0, 1, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(15) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `nome`, `senha`, `id_usr`) VALUES
('jacaloka', 'jaquin', 'jaca', 1),
('matheuskasda', 'Matheus Lima', '1234', 2),
('ninguem', 'Ze Ninguem', 'senha', 3),
('admin', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 10),
('sorvete', 'sorvete', '83d7bea632e7abcef6685d16599570d4a6b75dda', 16),
('jaca', 'jaca', 'b0b63d62fe435075d52c9810cfec4695517eebcd', 17),
('matheuslima', 'Matheus Lima', 'd0f0bb732c5269611c241b430276eb18f0f328fa', 18),
('matheusoficial', 'Matheus Lima', 'f2e638174e51c48f626233fa8be2f60ed6538cc6', 20),
('luizinho', 'Luiz Sinho', '10470c3b4b1fed12c3baac014be15fac67c6e815', 21),
('matheuspereirad', 'mat', '10470c3b4b1fed12c3baac014be15fac67c6e815', 22),
('math', 'mat', 'adcd7048512e64b48da55b027577886ee5a36350', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amigo`
--
ALTER TABLE `amigo`
  ADD PRIMARY KEY (`idAmigo`),
  ADD KEY `fk_Amigo_Usuario1_idx` (`Usuario_id_usr`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`codEmprestimo`),
  ADD KEY `fk_Emprestimo_Livro1_idx` (`Livro_idLivro`),
  ADD KEY `fk_Emprestimo_Amigo1_idx` (`Amigo_idAmigo`),
  ADD KEY `fk_Emprestimo_Usuario1_idx` (`Usuario_id_usr`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`idLivro`),
  ADD KEY `fk_Livro_Usuario_idx` (`Usuario_id_usr`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usr`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amigo`
--
ALTER TABLE `amigo`
  MODIFY `idAmigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `codEmprestimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `amigo`
--
ALTER TABLE `amigo`
  ADD CONSTRAINT `fk_Amigo_Usuario1` FOREIGN KEY (`Usuario_id_usr`) REFERENCES `usuario` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_Emprestimo_Amigo1` FOREIGN KEY (`Amigo_idAmigo`) REFERENCES `amigo` (`idAmigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Emprestimo_Livro1` FOREIGN KEY (`Livro_idLivro`) REFERENCES `livro` (`idLivro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Emprestimo_Usuario1` FOREIGN KEY (`Usuario_id_usr`) REFERENCES `usuario` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_Livro_Usuario` FOREIGN KEY (`Usuario_id_usr`) REFERENCES `usuario` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
