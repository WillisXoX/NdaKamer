-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 08:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logement`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`nom`, `prenom`, `contact`, `email`, `username`, `password`) VALUES
('DilanXoX', 'Roland', 699692964, 'DilanXoX@gmail.com', 'DilanXoX', 'DilanXoX'),
('William', 'William', 699692964, 'Williamston@gmail.com', 'William', 'William'),
('Stann', 'Stann', 699692964, 'Williamston@gmail.com', 'WillisXoX', 'WillisXoX'),
('Xavier', 'Foster', 2147483647, 'KelvinStone@gmail.com', 'Xavier', 'Xavier');

-- --------------------------------------------------------

--
-- Table structure for table `agentinfo`
--

CREATE TABLE `agentinfo` (
  `IdAgent` varchar(20) NOT NULL,
  `image` varchar(30) NOT NULL,
  `residence` varchar(20) NOT NULL,
  `age` int(5) NOT NULL,
  `experience` int(5) NOT NULL,
  `prix` int(10) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agentinfo`
--

INSERT INTO `agentinfo` (`IdAgent`, `image`, `residence`, `age`, `experience`, `prix`, `description`) VALUES
('DilanXoX', '62b44cb4019191.70658974.jpg', 'NGOA', 30, 2, 120, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('William', '62b34676d1c604.19427241.jpg', 'MELEN', 28, 2, 150, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('WillisXoX', '62b347600d8b08.82180667.jpg', 'MENDONG', 30, 2, 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Xavier', '62b48eed1325c5.90747910.jpg', 'NGOA', 25, 2, 120, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `bailleur`
--

CREATE TABLE `bailleur` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bailleur`
--

INSERT INTO `bailleur` (`nom`, `prenom`, `contact`, `email`, `username`, `password`) VALUES
('asdasd', 'asdasd', 699692964, 'wilson@gmail.com', 'asdasd', 'asdasdasdasd'),
('William', 'Stone', 699692964, 'Williamston@gmail.com', 'Willis0000', 'Willis0000'),
('William', 'Stone', 699692964, 'Williamston@gmail.com', 'WillisXoX', 'formSignUp');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `categorie`) VALUES
('APPARTEMENT', 'APPARTEMENT'),
('CHAMBRE', 'CHAMBRE'),
('MAISON', 'MAISON'),
('STUDIO', 'STUDIO');

-- --------------------------------------------------------

--
-- Table structure for table `categorieagent`
--

CREATE TABLE `categorieagent` (
  `idCategorie` varchar(20) NOT NULL,
  `idAgent` varchar(20) NOT NULL,
  `agent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorieagent`
--

INSERT INTO `categorieagent` (`idCategorie`, `idAgent`, `agent`) VALUES
('APPARTEMENT', 'William', 'William'),
('CHAMBRE', 'William', 'William'),
('CHAMBRE', 'WillisXoX', 'WillisXoX'),
('CHAMBRE', 'Xavier', 'Xavier'),
('MAISON', 'DilanXoX', 'DilanXoX'),
('STUDIO', 'DilanXoX', 'DilanXoX'),
('STUDIO', 'William', 'William'),
('STUDIO', 'WillisXoX', 'WillisXoX'),
('STUDIO', 'Xavier', 'Xavier');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idBailleur` varchar(20) NOT NULL,
  `idLogement` varchar(20) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idBailleur`, `idLogement`, `image`) VALUES
('Willis0000', '25096354', '62b449618d0659.01951020.jpg'),
('Willis0000', '25096354', '62b449618e1d11.38915594.jpg'),
('Willis0000', '25096354', '62b449618ebc82.96589678.jpg'),
('Willis0000', '25685854', '62b47c741092a6.75822987.jpg'),
('Willis0000', '25685854', '62b47c74121f23.00893939.jpg'),
('Willis0000', '25685854', '62b47c7412bd34.50268736.jpg'),
('Willis0000', '31272318', '62b34a3f232b93.69700366.jpg'),
('Willis0000', '31272318', '62b34a3f24a5f9.73797512.jpeg'),
('Willis0000', '31272318', '62b34a3f255351.91456252.jpeg'),
('Willis0000', '44000889', '62b45897b0c468.11140989.jpeg'),
('Willis0000', '44000889', '62b45897b26539.60501612.jpeg'),
('Willis0000', '44000889', '62b45897b316c7.23895020.jpeg'),
('Willis0000', '49387965', '62b34933e2f793.54799361.jpeg'),
('Willis0000', '49387965', '62b34933e464c6.03947210.jpeg'),
('Willis0000', '49387965', '62b34933e50a25.05588075.jpeg'),
('Willis0000', '55559812', '62b34abd1652b2.03842679.jpeg'),
('Willis0000', '55559812', '62b34abd17ceb2.60178865.jpeg'),
('Willis0000', '55559812', '62b34abd1873d1.71153988.jpeg'),
('Willis0000', '96885693', '62b349e35347a8.44017679.jpeg'),
('Willis0000', '96885693', '62b349e354a5b7.72184324.jpeg'),
('Willis0000', '96885693', '62b349e3553a30.29888144.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `idBailleur` varchar(20) NOT NULL,
  `idLogement` varchar(20) NOT NULL,
  `idCategorie` varchar(20) NOT NULL,
  `idStyle` varchar(20) NOT NULL,
  `lieu` varchar(20) NOT NULL,
  `prix` int(10) NOT NULL,
  `nb_chambres` int(5) NOT NULL,
  `nb_douches` int(5) NOT NULL,
  `emplacement` varchar(300) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`idBailleur`, `idLogement`, `idCategorie`, `idStyle`, `lieu`, `prix`, `nb_chambres`, `nb_douches`, `emplacement`, `status`) VALUES
('Willis0000', '25096354', 'APPARTEMENT', 'MODERNE', 'NGOA', 35000, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 1),
('Willis0000', '25685854', 'STUDIO', 'MODERNE', 'MELEN', 20000, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 1),
('Willis0000', '31272318', 'STUDIO', 'MODERNE', 'MENDONG', 30000, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 1),
('Willis0000', '44000889', 'MAISON', 'MEUBLER', 'MELEN', 75000, 3, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 1),
('Willis0000', '49387965', 'MAISON', 'SIMPLE', 'MENDONG', 20000, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 1),
('Willis0000', '55559812', 'STUDIO', 'MEUBLER', 'MENDONG', 40000, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 1),
('Willis0000', '96885693', 'APPARTEMENT', 'MODERNE', 'MELEN', 25000, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `idBailleur` varchar(20) NOT NULL,
  `idLogement` varchar(20) NOT NULL,
  `plan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`idBailleur`, `idLogement`, `plan`) VALUES
('Willis0000', '25096354', '62b449618fe264.13338814.jpg'),
('Willis0000', '25685854', '62b47c7413f7e8.79187137.jpg'),
('Willis0000', '31272318', '62b34a3f268032.78029973.jpg'),
('Willis0000', '44000889', '62b45897b4af07.74179050.jpg'),
('Willis0000', '49387965', '62b34933e67c64.99282358.jpg'),
('Willis0000', '55559812', '62b34abd19c303.71132613.jpg'),
('Willis0000', '96885693', '62b349e356a390.05930613.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quatier`
--

CREATE TABLE `quatier` (
  `idQuatier` varchar(20) NOT NULL,
  `quatier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quatier`
--

INSERT INTO `quatier` (`idQuatier`, `quatier`) VALUES
('BIYEMASSI', 'BIYEMASSI'),
('MELEN', 'MELEN'),
('MENDONG', 'MENDONG'),
('NGOA', 'NGOA'),
('SIMBOCK', 'SIMBOCK');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `idStyle` varchar(20) NOT NULL,
  `style` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`idStyle`, `style`) VALUES
('MEUBLER', 'MEUBLER'),
('MODERNE', 'MODERNE'),
('SIMPLE', 'SIMPLE');

-- --------------------------------------------------------

--
-- Table structure for table `styleagent`
--

CREATE TABLE `styleagent` (
  `idStyle` varchar(20) NOT NULL,
  `idAgent` varchar(20) NOT NULL,
  `agent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `styleagent`
--

INSERT INTO `styleagent` (`idStyle`, `idAgent`, `agent`) VALUES
('MEUBLER', 'DilanXoX', 'DilanXoX'),
('MODERNE', 'William', 'William'),
('MODERNE', 'WillisXoX', 'WillisXoX'),
('MODERNE', 'Xavier', 'Xavier'),
('SIMPLE', 'DilanXoX', 'DilanXoX'),
('SIMPLE', 'William', 'William'),
('SIMPLE', 'WillisXoX', 'WillisXoX'),
('SIMPLE', 'Xavier', 'Xavier');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `idBailleur` varchar(20) NOT NULL,
  `idLogement` varchar(20) NOT NULL,
  `video` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`idBailleur`, `idLogement`, `video`) VALUES
('Willis0000', '25096354', '62b449618f54e9.37162431.mp4'),
('Willis0000', '25685854', '62b47c74136206.33829695.mp4'),
('Willis0000', '31272318', '62b34a3f25ebf0.92123670.mp4'),
('Willis0000', '44000889', '62b45897b3e7d6.40485586.mp4'),
('Willis0000', '49387965', '62b34933e5bc28.07755278.mp4'),
('Willis0000', '55559812', '62b34abd190066.07680627.mp4'),
('Willis0000', '96885693', '62b349e3560063.69981848.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `agentinfo`
--
ALTER TABLE `agentinfo`
  ADD PRIMARY KEY (`IdAgent`);

--
-- Indexes for table `bailleur`
--
ALTER TABLE `bailleur`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `categorieagent`
--
ALTER TABLE `categorieagent`
  ADD PRIMARY KEY (`idCategorie`,`idAgent`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idBailleur`,`idLogement`,`image`);

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`idBailleur`,`idLogement`,`idCategorie`,`idStyle`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`idBailleur`,`idLogement`);

--
-- Indexes for table `quatier`
--
ALTER TABLE `quatier`
  ADD PRIMARY KEY (`idQuatier`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`idStyle`);

--
-- Indexes for table `styleagent`
--
ALTER TABLE `styleagent`
  ADD PRIMARY KEY (`idStyle`,`idAgent`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idBailleur`,`idLogement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
