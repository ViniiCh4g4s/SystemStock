-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jan-2023 às 17:47
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `csec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb.historic`
--

CREATE TABLE `tb.historic` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `changes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb.historic`
--

INSERT INTO `tb.historic` (`id`, `date`, `username`, `name`, `ip`, `changes`) VALUES
(1, '2022-01-26 09:30:29', 'samarobsds', 'S2 Samaro', '161.24.235.2', 'Adicionou o material com BMP: 781212'),
(2, '2022-01-26 09:38:18', 'samarobsds', 'S2 Samaro', '161.24.235.2', 'Adicionou o material com BMP: 1608223'),
(3, '2022-01-26 09:40:38', 'samarobsds', 'S2 Samaro', '161.24.235.2', 'Adicionou o material com BMP: 781205'),
(4, '2023-01-09 13:45:28', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1553305'),
(5, '2023-01-09 13:45:36', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1748434'),
(6, '2023-01-09 13:45:44', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1628135'),
(7, '2023-01-09 13:45:52', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1628137'),
(8, '2023-01-09 13:46:00', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1628136'),
(9, '2023-01-09 13:46:07', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1628138'),
(10, '2023-01-09 13:46:15', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 781209'),
(11, '2023-01-09 13:46:24', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1628142'),
(12, '2023-01-09 13:46:32', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 777086'),
(13, '2023-01-09 13:46:39', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1608219'),
(14, '2023-01-09 13:46:46', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 1553271'),
(15, '2023-01-09 13:47:16', 'admin', 'Administrador', '161.24.235.2', 'Adicionou o material com BMP: 776229');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb.local`
--

CREATE TABLE `tb.local` (
  `id` int(11) NOT NULL,
  `local` varchar(255) NOT NULL,
  `created_in` date NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb.local`
--

INSERT INTO `tb.local` (`id`, `local`, `created_in`, `created_by`) VALUES
(1, 'Área Operacional', '2023-01-03', 'S2 Chagas'),
(2, 'CMAT', '2023-01-03', 'S2 Chagas'),
(3, 'CSEC', '2023-01-03', 'S2 Chagas'),
(4, 'CSEC (Credenciamento)', '2023-01-03', 'S2 Chagas'),
(5, 'DCTA', '2023-01-03', 'S2 Chagas'),
(6, 'DI-S', '2023-01-03', 'S2 Chagas'),
(7, 'ETA', '2023-01-03', 'S2 Chagas'),
(8, 'GSD-SJ', '2023-01-03', 'S2 Chagas'),
(9, 'IAOP', '2023-01-03', 'S2 Chagas'),
(10, 'IAE', '2023-01-03', 'S2 Chagas'),
(11, 'ITA', '2023-01-03', 'S2 Chagas'),
(12, 'IEAv', '2023-01-03', 'S2 Chagas'),
(13, 'IPEV', '2023-01-03', 'S2 Chagas'),
(14, 'Material Bélico', '2023-01-03', 'S2 Chagas'),
(15, 'Monitoramento', '2023-01-03', 'S2 Chagas'),
(16, 'Portão Brejauveira', '2023-01-03', 'S2 Chagas'),
(17, 'Portão Dutra', '2023-01-02', 'S2 Chagas'),
(18, 'Portão Faria Lima', '2023-01-02', 'S2 Chagas'),
(19, 'Portão Principal', '2023-01-03', 'S2 Chagas'),
(20, 'Portão Tamoios', '2023-01-03', 'S2 Chagas'),
(21, 'SPMont', '2023-01-03', 'S2 Chagas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb.materials`
--

CREATE TABLE `tb.materials` (
  `id` int(11) NOT NULL,
  `bmp` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb.materials`
--

INSERT INTO `tb.materials` (`id`, `bmp`, `description`, `img`, `obs`, `local`) VALUES
(1, 777725, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm ', '777725.png', 'Instalada via cabo CCE-APL 8 pares na Sala Manutenção.', 'Material Bélico'),
(2, 777727, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777727.png', 'Instalado via cabo UTP na Sala Sgt de Dia', 'Portão Brejauveira'),
(3, 777729, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777729.jpg', 'ARMARIO', 'CSEC'),
(4, 777732, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777732.jpg', 'Destinado a instrução', 'CSEC'),
(5, 777736, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777736.jpg', 'Instalado via cabo Coaxial na ENT FUN (teto)', 'Portão Principal'),
(6, 777738, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777738.jpg', 'Em estoque no armário', 'CSEC'),
(7, 777740, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777740.jpg', 'Em estoque no armário', 'CSEC'),
(8, 777743, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777743.jpg', 'Instalado via ... no Centro', 'Portão Principal'),
(9, 777748, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777748.jpg', 'Instalado via ... na ENT FUN (teto)', 'Portão Principal'),
(10, 777750, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777750.jpg', 'Em estoque no armário', 'CSEC'),
(11, 777752, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777752.jpg', 'Instalado via ... no Acesso', 'Portão Dutra'),
(12, 777754, 'Câmera Ir 30leds Ccd So 1/3 480l C/Lente 8mm', '777754.jpg', 'Instalado via ... na ENT FUN', 'Portão Principal'),
(13, 778567, 'Câmera Ir 48leds Ccd So 1/3 480l C/Lente 25mm', '778567.jpg', 'Instalado via ... na SAI FUN', 'Portão Principal'),
(14, 778568, 'Câmera Ir 48leds Ccd So 1/3 480l C/Lente 25mm', '778568.jpg', 'ARMÁRIO ', 'CSEC'),
(15, 1128156, 'Regulador Automático de voltagem, 110/220, Mod Tec.1000plus, Marca Tec-Power', '1128156.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(16, 771145, 'Câmera Web Marca Microsoft', '771145.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(17, 771146, 'Câmera Web Marca Microsoft', '771146.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(18, 771147, 'Câmera Web Marca Microsoft', '771147.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(19, 1045741, 'Monitor Led Samsung S22a300b 22”; Resolução 1920x1080 Full Hd Contraste Mega Dcr 5000.000 Brilho Cd/M', '1045741.jpg', 'Instalado na Sala Sgt de Dia', 'Portão Brejauveira'),
(20, 1045748, 'Monitor Led Samsung S22a300b 22”; Resolução 1920x1080 Full Hd Contraste Mega Dcr 5000.000 Brilho Cd/M', '1045748.jpg', 'Em estoque no armário', 'CSEC'),
(21, 1212468, 'Impressora de Cartão Pvc Marca Evolis Pebble N° SÉRIE: PB10000202775', '1212468.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(22, 1322318, 'Microcomputador Marca Dell, Modelo Optplex 790 Desktop, com Processador i3, Hd de 320gb, Teclado Usb, Mause Óptico Usb , Gravar de dvd e sistema operacional windows 7 N°SÉRIE:FJBY8S1', '1322318.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(23, 1449309, 'Impressora zebra zxp 3 1lado', '1449309.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(24, 1623897, 'Monitor Led 19 marca Philips', '1623897.jpg', 'Em estoque no armário', 'CSEC'),
(25, 1623898, 'Monitor Led 19 marca Philips', '1623898.jpg', 'Em estoque no armário', 'CSEC'),
(26, 226475, 'Microcomputador padrão atx, Modelo Dx 5150mt, Marca HP , com processador amd atlhon tm3200 + de 3.0GHz; 512MB de memo ram (ddr); leitor de disquete 3 ½ ; unidade Rewritable combo dvd rom; unidade de Rígido – Padrão Sata – 80GB', '226475.jpg', 'Computador Auxiliar da seção', 'CSEC'),
(27, 771841, 'Microcomputador Dell Optiplex 330 (SISPAT: 73573002 – FCG: 73573 – N° SÉRIE: 7PFDNH1)', '771841.jpg', 'Computador auxiliar da seção', 'CSEC'),
(28, 772387, 'Computador Intel Dell Optiplex 330 (SISPAT: 55667009 – FCG: 55667)', '772387.jpg', 'Em estoque no armário', 'CSEC'),
(29, 772407, 'Impressora por termo transparência marca Evolis (SISPAT: 66945001 – FCG: 66945)', '772407.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(30, 772417, 'Monitor 17\" (SISPAT: 73900002 – FCG: 73900)', '772417.jpg', 'Em estoque no armário', 'CSEC'),
(31, 773688, 'Microcomputador Dell Optiplex 330 (SISPAT: 65808017 – FCG: 65808 – N° 333WYH1)', '773688.jpg', 'Computador monitorando a Portão Principal', 'Monitoramento'),
(32, 932449, 'Monitor Dell 19\" - Modelo E1911C', '932449.jpg', 'Monitor auxiliar da seção (QUEIMADO)', 'CSEC'),
(33, 1118388, 'Switch Gicabit 2824, marca 3COM, 24 portas Autosensing 10/100/1000 Ethernet Interfaces de mídia: 10/100/1000base-tx/rj-45 ,recursos de switcing ethernet: sobre-and-forward, auto negociação Full-/half-duplex, class-of-service (Cos), priorização de tráfego ', '1118388.jpg', 'Em estoque no armário', 'CSEC'),
(34, 1940648, 'Impressora Evolis Primacy Duplex', '', 'Instalado na seção', 'CSEC (Credenciamento)'),
(35, 1940649, 'Impressora Evolis Primacy Duplex', '', 'Instalado na seção', 'CSEC (Credenciamento)'),
(36, 1940650, 'Impressora Evolis Primacy Duplex', '', 'Instalado na seção', 'CSEC (Credenciamento)'),
(37, 776629, 'Evaporadora Mcw512 12000 Btu/H Trane (SISPAT: 65754001 – FCG: 65754)', '776629.jpg', 'Instalado no monitoramento / (QRU- Não Refrigera) BARRACA DA CMAT', 'Monitoramento'),
(38, 776631, 'Evaporadora MCW512 12000 BTU/H Trane (SISPAT: 65754002 – FCG: 65754)', '776631.jpg', 'Instalado no monitoramento / (QRU- Vaza Água) BARRACA DA CMT', 'Monitoramento'),
(39, 776634, 'Condesadora ttds18 18000 BTU/H Trane 220v (SISPAT: 65755001 – FCG: 65755)', '776634.jpg', 'Instalaldo na área externa da CSEC', 'Monitoramento'),
(40, 1403636, 'Cadeira Espaldar Baixo', '1403636.jpg', 'Na copa do monitoramento', 'Monitoramento'),
(41, 1403638, 'Cadeira Espaldar Baixo', '1403638.png', 'GMM Barbearia', 'CSEC'),
(42, 1889477, 'Cadeira Fixa de Encosto Médio Sem Braços', '1889477.jpg', 'Sala de monitoramento', 'Monitoramento'),
(43, 1889478, 'Cadeira Fixa de Encosto Médio Sem Braços', '1889478.jpg', 'Cadeira do monitoramento', 'Monitoramento'),
(44, 1889485, 'Cadeira Fixa de Encosto Médio Sem Braços', '1889485.jpg', 'Área dos armários', 'Monitoramento'),
(45, 692314, 'Poltrona Fixa, Mod. 026, Marca Giroflex (SISPAT: 27748018 – FCG: 27748)', '692314.jpg', 'Seção', 'CSEC'),
(46, 692424, 'Poltorna Giratória, base 5 patas s/ rodízios, mola amortecedora, mecanismo de inclinação e regulador de altura, revestida em napa verde, Mod. 5462gr, marca fergo (SISPAT: 44710035 – FCG: 44710)', '692424.jpg', 'Cadeira do encarregado', 'CSEC'),
(47, 822658, 'Mesa Madeirense com 1 gaveteiro de 3 gavetas, med 1,48 x 0,75 x 0,75 M (SISPAT: 10481001 – FCG: 10481)', '822658.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(48, 827822, 'Arquivo de aço frontal c/ 04 gavetas p/ pastas estrutura em aço med 410lx715px1335 m (SISPAT: 15154001 – FCG: 15154)', '827822.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(49, 827826, 'Armario alto composto 5 prat med 800lx500px2100 mm (SISPAT: 15228001 – FCG: 15228)', '827826.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(50, 1121133, 'Suporte ajustável para CPU vertical, em chapa de aço, dobrada e acabamento em pintura epóxi-pó, com rodízios em nylon, sem trava, medindo altura 16cm, profundidade 47cm, peso 2kg,largura ajustável 20,5 a 25,5 cm (SISPAT: 2851016 – FCG: 2851)', '1121133.png', 'Guia de Movimentação de Material', 'CSEC (Credenciamento)'),
(51, 1608127, 'Gravador Digital Dvr 16 Canais Marca Loud', '1608127.jpg', 'Em estoque no armário', 'CSEC'),
(52, 1608128, 'Gravador Digital Dvr 16 Canais Marca Loud', '1608128.jpg', 'Em estoque no armário (retirado da portaria do DCTA)', 'CSEC'),
(53, 1608129, 'Gravador Digital Dvr 16 Canais Marca Loud', '1608129.jpg', 'Em estoque no armário (retirado do Portão Brejauveira)', 'CSEC'),
(54, 1608183, 'Câmera de Vídeo Marca Visontech 15m', '1608183.jpg', 'Instalado via... na ENT PEDESTRE', 'Portão Brejauveira'),
(55, 1608187, 'Câmera de Vídeo Marca Visontech 15m', '1608187.jpg', 'Destinado a instrução', 'CSEC'),
(56, 1608189, 'Câmera de Vídeo Marca Visontech 15m', '1608189.jpg', 'No armario', 'CSEC'),
(57, 1608190, 'Câmera de Vídeo Marca Visontech 15m', '1608190.jpg', 'Em estoque no armário (retirado do Aloj. Charlie)', 'CSEC'),
(58, 1608200, 'Câmera de Vídeo Marca Visontech 15m', '1608200.jpg', 'Em estoque no armário', 'CSEC'),
(59, 1608202, 'Câmera de Vídeo Marca Visontech 15m', '1608202.jpg', 'Em estoque no armário', 'CSEC'),
(60, 1608217, 'Câmera de Vídeo Marca Visontech 25m', '1608217.jpg', 'Em estoque no armário', 'CSEC'),
(61, 781212, 'Câmera Colorida com sinal de saída de vídeo vp p composite dispositivo da imagem 1/3 ccd Super Had, Cor Prata   (SISPAT: 155660046 - FCG:55660)', '781212.jpg', 'Instalado via cabo UTP na \"AREA EXT\"', 'CMAT'),
(62, 1608223, 'Câmera de Vídeo Marca Visontech 15m, Cor Branca\r\n', '1608223.jpg', 'Instalado via cabo UTP no \"ALOJ D\"', 'CMAT'),
(63, 781205, 'Câmera Colorida com sinal de saída de vídeo vp p composite dispositivo da imagem 1/3 ccd Super Had, Cor Prata  (SISPAT: 155660043 - FCG:55660)', '781205.jpg', 'Instalado via cabo UTP no \"DEPOSITO\"', 'CMAT'),
(64, 1553462, 'Dvr Com 4 Canais e Tela LCD 7”', '1553462.jpg', 'Instalado na mesa do encarregado', 'CMAT'),
(65, 778713, 'Câmera Ir 20 Ccd 1/3 Sony 3 6 mm  A1P1/Sr 02,  Cor Preto (SISPAT: 74036008 – FCG: 74036)', '778713.png', 'Instalado via cabo ... \"ENT ARMAZÉM\' ', 'DI-S'),
(66, 1553477, 'Dvr Com 4 Canais e Tela LCD 7”', '1553477.png', 'Instalado em cima da mesa do encarregado', 'DI-S'),
(67, 1553306, 'Câmera Dome com Infravermelho, Modelo C809, Cor Preto', '1553306.png', 'Instalado via cabo... na \"SALA ADJ\"', 'DI-S'),
(68, 1553470, 'Dvr Com 4 Canais e Tela LCD 7”', '1553470.jpg', 'Instalado na \"SALA SERVIDOR\"', 'ETA'),
(69, 778701, 'Câmera Ir 20 Ccd 1/3 Sony 3 6 mm A1P1/Sr 02, Cor Preto (SISPAT: 74036006 – FCG: 74036)', '778701.png', 'Instalado via cabo... na \"FRENTE ALOJ\"', 'ETA'),
(70, 1553315, 'Câmera com infravermelho, Modelo Aw-809, Cor Preto', '1553315.png', 'Instalado via cabo... na \"ENT\"', 'ETA'),
(71, 1628143, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto  Intelbras', '1628143.png', 'Instalado via cabo... no \"SERVIDOR ETA\"', 'ETA'),
(72, 1553285, 'Câmera de vigilância envoltório de alumínio, Cor Preto', '1553285.jpg', 'Instalado via cabo ... no \"ALOJ C\'', 'GSD-SJ'),
(73, 1413076, 'DVR 8 Canais Intelbras,  Modelo VD 3008', '1413076.jpg', 'Instalado no gabinete do monitoramento', 'GSD-SJ'),
(74, 1628129, 'Televisor 42” marca Philco', '1628129.png', 'Em estoque', 'GSD-SJ'),
(75, 776229, 'Tv Led 42” 42lv5500 Marca Lg (SISPAT: 74124001 – FCG:74124)', '776229.png', 'Instalado na parede do monitoramento', 'GSD-SJ'),
(76, 1628139, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto Intelbras', '1628139.jpg', 'Instalado via cabo... na \"ENT CSEC\"', 'GSD-SJ'),
(77, 1628145, 'Testador de Monitor e Gerador Marca CCTV', '1628145.jpg', 'Armário da seção', 'CSEC'),
(78, 1553277, 'Câmera IR digital CCD vídeo com infravermelho, Cor Prata ( SEM PLUG P4)', '1553277.png', 'Armário da seção em estoque', 'CSEC'),
(79, 1553311, 'Câmera com infravermelho, Modelo Aw-809, Cor Preto', '1553311.png', 'Armário da seção em estoque', 'CSEC'),
(80, 1553304, 'Câmera Dome com Infravermelho, Modelo C809, Cor Preto', '1553304.png', 'SALA ADJUNTO', 'Portão Principal'),
(81, 1608220, 'Câmera de Vídeo Marca Visontech 25m, Cor Branca', '1608220.png', 'Armário da seção em estoque', 'CSEC'),
(82, 1553312, 'Câmera com infravermelho, Modelo  Aw-809, Cor Preto', '1553312.png', 'Armário da seção em estoque', 'CSEC'),
(83, 778703, 'Câmera Ir 20 Ccd 1/3 Sony 3 6 mm A1P1/Sr 02,  Cor Preto (SISPAT: 74036007 – FCG: 74036', '778703.png', 'Armário da seção em estoque', 'CSEC'),
(84, 1628141, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto Intelbras', '1628141.png', 'Armário (Câmera sem o polo positivo)', 'CSEC'),
(85, 1553409, 'Speed Dome, Sem Câmera, Cor Cinza', '1553409.png', 'ARMÁRIO ', 'CSEC'),
(86, 1553410, 'Speed Dome, Cor Cinza', '1553410.png', 'Armário da seção para reposição ', 'CSEC'),
(87, 1553412, 'Speed Dome, Cor Cinza', '1553412.png', 'Parede seção', 'CSEC'),
(88, 1553468, 'Dvr Com 4 Canais e Tela LCD 7”', '1553468.png', 'Armário da seção em estoque', 'CSEC'),
(89, 1553479, 'Dvr Com 4 Canais e Tela LCD 7”', '1553479.png', 'Funcionando/Instrução', 'CSEC'),
(90, 1553480, 'Dvr Com 4 Canais e Tela LCD 7”', '1553480.png', 'Armário da seção', 'CSEC'),
(91, 1553482, 'Dvr Com 4 Canais e Tela LCD 7”', '1553482.png', 'Maquete de instrução', 'CSEC'),
(92, 1553488, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553488.png', 'Armário da seção em estoque', 'CSEC'),
(93, 1553489, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553489.png', 'Em cima da mesa do encarregado', 'GSD-SJ'),
(94, 1553491, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553491.png', 'Armário da seção em estoque', 'CSEC'),
(95, 1553493, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553493.png', 'Armário da seção em estoque', 'CSEC'),
(96, 1553494, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553494.png', 'Armário da seção em estoque', 'CSEC'),
(97, 2148321, 'Televisor, Tamanho 60 POL, Voltagem Bivolt, Característica Adicionais Smart Tv, FULL HD', '2148321.jpg', 'Na parede do monitoramento', 'GSD-SJ'),
(98, 224985, 'Gaveteiro volante 5 gavetas\r\n', '224985.jpg', 'Na seção', 'CSEC'),
(99, 1128952, 'Gaveteiro volante 2 gavetas\r\n', '1128952.jpg', 'Na seção', 'CSEC'),
(100, 1748432, 'Câmera IP Bullet IR (DS-2CD2020-1 4MM)', '1748432.jpg', 'No armário em estoque', 'CSEC'),
(101, 1748434, 'Câmera IP Bullet Hikvision DS-2CD2020-I - 2MP IR 30 mts IP66 PoE', '1748434.jpg', 'Instalada via cabo UTP Cat5.e com fonte de 12v na ENT POSTE', 'Portão Brejauveira'),
(102, 1748435, 'Câmera IP Bullet Hikvision DS-2CD2020-I - 2MP IR 30 mts IP66 PoE', '1748435.jpg', 'Instalada via cabo UTP Cat5.e com fonte 12v na SAI POSTE', 'Portão Brejauveira'),
(103, 1748438, 'Câmera IP Bullet IR (DS-2CD2020-1 4MM)', '1748438.jpg', 'No armário em estoque', 'CSEC'),
(104, 1838870, 'Câmera IP Bullet 2MP, Lente IR 30 MTS (DS-2CD2020F-1 4MM)', '1838870.jpg', 'No armário em estoque', 'CSEC'),
(105, 1838618, 'NVR 16 Canais (DS-7616NI-E2/16P) + HD 2TB WD PURPLE', '1838618.jpg', 'No armário em estoque', 'CSEC'),
(106, 1848752, 'Câmera IP Bullet IR (DS-2CD2020-1 4MM)', '1848752.jpg', 'No armário em estoque', 'CSEC'),
(107, 1833802, 'Câmera IP MINI DOME 2MP (DS2CD2520F 2.8MM)', '1833802.jpg', 'No armário em estoque', 'CSEC'),
(108, 1848760, 'Câmera IP MINI DOME 2MP (DS2CD2520F 2.8MM)', '1848760.jpg', 'No armário em estoque', 'CSEC'),
(109, 1848762, 'Câmera IP MINI DOME 2MP (DS2CD2520F 2.8MM)', '1848762.jpg', 'No armário em estoque', 'CSEC'),
(110, 1833790, 'Câmera IP Bullet 2MP, Lente IR 30 MTS (DS-2CD2020F-1 4MM)', '1833790.jpg', 'No armário em estoque', 'CSEC'),
(111, 1838871, 'Câmera IP Bullet 2MP, Lente IR 30 MTS (DS-2CD2020F-1 4MM)', '1838871.jpg', 'No armário em estoque', 'CSEC'),
(112, 1854014, 'Câmera Speed Dome, 2MP DARKFIGHTER', '1854014.jpg', 'No armário em estoque', 'CSEC'),
(113, 1628130, 'Mini Câmera Color Lente, Cor Preto, 3,6mm Marca Intelbras', '1628130.png', 'Maquete de instrução', 'CSEC'),
(114, 1412052, 'Speed Dome Laser Intelbras', '1412052.jpg', 'No armário em estoque', 'CSEC'),
(115, 1412054, 'Speed Dome Laser Intelbras', '1412054.jpg', 'No armário em estoque', 'CSEC'),
(116, 1412835, 'Câmera Infravermelho Vm300ir25 Intelbras', '1412835.jpg', 'No armário em estoque', 'CSEC'),
(117, 1553268, 'Camera Circuito Fechado, Marca Samsung, Modelo Sco-2120r', '1553268.jpg', 'No armário em estoque', 'CSEC'),
(118, 1797084, 'Rádio comunicador,  Marca Motorola, Mod. Dt-620', '1797084.jpg', 'No armário em estoque', 'CSEC'),
(119, 1797095, 'Rádio comunicador,  Marca Motorola, Mod. Dt-620', '1797095.jpg', 'No armário em estoque', 'CSEC'),
(120, 1553305, 'Câmera Dome com Infravermelho, Modelo C809, Cor Preto', '1553305.jpg', 'Instalado via cabo.. \"SALA\"', 'Portão Brejauveira'),
(121, 1412059, 'DVR 32 Canais Intelbras', '1412059.jpg', 'Instalado na mesa do comandante ', 'Portão Brejauveira'),
(122, 1553478, 'Dvr Com 4 Canais e Tela LCD 7”', '1553478.png', 'Instalado na sala', 'Portão Dutra'),
(123, 1553473, 'Dvr Com 4 Canais e Tela LCD 7”', '1553473.jpg', 'Instalado na mesa do comandante', 'Portão Faria Lima'),
(124, 1628140, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto Intelbras', '1628140.jpg', 'Instalado via cabo.... na \"SALA TELEFONISTA\"', 'Portão Principal'),
(125, 1608229, 'Câmera de Vídeo Marca Visontech 25m', '1608229.jpg', 'Instalado via cabo.... na \"ENT FUN 2\'', 'Portão Principal'),
(126, 1553271, 'Câmera de Vigilância Envoltório de Alumínio, Cor Prata  ', '1553271.jpg', 'Instalado via cabo.... na \"Seção\"', 'Material Bélico'),
(127, 1608219, 'Câmera de Vídeo Marca Visontech 15m, Cor Branca\r\n', '1608219.jpg', 'Instalado via cabo.... na \"SALA DAS ARMAS\"', 'Material Bélico'),
(128, 777086, 'Câmera Color 480 Linhas Marca Intelbras, Cor Prata (SISPAT: 66704040 – FCG:66704)', '777086.jpg', 'Instalado via cabo.... na \"SALA DAS ARMAS\"', 'Material Bélico'),
(129, 1628142, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto Intelbras', '1628142.jpg', 'Instalado via cabo.... na \"ENT PRINCIPAL\"', 'Material Bélico'),
(130, 781209, 'Câmera Colorida com sinal de saída de vídeo vp p composite dispositivo da imagem 1/3 ccd Super Had, Cor Branca, com case Cor Branca (SISPAT: 155660045 - FCG:55660)', '781209.png', 'Instalado via cabo.... na \"GUICHÊ DO ARMEIRO\"', 'Material Bélico'),
(131, 1628138, 'Mini Câmara Color Lente 3,6mm Marca, Cor Preto Intelbras', '1628138.jpg', 'Instalado via cabo... na \"ARMARIA TETO\"', 'Material Bélico'),
(132, 1628136, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto Intelbras', '1628136.jpg', 'Instalado via cabo.... no \"GUICHÊ ARMEIRO\"', 'Material Bélico'),
(133, 1628137, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto Intelbras', '1628137.jpg', 'Instalado via cabo.... no \"GUICHÊ DO ARMEIRO\"', 'Material Bélico'),
(134, 1628135, 'Mini Câmera Color Lente 3,6mm Marca, Cor Preto Intelbras\r\n', '1628135.jpg', 'Instalado via cabo... na \"SALA DOS COLETES\"', 'Material Bélico'),
(135, 1553384, 'Mini Speed Dome, Cor Cinza', '1553384.png', 'INSTALADA NA ROTATÓRIA TIRADENTES', 'GSD-SJ'),
(136, 1412058, 'DVR 32 Canais Intelbras', '1412058.jpg', 'Instalado dentro do switch', 'Material Bélico'),
(137, 1412060, 'DVR 32 Canais Intelbras ', '1412060.jpg', 'No armário em estoque', 'CSEC'),
(138, 1412785, 'Câmera Infravermelho Vm315ir25 Intelbras', '1412785.jpg', 'Instalado na pilastra (Saída de veículos)', 'Portão Brejauveira'),
(139, 1412839, 'Câmera Infravermelho Vm300ir25 Intelbras', '1412839.jpg', 'Instalado na via cabo ...', 'Portão Brejauveira'),
(140, 1553483, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553483.jpg', 'Prédio ENU', 'SPMont'),
(141, 1553484, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553484.jpg', 'Prédio EFO', 'SPMont'),
(142, 951029, 'Microcamera 480 Linhas Marca Project System (SISPAT: 65788001 – FCG:65788)', '', 'Sem alteração', 'DCTA'),
(143, 951030, 'Microcamera 480 Linhas Marca Project System (SISPAT: 65788002 – FCG:65788)', '', 'Sem alteração', 'DCTA'),
(144, 951031, 'Microcamera 480 Linhas Marca Project System (SISPAT: 65788003 – FCG:65788)', '', 'Sem alteração', 'DCTA'),
(145, 951032, 'Microcamera 480 Linhas Marca Project System (SISPAT: 65788004 – FCG:65788)', '', 'Sem alteração', 'DCTA'),
(146, 951033, 'Microcamera 480 Linhas Marca Project System (SISPAT: 65788005 – FCG:65788)', '', 'Sem alteração', 'DCTA'),
(147, 1120052, 'Unidade Evaporadora e Unidade Condensadora Com Capacidade de 9000 Btu S, Marca Komeco, Modelo Hi Wall, Quente e Frio, 220v, Com controle Remoto  (SISPAT: 2239008 – FCG: 2239)', '1120052.jpg', 'Instalado na seção', 'CSEC'),
(148, 1120046, 'Unidade Evaporadora e Unidade Condensadora Com Capacidade de 9000 Btu S, Marca Komeco, Modelo Hi Wall, Quente e Frio, 220v, Com controle Remoto  (SISPAT: 2239008 – FCG: 2239)', '1120046.jpg', 'Instalado na seção', 'CSEC'),
(149, 1608222, 'Câmera de Vídeo Marca Visontech 15m, Cor Branca', '1608222.png', 'Armário (QRU - Queimada)', 'CSEC'),
(150, 1553408, 'Speed Dome, Sem Câmera, Cor Cinza', '1553408.png', 'Armário', 'CSEC'),
(151, 1553452, 'Speed Dome, Sem Câmera, Cor Cinza', '1553452.png', 'Em estoque no armário (Não funciona - aguardando exclusão)', 'CSEC'),
(152, 1553492, 'Dvr Com 8 Canais, Modelo CL-D7308HF', '1553492.png', 'Em estoque no armário (Não funciona)', 'CSEC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb.users`
--

CREATE TABLE `tb.users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb.users`
--

INSERT INTO `tb.users` (`id`, `username`, `password`, `email`, `name`, `role`) VALUES
(1, 'admin', '8a047BOjgtJwRHr9', 'admin@admin.com.br', 'Administrador', 2),
(2, 'chagasvcb', '8a047BOjgtJwRHr9', 'chagasvcb@fab.mil.br', 'S2 Chagas', 2),
(3, 'samarobsds', 'Dezembro@2021', 'samaro@fab.mil.br', 'S2 Samaro', 0),
(4, 'lee', 'Janeiro@2023', 'lee@fab.mi.br', 'S2 Lee', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb.historic`
--
ALTER TABLE `tb.historic`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb.local`
--
ALTER TABLE `tb.local`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb.materials`
--
ALTER TABLE `tb.materials`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb.users`
--
ALTER TABLE `tb.users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb.historic`
--
ALTER TABLE `tb.historic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tb.local`
--
ALTER TABLE `tb.local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb.materials`
--
ALTER TABLE `tb.materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT de tabela `tb.users`
--
ALTER TABLE `tb.users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
