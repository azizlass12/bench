

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hospito`
--

-- --------------------------------------------------------

--
-- Structure de la table `secetraire`
--

CREATE TABLE `secetaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `pwd` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `username`, `pwd`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table ``
--

CREATE TABLE `fiche` (
  `cin` varchar(60) NOT NULL,
  `inp` varchar(60) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fiche`
--

INSERT INTO `fiche` (`cin`, `inp`, `note`) VALUES
('I343434', '330033', 'état grave '),
('IA12345', '110011', 'en progrès'),
('IA232323', '330033', 'état satisfaisant');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
   `daten` varchar(60) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `cin` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `genre` varchar(60) DEFAULT NULL,
  `specialite` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`nom`, `prenom`, `daten`, `genre`, `specialite`, `email`, `tel`, `adresse`, `password`) VALUES
(110011, 'mohamed' ,'karim','02-02-1992', 'homme', 'generaliste', 'm.karim@gmail.com', '0611223344', 'beni mellal quartier ibn sina n°20', 'med', 'med'),
(220022, 'amine ' ,'karim', '02-02-1992', 'homme', 'cardiologue', 'a.karim@gmail.com', '0611223344', 'quartier doha n°33 rue hassan 2 Khouribga', 'med2', 'med2'),
(330033, 'taha karim', 'karim' ,'02-02-1992', 'homme', 'generaliste', 't.karim@gmail.com', '0611223344', 'quartier zitounia n°20 Beni Mellal', 'med3', 'med3'),
(440044, 'Meriem ', 'Samlaoui','1995-05-04', 'Femme', 'gynécologue', 'm.samlaoui@gmail.com', '0640404040', 'Quartier Ibn rochd N°42 Beni Mellal', 'med4', 'med4'),
(550055, 'Oumaima'  'Ablaoui', '1990-05-10', 'Femme', 'Pneumologiste', 'O.Ablaoui@gmail.com', '0655005500', 'Quartier Hassan 2 n°54 Beni Mellal', 'med5', 'med5');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

