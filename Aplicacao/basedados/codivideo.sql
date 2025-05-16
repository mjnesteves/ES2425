-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 03:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codivideo`
--


CREATE DATABASE IF NOT EXISTS `codivideo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `codivideo`;


-- --------------------------------------------------------

--
-- Table structure for table `estadofilme`
--

CREATE TABLE `estadofilme` (
  `idEstadoFilme` int(1) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estadofilme`
--

INSERT INTO `estadofilme` (`idEstadoFilme`, `descricao`) VALUES
(1, 'Disponivel'),
(2, 'Reservado'),
(3, 'Alugado');

-- --------------------------------------------------------

--
-- Table structure for table `estadoreserva`
--

CREATE TABLE `estadoreserva` (
  `idEstadoReserva` int(1) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estadoreserva`
--

INSERT INTO `estadoreserva` (`idEstadoReserva`, `descricao`) VALUES
(1, 'valida'),
(2, 'invalida'),
(3, 'processada');

-- --------------------------------------------------------

--
-- Table structure for table `filme`
--

CREATE TABLE `filme` (
  `idFilme` int(2) NOT NULL,
  `nomeFilme` varchar(100) NOT NULL,
  `idEstadoFilme` int(1) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `idGenero` int(2) NOT NULL,
  `imagem` varchar(60) NOT NULL,
  `classificacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filme`
--

INSERT INTO `filme` (`idFilme`, `nomeFilme`, `idEstadoFilme`, `descricao`, `idGenero`, `imagem`, `classificacao`) VALUES
(1, 'Cinquenta tons de Cinza - Parce o Controlo', 1, 'A estudante de literatura Anastasia Steele, de 21 anos, entrevista o jovem bilionário Christian Grey, como um favor a sua colega de quarto Kate Kavanagh. Ela vê nele um homem atraente e brilhante, e ele fica igualmente fascinado por ela. Embora seja sexualmente inexperiente, Anastasia mergulha de cabeça nessa relação e descobre os prazeres do sadomasoquismo, tornando-se o objeto e submissão do enigmático Grey.', 9, '50Sombras.jpg', 1),
(2, 'Alien: Romulus', 1, 'Um grupo de jovens colonizadores espaciais se aventuram nas profundezas de uma estação espacial abandonada. Lá, eles descobrem uma forma de vida aterrorizante, forçando-os a lutar por sua sobrevivência.', 7, 'Alien.jpg', 0),
(3, 'American Pie', 1, 'Jim Levenstein, Kevin Myers, Oz Ostreicher e Paul Finch são quatro amigos virgens às vésperas do baile de formatura. Em meio a suas tentativas frustradas de fazer sexo com as namoradas, olhar mulheres nuas na internet e até mesmo atacar uma torta recém-saída do forno, os rapazes fazem um pacto e prometem deixar a virgindade para trás antes do baile de formatura. Agora eles têm 24 horas para cumprir esse acordo.', 3, 'AmericanPie.jpg', 0),
(4, 'Anyone But You', 1, 'Bea e Ben têm um primeiro encontro incrível, mas a atração inicial logo se torna ódio mútuo. Um casamento na Austrália força a aproximação dos dois, que decidem fingir um relacionamento para enganar a família e os amigos.', 9, 'AnyoneButYou.jpg', 1),
(5, 'Avatar 3', 1, 'Avatar: Fire and Ash é um futuro filme épico estadunidense de ficção científica e aventura, dirigido, produzido, editado e coescrito por James Cameron, com previsão para ser lançado em 19 de dezembro de 2025, como continuação de Avatar: O Caminho da Água e terceiro filme da franquia de mesmo nome.', 7, 'avatar-3.jpg', 1),
(6, 'A Verdadeira Dor', 1, 'A Real Pain é um filme de drama de 2024, escrito, dirigido e produzido por Jesse Eisenberg. É estrelado por Eisenberg e Kieran Culkin como primos distantes que se reúnem para uma viagem em memória de sua falecida avó. Emma Stone atua como produtora sob sua companhia Fruit Tree.', 6, 'AVerdadeiraDor.jpg', 0),
(7, 'Babygirl', 1, 'Uma CEO poderosa coloca sua carreira e família em risco quando começa um caso tórrido com seu estagiário muito mais jovem.', 9, 'Babygirl.jpg', 0),
(8, 'Becoming Led Zeppelin', 1, 'Entrevistas, performances e imagens inéditas oferecem uma visão sobre as origens do Led Zeppelin e sua ascensão meteórica ao estrelato musical.', 6, 'Becoming.jpg', 0),
(9, 'O Brutalista', 1, 'The Brutalist é um filme de 2024, do gênero drama histórico épico, dirigido e coproduzido por Brady Corbet, a partir de um roteiro que ele coescreveu com Mona Fastvold. ', 4, 'Brutalista.jpg', 0),
(10, 'Deadpool & Wolverine', 1, 'Wolverine está se recuperando quando cruza seu caminho com Deadpool. Juntos, eles formam uma equipe e enfrentam um inimigo em comum.', 1, 'DeathPool.jpg', 1),
(11, 'Dune', 1, 'Paul Atreides é um jovem brilhante, dono de um destino além de sua compreensão. Ele deve viajar para o planeta mais perigoso do universo para garantir o futuro de seu povo.', 2, 'Dune.jpg', 1),
(12, 'Velozes e Furiosos 4', 1, 'Dominic Toretto descobre que sua amada Letty foi assassinada e resolve procurar pelo autor do crime. Enquanto isso, o agente Brian O Conner está em busca de um traficante de drogas. Eles percebem que talvez estejam atrás da mesma pessoa.', 1, 'fast-furious-4.jpg', 1),
(13, 'Velozes e Furiosos 1', 1, 'Brian O Conner é um policial que se infiltra no submundo dos rachas de rua para investigar uma série de furtos. Enquanto tenta ganhar o respeito e a confiança do líder Dom Toretto, ele corre o risco de ser desmascarado.', 1, 'FF1.jpg', 1),
(14, 'Furiosa: Uma Saga Mad Max', 2, 'A jovem Furiosa cai nas mãos de uma grande horda de motoqueiros liderada pelo senhor da guerra Dementus. Varrendo Wasteland, eles encontram a Cidadela, presidida pelo Immortan Joe. Enquanto os dois tiranos lutam pelo domínio, Furiosa logo se vê em uma batalha ininterrupta para voltar para casa.', 2, 'Furiosa.jpg', 0),
(15, 'Harry Potter e os Talismãs da Morte: Parte 1', 2, 'Sem a proteção de seus pofessores, Harry, Rony e Hermione começam uma missão para destruir as horcruxes, que são fontes da imortalidade de Voldemort. Mais do que nunca, eles dependem uns dos outros, mas forças obscuras ameaçam separá-los.', 7, 'HarryPotter.jpg', 1),
(16, 'Harry Potter e os Talismãs da Morte: Parte 2', 2, 'A batalha entre as forças do bem e do mal da magia alcançam o mundo dos trouxas. O risco nunca foi tão grande, e ninguém está seguro. Harry Potter precisa fazer um sacrifício final conforme o confronto com Lord Voldemort se aproxima.', 7, 'harry-potter-and-the-deadly-hallows.jpg', 1),
(17, 'Harry Potter e o Prisioneiro de Azkaban', 3, 'É o início do terceiro ano na escola de bruxaria Hogwarts. Harry, Ron e Hermione têm muito o que aprender. Mas uma ameaça ronda a escola e ela se chama Sirius Black. Após doze anos encarcerado na prisão de Azkaban, ele consegue escapar e volta para vingar seu mestre, Lord Voldemort. Para piorar, os Dementores, guardas supostamente enviados para proteger Hogwarts e seguir os passos de Black, parecem ser ameaças ainda mais perigosas.', 7, 'harry-potter-o-prisioneiro-de-azkaban.jpg', 0),
(18, 'O Hobbit: A Desolação de Smaug', 3, 'Ao lado de um grupo de anões e de Gandalf, Bilbo segue em direção à Montanha Solitária, onde deverá ajudar seus companheiros a retomar a Pedra de Arken. O problema é que o artefato está perdido em meio a um tesouro protegido pelo temido dragão Smaug.', 2, 'Hobbit.jpg', 0),
(19, 'Sozinho em Casa', 2, 'Sozinho em Casa é um filme de comédia de Natal estadunidense de 1990, escrito e produzido por John Hughes e dirigido por Chris Columbus. O filme é estrelado por Macaulay Culkin como Kevin McCallister, um menino de 8 anos que é erroneamente deixado para trás quando sua família voa para Paris para suas férias de Natal', 3, 'HomeAlone.jpg', 0),
(20, 'Interstellar', 2, 'As reservas naturais da Terra estão chegando ao fim e um grupo de astronautas recebe a missão de verificar possíveis planetas para receberem a população mundial, possibilitando a continuação da espécie. Cooper é chamado para liderar o grupo e aceita a missão sabendo que pode nunca mais ver os filhos. Ao lado de Brand, Jenkins e Doyle, ele seguirá em busca de um novo lar.', 2, 'Interstelar.jpg', 1),
(21, 'Mundo Jurássico: Renascimento', 2, 'Agentes habilidosos viajam para uma instalação de pesquisa em uma ilha para obter DNA que pode salvar vidas de dinossauros. À medida que a missão ultrassecreta se torna cada vez mais perigosa, eles logo fazem uma descoberta sinistra e chocante que tem sido escondida do mundo por décadas.', 7, 'JurassicWorld.jpg', 0),
(22, 'Last Breath', 2, 'Resgate em Alto Mar é um filme de suspense de sobrevivência de 2025 dirigido por Alex Parkinson e escrito por Parkinson, Mitchell LaFortune e David Brooks. É estrelado por Woody Harrelson, Simu Liu, Finn Cole e Cliff Curtis.', 6, 'LastBreath.jpg', 1),
(23, 'Matrix', 2, 'O jovem programador Thomas Anderson é atormentado por estranhos pesadelos em que está sempre conectado por cabos a um imenso sistema de computadores do futuro. À medida que o sonho se repete, ele começa a desconfiar da realidade. Thomas conhece os misteriosos Morpheus e Trinity e descobre que é vítima de um sistema inteligente e artificial chamado Matrix, que manipula a mente das pessoas e cria a ilusão de um mundo real enquanto usa os cérebros e corpos dos indivíduos para produzir energia.', 7, 'Matrix.jpg', 1),
(24, 'Missão: Impossível - O Ajuste de Contas Final', 2, 'O agente especial Ethan Hunt e sua equipe continuam as suas perigosas aventuras.', 1, 'MissaoImpossivel.jpg', 1),
(25, 'O Colecionador de Almas', 2, 'A agente do FBI Lee Harker é convocada para reabrir um caso arquivado de um serial killer. Conforme desvenda pistas, Harker se vê confrontada com uma conexão pessoal inesperada com o assassino, lançando-a em uma corrida contra o tempo.', 8, 'ColecionadorAlmas.jpg', 1),
(26, 'Piratas das Caraíbas: A Maldição do Pérola Negra', 2, 'O pirata Jack Sparrow tem seu navio saqueado e roubado pelo capitão Barbossa e sua tripulação. Com o navio de Sparrow, Barbossa invade a cidade de Port Royal, levando consigo Elizabeth Swann, filha do governador. Para recuperar sua embarcação, Sparrow recebe a ajuda de Will Turner, um grande amigo de Elizabeth. Eles desbravam os mares em direção à misteriosa Ilha da Morte, tentando impedir que os piratas-esqueleto derramem o sangue de Elizabeth para desfazer a maldição que os assola.', 2, 'PirataCaraibas.jpg', 1),
(27, 'Saw - Enigma Mortal', 2, 'Dois homens acordam e se encontram em lados opostos de um cadáver, cada um com instruções específicas para matar o outro ou enfrentar as consequências. Esses dois são as últimas vítimas do Jigsaw Killer.', 8, 'Saw.jpg', 1),
(28, 'Saw X', 2, 'Esperando por uma cura milagrosa, o adoecido John Kramer viaja para o México para um procedimento médico arriscado e experimental. Mas ao chegar no destino, se depara com um ambiente macabro, e descobre que toda a operação é uma farsa para enganar pessoas já vulneráveis. Agora armado com um novo propósito, o infame serial killer usa armadilhas insanas e engenhosas para virar o jogo contra os vigaristas, relembrando o motivo de ser conhecido como o terrível vilão Jigsaw. ', 8, 'Saw10.jpeg', 1),
(29, 'Gritos', 2, 'Vinte e cinco anos após uma série de crimes brutais chocar a tranquila Woodsboro, um novo assassino se apropria da máscara de Ghostface e começa a perseguir um grupo de adolescentes para trazer à tona segredos do passado mortal da cidade.', 8, 'Scream.jpg', 0),
(30, 'Noite de Terror', 2, 'Enquanto investigam uma ligação em uma casa abandonada, o policial Frank Williams e um novato encontram uma mulher brutalmente cega, mas são atacados por um enorme psicopata com um machado.', 4, 'SerialKiller-1.jpg', 0),
(31, 'O Acto de Matar', 2, 'Em 1965, o governo da Indonésia foi derrubado por militares que, ao assumirem o poder, passaram a assassinar os opositores acusados de comunistas. Neste documentário, os executores falam e recriam suas ações.', 4, 'SerialKiller-2.jpg', 1),
(32, 'Sorri 2', 2, 'Skye Riley começa a experimentar eventos cada vez mais aterrorizantes e inexplicáveis. Sobrecarregada pelos horrores crescentes e pelas pressões da fama, ela precisa enfrentar seu passado sombrio para recuperar o controle de sua vida.', 8, 'Smile-2.jpg', 0),
(33, 'Sonic 3', 2, 'Sonic the Hedgehog 3 é um filme de comédia de ação e aventura estadunidense-japonesa, baseado na série de videogame publicada pela Sega', 5, 'Sonic-3.jpg', 1),
(34, 'Superman', 2, 'Superman é o próximo filme de super-herói americano do Superman da DC Comics, baseado na série de quadrinhos All-Star Superman e fortemente influenciado por Superman for All Seasons', 1, 'SuperHomem.jpg', 0),
(35, 'Super Mario Bros', 2, 'Mario e seu irmão Luigi são encanadores do Brooklyn, em Nova York. Um dia, eles vão parar no reino dos cogumelos, governado pela Princesa Peach. O local é ameaçado por Bowser, rei dos Koopas, que faz de tudo para conseguir reinar em todos os lugares.', 5, 'SuperMario.jpg', 0),
(36, 'O Desfiladeiro', 2, 'The Gorge é um filme de ação romântica de ficção científica americano de 2025, dirigido por Scott Derrickson e escrito por Zach Dean. É estrelado por Miles Teller, Anya Taylor-Joy e Sigourney Weaver.', 1, 'The+Gorge.jpg', 1),
(37, 'Todo Tempo que Temos', 2, 'Almut e Tobias são unidos por um encontro surpresa que muda suas vidas. Ao embarcarem em um caminho desafiado pelos limites do tempo, eles aprendem a valorizar cada momento de sua história de amor não convencional.', 9, 'TodoTempoQueTemos.jpg', 0),
(38, 'Matthew Perry', 2, 'Matthew Perry e Zac Efron compartilham o papel de Mike O Donnell, que aos 17 anos era o ídolo de sua escola e aos 37 é miserável e odeia sua vida. Mas quando ele acorda em seu corpo dos 17, Mike vai querer reviver seus melhores anos.', 4, 'Tragedia.jpg', 0),
(39, 'Until Dawn', 2, 'Explorando um centro de visitantes abandonado, Clover e seus amigos encontram um assassino mascarado que os mata um por um. No entanto, quando eles misteriosamente acordam no início da mesma noite, são forçados a reviver o terror repetidamente.', 8, 'UntilDawn.jpg', 1),
(40, 'Venom: A Última Dança', 2, 'Eddie Brock e Venom precisam tomar uma decisão enquanto são perseguidos por um militar misterioso e monstros alienígenas do planeta natal de Venom.', 7, 'Venom.jpg', 1),
(41, 'Avengers: Secret War', 2, 'Avengers: Secret Wars é um futuro filme de super-herói estadunidense de 2027, baseado na equipe Vingadores da Marvel Comics', 1, 'Vingadores.jpg', 1),
(42, 'Loiras à Força', 2, 'Dois irmãos agentes do FBI, Marcus e Kevin Copeland, acidentalmente evitam que bandidos sejam presos em uma apreensão de drogas. Como castigo, eles são forçados a escoltar um par de socialites nos Hamptons. Quando as meninas descobrem o plano da agência, elas se recusam a ir. Sem opções, Marcus e Kevin, dois homens negros, decidem fingir que são as irmãs e se transformam em um par de loiras.', 3, 'WhiteChicks.jpg', 0),
(43, 'Malvadas : Wicked', 2, 'Na Terra de Oz, uma jovem chamada Elphaba forma uma improvável amizade com uma estudante popular chamada Glinda. Após um encontro com o Mágico de Oz, o relacionamento delas logo chega a uma encruzilhada.', 7, 'Wicked.jpg', 1),
(44, 'The Woman In The Yard', 2, 'Ramona fica paralisada pela dor após a morte de seu marido, deixando-a sozinha para cuidar de seus dois filhos. Sua tristeza logo se transforma em medo quando uma mulher espectral vestida de preto aparece em seu jardim da frente.', 8, 'WomanYard.jpg', 1),
(45, 'Era Uma Vez Em...', 2, 'Em 1969, Rick Dalton é um ator de TV em declínio que tenta voltar à vida de fama e sucesso em Hollywood ao lado de seu amigo e dublê, Cliff Booth.', 3, 'Hollywood.jpg', 1),
(46, 'TOP GUN - MAVERICK', 1, 'Filme de Aviões', 1, 'TOP_GUN_MAVERICK.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `generofilme`
--

CREATE TABLE `generofilme` (
  `idGenero` int(2) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generofilme`
--

INSERT INTO `generofilme` (`idGenero`, `descricao`) VALUES
(1, 'Acao'),
(2, 'Aventura'),
(3, 'Comedia'),
(4, 'Documentario'),
(5, 'Desenhos Animados'),
(6, 'Drama'),
(7, 'Ficcao Cientifica'),
(8, 'Terror'),
(9, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `loja`
--

CREATE TABLE `loja` (
  `idLoja` int(1) NOT NULL,
  `nomeLoja` varchar(60) NOT NULL,
  `morada` varchar(60) NOT NULL,
  `telefone` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loja`
--

INSERT INTO `loja` (`idLoja`, `nomeLoja`, `morada`, `telefone`) VALUES
(1, 'lojaCovilha', 'Covilha', 275000123),
(2, 'lojaCasteloBranco', 'Castelo Branco', 272987654),
(3, 'lojaCoimbra', 'Coimbra', 239963987);

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(2) NOT NULL,
  `idUtilizador` int(2) NOT NULL,
  `dataReserva` date NOT NULL,
  `dataLevantamento` date NOT NULL,
  `idFilme` int(2) NOT NULL,
  `idEstadoReserva` int(1) NOT NULL,
  `idFuncionario` int(2) DEFAULT NULL,
  `idLoja` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `idTipoUtilizador` int(1) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`idTipoUtilizador`, `descricao`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'EMPREGADO'),
(3, 'CLIENTE'),
(4, 'CLIENTE_NAO_VALIDO'),
(5, 'CLIENTE_APAGADO');

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `idUtilizador` int(2) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `tipoUtilizador` int(1) NOT NULL,
  `dataNascimento` date NOT NULL,
  `morada` varchar(60) NOT NULL,
  `telefone` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`idUtilizador`, `nome`, `email`, `password`, `tipoUtilizador`, `dataNascimento`, `morada`, `telefone`) VALUES
(1, 'João Fonseca', 'admin@codivideo.pt', '21232f297a57a5a743894a0e4a801fc3', 1, '2000-01-01', 'Desconhecida', 900000000),
(2, 'Arnaldo Silva', 'empregado@codivideo.pt', '5b60891c819bef17121c175e194202b2', 3, '1987-02-17', 'Covilha', 272123272),
(3, 'Joaquim Saraiva', 'cliente@gmail.com', '4983a0ab83ed86e0e7213c8783940193', 3, '2001-10-07', 'Alcains', 272272272),
(10, 'Marcelo Esteves', 'mjnesteves@gmail.com', '995bf053c4694e1e353cfd42b94e4447', 3, '1987-02-17', 'Pontinha', 967904835),
(11, 'Marcelo Esteves', 'mjnesteves@hotmail.com', '995bf053c4694e1e353cfd42b94e4447', 1, '1985-08-23', 'Pontinha', 967904835),
(12, 'ssfsdf', 'mail@mail.com', '143ef5ddd8871e5e1a98b8335d036554', 3, '2005-02-17', 'sfsfsdfsf', 546466565),
(13, 'Teste', 'teste@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, '2010-02-02', 'Pontinha', 967904835);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estadofilme`
--
ALTER TABLE `estadofilme`
  ADD PRIMARY KEY (`idEstadoFilme`);

--
-- Indexes for table `estadoreserva`
--
ALTER TABLE `estadoreserva`
  ADD PRIMARY KEY (`idEstadoReserva`);

--
-- Indexes for table `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`idFilme`),
  ADD KEY `fk_estadoFilme` (`idEstadoFilme`),
  ADD KEY `fk_generoFilme` (`idGenero`);

--
-- Indexes for table `generofilme`
--
ALTER TABLE `generofilme`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`idLoja`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_utilizador` (`idUtilizador`),
  ADD KEY `fk_filme` (`idFilme`),
  ADD KEY `fk_estadoReserva` (`idEstadoReserva`),
  ADD KEY `fk_loja` (`idLoja`);

--
-- Indexes for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`idTipoUtilizador`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUtilizador`),
  ADD UNIQUE KEY `nomeUtilizador` (`email`),
  ADD KEY `fk_tipoUtilizador` (`tipoUtilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `idLoja` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idUtilizador` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `fk_estadoFilme` FOREIGN KEY (`idEstadoFilme`) REFERENCES `estadofilme` (`idEstadoFilme`),
  ADD CONSTRAINT `fk_generoFilme` FOREIGN KEY (`idGenero`) REFERENCES `generofilme` (`idGenero`);

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_estadoReserva` FOREIGN KEY (`idEstadoReserva`) REFERENCES `estadoreserva` (`idEstadoReserva`),
  ADD CONSTRAINT `fk_filme` FOREIGN KEY (`idFilme`) REFERENCES `filme` (`idFilme`),
  ADD CONSTRAINT `fk_loja` FOREIGN KEY (`idLoja`) REFERENCES `loja` (`idLoja`),
  ADD CONSTRAINT `fk_utilizador` FOREIGN KEY (`idUtilizador`) REFERENCES `utilizador` (`idUtilizador`);

--
-- Constraints for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `fk_tipoUtilizador` FOREIGN KEY (`tipoUtilizador`) REFERENCES `tipoutilizador` (`idTipoUtilizador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
