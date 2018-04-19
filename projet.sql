-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 27 mars 2018 à 09:02
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_post_message` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` text NOT NULL,
  `region` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `membre_id`, `categorie`, `titre`, `date_post_message`, `contenu`, `region`, `ville`, `photo`) VALUES
(74, 24, 'Salé', 'E', '2018-03-19 11:34:32', 'Bohu lekri alepermi ti tuvevduv ijiwan ina neuzizu wawabol zape me no cozaomo mukib tiv oru li. Orlep zaljonkil ul anedazap sodev bonuba omigeg weule zud lohe hoz zisijmof voajza sir mi. Ojsu jukah amo irepe ji iri lukev ke nac di gaazhif bimupzok. Ogzavob sohegmu nib wiopre evmis hihhi hof diabuoj joujane ekehod pahita aca cevnasbo su mijhebe ilkadfa. Rigjil zoigipim pima kewcifnuv hupam dahuzde acefnu me biid ej huikba bef.', 'Alsace', 'Mta hwbynht eat', '74.jpg'),
(62, 24, 'Salé', 'dessert', '2018-03-05 11:33:23', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme gateau assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'Alsace', 'nimes', '62.png'),
(44, 50, 'Sucré', 'gateau', '2018-02-01 12:03:11', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit amet consequat libero, at mollis felis. Aliquam erat volutpat. Sed vel enim vestibulum, iaculis libero quis, viverra odio. Aliquam ornare ut café justo sed porta. Morbi id aliquam nibh. Mauris a massa eleifend nunc scelerisque auctor. Nam consequat, nulla gravida dignissim ornare, felis eros fermentum odio, vel viverra ex eros vel leo. Sed mattis pretium ornare. Suspendisse consequat mauris dolor.\r\n\r\nNulla eu tellus eu eros consectetur ornare. ', 'Picardie', 'sdfgj', '44.jpg'),
(65, 53, 'Boissons', 'cafe', '2018-02-20 12:31:26', 'essssaiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'Languedoc-Roussillon', 'nimes', '65.jpg'),
(75, 24, 'autre', 'Uanan', '2018-03-19 11:39:49', 'Lesata kidcewbul gis fa fa afe vinoj culi maahe matupus itjotda oweik ugagubhi puzopod afimo. Ibtu dek hegcozjo uwpapim kitgo edaohivu awiru banbo saku utsan fewe mu bewub goip ta. Goam zibobjen pehjawo pivos fetovibu selzukot ijeobdo fuup uwajli wun ucovi rivnu kapirpow tukil luw ra ibefa.', 'Poitou-Charentes', 'Rtloema', '75.jpg'),
(72, 24, 'Salé', 'Haricot', '2018-03-19 11:20:01', 'sflwkxcv:kwxn!f&lt;lwjc!wksldufhvlkwnx!flkhwxncvcxx\r\nxwfchjghkjvcxbcnvncvnvcncvncbcbvc', 'Languedoc-Roussillon', 'Lunel', '72.jpg'),
(73, 24, 'Salé', 'Cn', '2018-03-19 11:34:09', 'Li esahel muzodo wej lobzawamo jouhijub bijkeraz pocwac ha rogtaf waifu ep. Erfas catlo jivulealu bal se idmojen johehe winfozwun ij mimjekipu talo si sosegfow. Dedesola jadgegez fahsapfen avmefze ka ke ip te eznu owesop be ebivir muon las beal fedtobi. Re kolpagwab ovuni ijbueg obgalmu se caz kot busozef buhvodde apwekze fovulelu roefoep victiebo ufu le ugohes of. Getopgug lib napkiv row il notvaawu dehwog mubtoz jampa guwecsa gumli havcib.', 'Alsace', 'Nnnnaata', '73.jpg'),
(70, 24, 'Salé', 'Gateau', '2018-03-12 16:02:36', 'Viewu ehi me ducami ma bu licoz sij ro izuha zem efluj eba agwo gun rezo to. Uvataco habotvu huma odbe vebwo lippiiru fako fo mo je jav dig pi om ri juvikuz ve. Wulot pisaefa nuf vikurdam fimiba ibu anli ahvaf pu ciruv muh sozaw fadpu.', 'Picardie', 'rouen', '70.jpg'),
(71, 24, 'Salé', 'Lgyaar aaamg', '2018-03-19 10:32:22', 'Dennokad om ajren huvebebar dawo wuc damlo lu zidiz cid zug hibfa pevutce jowiuz. Fo gechi fa porijve ruc pallu netep guvwic lo dahe uleniom rer fol tojalhuc kuj. Co mutew masotob cabso igomebjak hek nil jovupo adaeh ivu livra juobahi nitezug zifmu ubocokoh so diopido doz. Ra bucwedis refkawhug gi henuje piiroac balwowaf vozetam ewwuz ruwimko coc meicu woiluzof uguhil iwifalpud. Kurpojte asozi bop veg dafror tabof doh epnijmut pa guje mojiduk zandem pedlo. Hirim zedi jipu dumwobwa lah batiow nopakdeh opiwbuw oda imacioj posa jucnozteb tip etaeh azhe in bobpapzac.', 'Alsace', 'O\'', ''),
(76, 24, 'Boissons', 'Aenvga', '2018-03-21 11:47:33', 'Bow ijuupbik hiwicic cogkev honanhoz kubdocun nofaw puga ve uwakat wubi dajaw ruho. Zirrepac roma kitbo ofufatmuv bawtepnun ci gonuso ew pigfaib vu tim hewhoji hep. Wumtiwik ado posadlu nir vuzowune ni zu lesdumul wi iliub vavvenvo ratvakce je ji ag tueza.', 'Alsace', 'Amaru', ''),
(77, 24, 'Produits sucrés', 'Iaaur', '2018-03-21 11:49:21', 'Fa ajez mab wirohe homsep zijkak cew dectudnej mis ralehewe cife kegkok leik zisnibvi futduv tew. Gajbe ici sojica mut ubbogo guji jetfu ov boc tuuke ewli ohwimov ne reisweh sofu di zaho ponhuj. Ha relve mo peitofi biral owhoges pipudbe badotu lip wek abcomus uvoim heb nuvduzu kaef. Ecbafhun za povbazel jogku aj rewojfo duvod vapon nejo ca vo tibzub boje vaf lugis lip guhaawe. Idte ce jihhasviw vohvu ekzuru pelgima it owi labisa did wortana kebapig.', 'Alsace', 'Gata', ''),
(79, 24, 'Boissons', 'essaiii ', '2018-03-26 16:31:00', 'Cukli sinwev ubegohak mor cegmekze jal adakumnug kak vephave icidutvad upgu deugucik bemlew nenodsa aru. Tumohjuc nolapba sigco hakkez zetsivu mehozore wumsuewu pacuz heme rurug ewfo purwivow rev ve duku ub icopupo il. Raugkum ru pohloped ofeut vede nobi vumwugij uvipedur tonog ovmi ig tujimo ifdus ritduk veme of huefu muwabim. Zov ehi dubar emazombug gos zoleg waj wipnuc rosos emzinu bef ja wigikre deloza oku.', 'Occitanie', 'nimes', '');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `value`) VALUES
(1, 'Produits salés'),
(2, 'Produits sucrés'),
(3, 'Boissons'),
(4, 'Produits frais'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reponse` mediumtext NOT NULL,
  `id_annonces` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `user_name`, `email`, `reponse`, `id_annonces`) VALUES
(1, 'yoann', 'yoann@gmail.com', 'essai post reponse a une annoce ', 0),
(2, 'yoann', 'yoann@gmail.com', 'sdfghjkghfdsqsdf', 0),
(3, 'yoann', 'yoann@gmail.com', 'bonjour', 61),
(4, 'yoann', 'yoann@gmail.com', 'essai 2 clef etrangére', 68),
(5, 'noha', 'noha@gmail.com', 'essai post contact', 70),
(6, 'noha', 'noha@gmail.com', '2eme essai post contact', 70),
(7, 'yoann', 'yoann@gmail.com', 'bonjour\r\n', 70),
(8, 'yoann', 'yoann@gmail.com', 'bonjour 2', 70),
(9, 'yoann', 'yoann@gmail.com', 'bonjor 3', 62),
(10, 'yoann', 'yoann@gmail.com', 'bonjour 4', 65),
(11, 'noha', 'noha@gmail.com', 'essai post message', 79),
(12, 'noha', 'noha@gmail.com', 'essai post 2', 79),
(13, 'yoann', 'yoann@gmail.com', 'essai post 3', 79),
(14, 'yoann', 'yoann@gmail.com', 'essai post 4', 77);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `confirme` int(5) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '2',
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `user_name`, `confirme`, `role`, `pass`, `email`, `avatar`) VALUES
(24, 'yoann', 1, 1, '$2y$10$p08GRtxHg5aEIOPbf32yQuKq3OAjyqKVRH8oT2a28HS3uAIGxq0OO', 'yoann@gmail.com', '24.jpg'),
(50, 'noha', 1, 2, '$2y$10$5USs2LlpyBWgdM3Lq13Hp.dKUHP2hOjfVdtbixxhELAgh0OKpK3Yu', 'noha@gmail.com', 'default.png'),
(52, 'steph', 0, 2, '$2y$10$SGavSDYbBNWgP3f8wTXQP.CXsOhzSHheefg7F4OEckiid9fwyAh1W', 'steph@gmail.com', 'default.png'),
(53, 'amelie', 0, 2, '$2y$10$i6RxUocUVGVLkM28g1Tt5OqcEl5YsxEcV6h1uMq7XFCmizfa4VuPO', 'amelie@gmail.com', 'default.png'),
(54, 'matteo', 0, 2, '$2y$10$7er8BuCu5D7y39hts3.Nk.6MUXnqJUdMVLvH22GU0enaWDV9teTT2', 'matteo@gmail.com', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `value`) VALUES
(1, 'Hauts-de-France'),
(2, 'Grand Est'),
(3, 'Île-de-France'),
(4, 'Normandie'),
(5, 'Bretagne'),
(6, 'Pays de la Loire'),
(7, 'Centre-Val de Loire'),
(8, 'Bourgogne-Franche-Comté'),
(9, 'Auvergne-Rhône-Alpes'),
(10, 'Nouvelle-Aquitaine'),
(11, 'Occitanie'),
(12, 'Provence-Alpes-Côte d\'Azur'),
(13, 'Corse'),
(14, 'Region d\'Outre-mer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces` ADD FULLTEXT KEY `search` (`categorie`,`titre`,`contenu`,`region`,`ville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
