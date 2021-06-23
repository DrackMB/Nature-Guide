-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 23 juin 2021 à 10:10
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `natureguide`
--

-- --------------------------------------------------------

--
-- Structure de la table `espace_vert`
--

DROP TABLE IF EXISTS `espace_vert`;
CREATE TABLE IF NOT EXISTS `espace_vert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `lets` float NOT NULL,
  `ing` float NOT NULL,
  `id_ville` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ville_espace` (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `espace_vert`
--

INSERT INTO `espace_vert` (`id`, `libelle`, `lets`, `ing`, `id_ville`, `description`, `image`) VALUES
(1, 'Jardin Japonais', 43.6119, 1.43216, 2, '', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/04/62/23/be/jardin-japonais.jpg?w=1200&h=-1&s=1'),
(2, 'Jardin Royal', 43.5956, 1.45022, 2, '', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0f/7b/df/02/jardin-royal.jpg?w=1200&h=-1&s=1'),
(3, 'Nature Occitane', 43.5981, 1.44467, 2, '', 'https://media-cdn.tripadvisor.com/media/photo-s/14/ff/bc/ba/des-ponts-interessants.jpg'),
(4, 'Jardin des plantes', 43.5931, 1.4512, 2, '', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/07/19/c5/04/jardin-des-plantes.jpg?w=1200&h=-1&s=1'),
(5, 'Garonne', 43.6981, 1.37446, 2, '', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/b0/e3/b3/garonne.jpg?w=1200&h=-1&s=1'),
(6, 'ardin du Grand Rond', 43.6043, 1.44367, 2, '', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/07/cd/ca/02/jardin-du-grand-rond.jpg?w=1200&h=-1&s=1'),
(7, 'Jardin des Géants', 50.633, 3.05858, 6, '', 'https://www.lilletourism.com/medias/images/prestataires/multitailles/800x600_jardin-des-geants-7035.jpg'),
(8, 'Parc Jean-Baptiste Lebas', 50.6267, 3.06902, 6, '', 'https://www.lilletourism.com/medias/images/prestataires/multitailles/800x600_parc-jean-baptiste-lebas-a-lille-4783.jpg'),
(9, 'Parc Henri Matisse', 50.6405, 3.07256, 6, '', 'https://www.lilletourism.com/medias/images/prestataires/multitailles/800x600_parcmatisserond-4941.jpg'),
(10, 'Jardin des plantes et serre équatoriale', 50.6132, 3.07472, 6, '', 'https://www.lilletourism.com/medias/images/prestataires/multitailles/800x600_jardin-des-plantes-lille-4798.jpg'),
(11, 'Parc de la Citadelle', 50.6421, 3.04825, 6, '', 'https://www.lilletourism.com/medias/images/prestataires/multitailles/800x600_accrobranches-benedicte-douchet-9422.jpg'),
(12, 'Jardin Vauban', 50.6367, 3.04929, 6, '', 'https://www.lilletourism.com/medias/images/prestataires/multitailles/800x600_jardin-vauban-lille-4801.jpg'),
(13, 'Le jardin des plantes', 43.6141, 3.87202, 4, '', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Montpellier_jardin_plantes3.jpg/1280px-Montpellier_jardin_plantes3.jpg'),
(14, 'L\'Esplanade Charles-de-Gaulle', 43.6113, 3.88117, 4, '', 'https://legrandmontpellier.fr/wp-content/uploads/2020/03/esplanade-charles-de-gaulle-montpellier-18.jpg'),
(15, 'Le Square Planchon', 43.6056, 3.87988, 4, '', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/2016-05-28-075849_-_Ilot_moussu.jpg/800px-2016-05-28-075849_-_Ilot_moussu.jpg'),
(16, 'Jardin de la Canourgue', 43.6121, 3.87478, 4, '', 'https://cdn-media.otmont.vm.aiprod.com/original/PCULAR034V50LIUG/0-place-canourgue-marieh--5-.jpg'),
(17, 'Parc Edith Piaf', 50.5168, 2.67845, 4, '', 'https://www.montpellier.fr/uploads/Image/2f/25025_396_Fontcolombe.jpg'),
(18, 'Parc Georges Clémenceau', 48.8417, 2.22191, 4, '', 'https://assets.justacote.com/photos_entreprises/parc-georges-clemenceau-montpellier-155792724394.jpg'),
(19, 'Parc de la Beaujoire', 47.2621, -1.53212, 5, '', 'https://jardins.nantes.fr/N/Jardin/Parcs-Jardins/Plus/128/Beaujoire/Photo/11.jpg'),
(20, 'Jardin Ile de Versailles', 47.223, -1.55248, 5, '', 'https://jardins.nantes.fr/N/Jardin/Parcs-Jardins/Plus/120/Versailles/Photo/10.jpg'),
(21, 'Jardin Extraordinaire', 47.2004, 1.5808, 5, '', 'https://jardins.nantes.fr/N/Jardin/Parcs-Jardins/Plus/2114/JardinExtraordinaire/Photo/6.jpg'),
(22, 'Parc de Procé', 47.2244, 1.58259, 5, '', 'https://jardins.nantes.fr/N/Jardin/Parcs-Jardins/Plus/36/Proce/Photo/1.jpg'),
(23, 'Parc de la Gaudinière', 47.2444, 1.57952, 5, '', 'https://jardins.nantes.fr/N/Jardin/Parcs-Jardins/Plus/1324/Gaudiniere/Photo/10.jpg'),
(24, 'Arboretum du Cimetière paysager', 47.2675, -1.58374, 5, '', 'https://jardins.nantes.fr/N/Jardin/Parcs-jardins/Plus/433/Cimetiere-Parc/photo/IMGP6021-js.jpg'),
(29, 'mmm', 1, 9, 9, 'mm', ''),
(30, 'e', 77, 0, 9, '', ''),
(31, 'TEST', 1, 2, 17, '', 'https://reseauactionclimat.org/wp-content/uploads/2020/02/paris-1-1200x700.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `espace_vert_image`
--

DROP TABLE IF EXISTS `espace_vert_image`;
CREATE TABLE IF NOT EXISTS `espace_vert_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) NOT NULL,
  `id_espace_vert` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_p_espacevert` (`id_espace_vert`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `espace_vert_image`
--

INSERT INTO `espace_vert_image` (`id`, `image_url`, `id_espace_vert`) VALUES
(2, 'https://slowlifetoulouse.com/wp-content/uploads/2021/04/Jardin-Japonais-Toulouse-Matin-1-1-870x1160.jpg', 1),
(3, 'https://slowlifetoulouse.com/wp-content/uploads/2021/04/Jardin-Japonais-Toulouse-Matin-2-1024x633.jpg', 1),
(4, 'https://slowlifetoulouse.com/wp-content/uploads/2021/04/Jardin-Japonais-Toulouse-Matin-5-1024x633.jpg', 1),
(5, 'https://cdt31.media.tourinsoft.eu/upload/Jardin-Royal-Toulouse.jpg\r\n', 2),
(6, 'https://media-cdn.tripadvisor.com/media/photo-s/0f/7b/df/02/jardin-royal.jpg', 2),
(7, 'https://cdt31.media.tourinsoft.eu/upload/Jardin-Royal-Toulouse-1.jpg', 2),
(8, 'https://www.toulouscope.fr/wp-content/uploads/2016/05/11060-jaridn-royal.jpg', 2),
(9, 'https://media-cdn.tripadvisor.com/media/photo-s/14/ff/bc/2e/nous-apprecions-le-calme.jpg', 3),
(10, 'https://media-cdn.tripadvisor.com/media/photo-s/14/ff/bc/ba/des-ponts-interessants.jpg', 3),
(11, 'https://media-cdn.tripadvisor.com/media/photo-s/14/ff/b8/62/au-depart-le-hemin-est.jpg', 3),
(12, 'https://media-cdn.tripadvisor.com/media/photo-s/0f/39/79/16/la-jonction-du-canal.jpg', 3),
(13, 'https://media-cdn.tripadvisor.com/media/photo-s/11/99/12/cc/une-tete.jpg', 7),
(14, 'https://p6.storage.canalblog.com/64/55/500367/43248072_p.jpg', 7),
(15, 'https://mutabilis-paysage.com/wp-content/uploads/2018/08/090604_ML_058_jardin-g%C3%A9ant.jpg', 7),
(16, 'https://s-pass.org/SPASSDATA/media/cache/portail_vignette_xl/SPASSDATA/attachments/2008_12/17/5f7f3553e9296-d68766.jpg', 7),
(17, 'https://www.lille.fr/var/www/storage/images/mediatheque/mairie-de-lille/visuels-annuaire/parc-jean-baptiste-lebas/68661-1-fre-FR/Parc-Jean-Baptiste-Lebas_news_image_top.jpg', 8),
(18, 'https://i.pinimg.com/originals/48/b1/fe/48b1fe2357f14d57902ea42e6ca7f8a7.jpg', 8),
(19, 'https://p8.storage.canalblog.com/83/90/419783/52775498.jpg', 8),
(20, 'https://upload.wikimedia.org/wikipedia/commons/d/d6/Parc_JB_Lebas_Lille.Photo_Ph.BRIZARD.jpg', 8),
(21, 'https://www.lemoniteur.fr/mediatheque/4/1/2/000450214_620x393_c.jpg', 9),
(22, 'https://media-cdn.tripadvisor.com/media/photo-s/07/e2/3d/a0/parc-henri-matisse.jpg', 9),
(23, 'https://www.lille.fr/var/www/storage/images/mediatheque/mairie-de-lille/visuels-annuaire/parc-matisse/68745-1-fre-FR/Parc-Matisse_news_image_top.jpg', 9),
(24, 'https://i.pinimg.com/originals/be/e1/03/bee1035155be3d84a16f3bbf2ee8c086.jpg', 9),
(25, 'https://www.grizette.com/wp-content/uploads/2012/03/JardindesPlantes%C2%A9Julien.jpg', 13),
(26, 'https://vuedusud.fr/wp-content/uploads/2019/08/jardin-des-plantes-montpellier.jpg', 4),
(27, 'https://upload.wikimedia.org/wikipedia/commons/3/31/Montpellier_jardin_plantes3.jpg', 4),
(28, 'https://www.leguidemontpellier.fr/wp-content/uploads/2020/09/119297415_s.jpg', 13),
(29, 'http://photos.tourisme-en-france.com/pois/54827_1_esplanade-charles-de-gaulle_esplanade-charles-de-gaulle.jpg', 14),
(30, 'http://pyrros.fr/wp-content/uploads/2014/09/IMG_5806-Visite-de-Montpellier.jpg', 14),
(31, 'https://wishurhere.files.wordpress.com/2011/07/esplanade-charles-de-gaulle-montpellier-1.jpg', 14),
(32, 'https://www.toutmontpellier.fr/wp-content/uploads/2017/10/esplanade-charles-de-gaulles.jpg', 14),
(33, 'https://www.leparisien.fr/resizer/L4R7h4CRUxYMxwb648BRSZPu2c4=/1200x675/arc-anglerfish-eu-central-1-prod-leparisien.s3.amazonaws.com/public/YAFGK5XBAWUTUFRV45TB525XWU.jpg', 15),
(34, 'https://www.fncaue.com/wp-content/uploads/2015/09/G562A.jpg', 15),
(35, 'https://live.staticflickr.com/1894/43731239864_e4a9daea8b_b.jpg', 15),
(36, 'http://lestetardsarboricoles.fr/wordpress/wp-content/uploads/Ginkgo-Square-Planchon-01-%C2%A9-%D2%AE%C4%A6nic%D0%9A.jpg', 15);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(90) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `nom`, `prenom`, `email`, `motDePasse`) VALUES
(4, 'aa', 'aa', 'aa', 'aa', '$2y$10$bsebCj3DUwk/AgsA0fss/uuui7om9925S88rstNGJZTCz3kYUSWZ6'),
(5, 'ff', 'test', 'test', 'fff@ff', '$2y$10$ykmoqCRFzR8/NU1g3yb/7.p2s1qLIV0qk0aF.9yEUwTqp80iXrQUy');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `lets` float NOT NULL,
  `ing` float NOT NULL,
  `depart` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `numVille` int(200) NOT NULL,
  `pollutionKey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `libelle`, `lets`, `ing`, `depart`, `image`, `numVille`, `pollutionKey`) VALUES
(2, 'Toulouse', 43.6043, 1.4437, '31', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/a9/23/f7/day-trip-to-albi-unesco.jpg?w=700&h=-1&s=1', 315550, 'wZuqr3Q99XCuRHNo8'),
(3, 'Colomiers', 43.6121, 1.32821, '31', 'https://cdn.radiofrance.fr/s3/cruiser-production/2020/08/9bb12c4b-d343-4d7c-81b5-f71fa7c5d038/870x489_mairie_de_colomiers.webp', 0, ''),
(4, 'Montpellier', 43.6112, 3.87673, '34', 'https://www.comparimmoneuf.fr/images/uploads/files/la-geographie-autour-de-montpellier.jpg', 341720, 'imGD38TCviQ5yfvhF'),
(5, 'Nantes', 47.2186, -1.55414, '44', 'https://images.prismic.io/figaroimmo/fd4573985aecff997fdf48a56b518bef7744e95c_shutterstock_596810450-compressor.jpg?auto=compress,format', 441090, 'FwhYP4kgFg9benRZb'),
(6, 'Lille', 50.6366, 3.06353, '59', 'https://static.actu.fr/uploads/2020/03/grand-place-lille-fontaine-854x640.jpeg', 593500, 'M9agjt4trNHbf3JKR'),
(9, 'Bordeaux', 34, 22, '34', 'https://upload.wikimedia.org/wikipedia/commons/d/d6/Place_de_la_Bourse%2C_Bordeaux%2C_France.jpg', 0, ''),
(17, 'paris', 14, 2, '34', 'https://reseauactionclimat.org/wp-content/uploads/2020/02/paris-1-1200x700.jpg', 0, '0');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `espace_vert`
--
ALTER TABLE `espace_vert`
  ADD CONSTRAINT `fk_ville_espace` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `espace_vert_image`
--
ALTER TABLE `espace_vert_image`
  ADD CONSTRAINT `fk_p_espacevert` FOREIGN KEY (`id_espace_vert`) REFERENCES `espace_vert` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
