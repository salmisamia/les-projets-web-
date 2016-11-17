-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Host: mysql.racinauto.com
-- Generation Time: Jun 17, 2014 at 04:53 PM
-- Server version: 5.5.35-log
-- PHP Version: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `racinautocom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `details_vehicule`
--

CREATE TABLE IF NOT EXISTS `details_vehicule` (
  `id_veh` int(11) NOT NULL,
  `presentation_text_1` text COLLATE utf8_unicode_ci NOT NULL,
  `presentation_text_2` text COLLATE utf8_unicode_ci NOT NULL,
  `desc_text_1` text COLLATE utf8_unicode_ci NOT NULL,
  KEY `id_veh` (`id_veh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `details_vehicule`
--

INSERT INTO `details_vehicule` (`id_veh`, `presentation_text_1`, `presentation_text_2`, `desc_text_1`) VALUES
(1, 'Du nouveau ! Encore plus de caractère, encore plus attractive, avec son regard expressif et attachant et son caractère dynamique et enjoué…! Vous allez craquer pour Nouvelle Twingo ! Twingo se pare d’un nouveau design, de nouvelles couleurs survitaminées et d’une large offre de personnalisations…', 'Twingo est une voiture qui s''adapte à votre personnalité avec ses différentes facettes, tantôt féminine, tantôt sportive. Avec Nouvelle Twingo, roulez à l’optimisme !', 'Pour un quotidien qui petille !'),
(18, 'Imaginez-vous au volant de la Symbol… Vos sens en éveil, vous parcourez la route au grès de vos envie', 'Le plaisir de conduire n’a plus de limite. ', 'invitation au changement'),
(21, 'Nouvelle Renault Clio, inspirée par Dezir.\r\nNée du concept-car DeZir présenté en octobre 2010 au Mondial de l’automobile, Nouvelle Renault Clio en restitue le style et l’émotion. Telle une musculature, ses courbes expriment le dynamisme qui émane du concept-car.', 'Pensée comme une sculpture, Nouvelle Renault Clio est un objet de désir doté d’une sensualité quasi humaine. Aucun angle saillant et agressif, juste des galbes qui donnent envie de s’approcher et de la caresser. Des courbes sensuelles, une face avant expressive et des épaules arrière aux lignes sportives.\r\n<br/><br/>\r\n* Jantes 17 pouces et lécheurs de vitres chromés disponibles ultérieurement', '+ qu''une voiture, une reference'),
(19, 'Fruit d''un travail mené en soufflerie avec les experts du Renault F1 Team, le design de Clio Renault Luxe R.S. lui confère une personnalité propre, à la fois puissante et subtile.', 'Le SCx diminue de 0,2 pour atteindre 0,75.', '+ QU''UNE VOITURE, UNE RÉFÉRENCE'),
(20, 'Avec sa nouvelle face avant et ses masques de phares chromés, Nouvelle Clio Campus se fait encore plus moderne. Ses lignes fluides, généreusement arrondies, lui confèrent un look tonique vraiment attachant.', 'Grâce à ses proportions compactes, parkings ou ruelles ne lui font jamais peur ! La ville est son élément. Maniable et fonctionnelle, Nouvelle Clio Campus vous facilite la vie.', '+ QU''UNE VOITURE, UNE RÉFÉRENCE'),
(22, 'Le style extérieur, puissamment évocateur de Mégane R.S., est l’expression de son haut niveau de performance et de technologie. Sa face avant impressionne, avec ses ailes élargies, son bouclier avant équipé d’une lame aérodynamique inspirée de la F1 et ses feux à technologie LED.', 'Vue de l’arrière, Mégane R.S. semble prête à bondir avec ses épaules musclées, son diffuseur et sa sortie d’échappement chromée. Expressives, les jantes aluminium 18" (ou 19'''' selon versions options) jouent pleinement la carte du sport chic. L’allure Renault Sport.', '250 CH DE PUR PLAISIR'),
(23, 'Nouvelle Renault Mégane Coupé-Cabriolet apparaît. Elle séduit au premier regard. Le chic se réinvente dans les moindres détails : ceinture d’habitacle et montants de pare-brise au cerclage chromé, toit et rétroviseurs noir brillant... ', 'Tout oublier. S’évader. Se libérer des contraintes. Protégé par la vitre coupe-vent, respirer les embruns, s’enivrer d’oxygène… Nouvelle Mégane Coupé-Cabriolet file, toit ouvert, le long de l’océan. Et la liberté prend alors une nouvelle dimension.', 'PARFOIS UN COUPÉ, TOUJOURS UN CABRIOLET'),
(24, 'Un vrai coupé se doit d''avoir une forte personnalité. Avec sa face avant à finition chrome satiné et sa grande entrée d''air, Mégane Coupé affiche un style résolument sportif.', 'Elle intègre des feux de haute technicité, placés de manière originale, comme en suspension. Ce design puissant provoque une sensation de sportivité.', 'IL EST TEMPS DE CHANGER'),
(25, 'Nouvelle Renault Mégane Berline, un design coup de cœur, véritable promesse de dynamisme et de robustesse. Feux avant profilés, lignes fluides et propulsives, équilibre des proportions…elle ne cache rien de ses exceptionnelles qualités routières.', 'Elle surprend par la justesse de ses lignes et par son extrême qualité de finition.', 'LA PASSION REJOINT LA RAISON'),
(26, 'Beaucoup plus lumineux, plus souriants, plus heureux…\r\nKangoo Evolution Génération 2011 affiche un caractère vraiment unique, un look décomplexé, un esprit d''ouverture, un certain sens de l''accueil et du détail grâce aux finition soignées de son nouveau tableau de bord. En fait, Kangoo est comme vous : trop sympa.', '', 'PLUS PRATIQUE, PLUS CONFORTABLE'),
(27, 'Scénic, déclinaisons du confort, il invente sa vie à bord. Le parfait équilibre entre compacité, habitabilité et confort.', '', 'ACCUEILLANT, INTELLIGENT, RÉACTIF'),
(28, 'D’une simple ligne, les designers de Renault ont fait une ligne d’évidence. Libre interprétation des lois de l’aérodynamique,', 'le style extérieur de Renault Fluence sait associer pureté et équilibre, dynamisme et fluidité. ', 'VOYAGEZ SURCLASSÉ'),
(29, 'A travers son design distinctif, Nouveau Koleos affiche une double personnalité: élégance et robustesse à la fois. La nouvelle calandre avec ses phares redessinés souligne l''esprit moderne et le caractère bien trempé du crossover.', 'Des répétiteurs de clignotants à technologie LED sur les rétroviseurs et de nouvelles jantes, tout aussi chics que dynamiques, viennent parfaire l''expressivité du véhicule. Un design qui se démarque pour une allure raffinée. ', 'TOUT RENAULT DANS UN 4X4'),
(30, 'Le mot vient instinctivement à l’esprit face à Laguna Coupé. Avec son design fluide et élégant, à la mesure de son haut niveau de performance et d’équipement,', 'elle s’inscrit dans la pure tradition des coupés d’exception.', 'UN COUPÉ D''EXCEPTION'),
(31, 'A bord de Renault Latitude, vous voyagez en classe affaires. Véritable berline haut de gamme, Latitude impose son allure et sa prestance, à l''extérieur comme à l''intérieur. Sa face avant racée, sa ligne fluide et élégante et ses larges épaules expriment toute la puissance de ses moteurs.', 'Ses feux arrière à LED sont un premier indice de la haute technologique offerte au conducteur et aux passagers, dans le vaste espace qui leur est réservé. Plus qu''un simple habitacle, «salon affaires» qui les attend. Un espace dans lequel les matières nobles rencontrent l''innovation, pour un confort d''exception. c''est un véritable. ', 'GRANDE A L''EXTERIEUR IMMENSE A L''INTERIEUR'),
(32, 'Trafic Passenger et Génération ou l’invitation au voyage…Faciles à vivre avec un habitacle dédié au bien-être. Sûrs, ils intègrent les technologies qui ont fait de Renault un leader.', 'Grands routiers, ils concilient respect de l’environnement, fiabilité et agrément, grâce aux motorisations dCi de dernière génération, toutes dotées de boîtes 6 vitesses.', 'L''IRRÉSISTIBLE INVITATION AU VOYAGE'),
(33, 'Un utilitaire vraiment particulier, plus pratique et plus confortable… Fourgonnette polyvalente nouvelle génération, Kangoo Express offre un confort unique.', 'Il s''adapte aux besoins de tous les professionnels, offrant à la fois bureau mobile et solution de transport sur mesure.', 'PRATIQUE, CONFORTABLE, ECONOMIQUE'),
(34, 'Visiblement robuste et dynamique, la face avant de Nouveau Master exprime son efficacité. Ses grands phares expressifs et sa nouvelle calandre soulignent', 'son caractère tandis que son large bouclier protège la carrosserie de manière optimale tout en créant un impact visuel d’une grande modernité.', 'NOUVEAU MASTER, UN MODÈLE POUR VOUS, QUELS QUE SOIENT VOS BESOINS'),
(35, 'Trafic Double Cabine est la solution de transport mixte, alliance du Monospace et du Fourgon, déclinée en une large gamme de 2 longueurs,', '2 charges utiles et 2 niveaux d’équipements et dotée d’équipements spécifiques.', 'NOUVEAU TRAFIC S''ADAPTE À TOUS VOS BESOINS'),
(36, 'A bord de Logan, les passagers sont à l''honneur et voyagent dans les meilleures conditions de confort. Ses dimensions vous permettent de tout emporter pour vos voyages en famille ou entre amis.', 'Au quotidien, en ville comme sur les longs trajets, avec Logan tout est réuni pour faire de beaux voyages. Position de conduite idéale, les commandes sont facilement accessibles et l’espace interne a une organisation optimale.', 'L’ESPACE EST UN PLAISIR'),
(37, 'Logan MCV fait preuve d’une grande générosité intérieure. Et parce que les conducteurs et leurs familles ont tous des attentes différentes, elle offre un choix large d''équipement', 'En terme de sécurité passive, Logan MCV peut compter jusqu''à quatre airbags. Deux airbags frontaux en série ainsi que deux airbags latéraux en option (selon les versions).', '5 OU 7 PLACES, ELLE S''ADAPTE À TOUTES VOS ENVIES'),
(38, 'La nouvelle identité stylistique Dacia évoque un sentiment général de qualité et de force\r\n<br/>\r\nLa face avant homogène est travaillée autour du logo Dacia, bien installé dans la calandre. Le dessin des larges projecteurs ainsi que la grille de calandre rendent la face avant plus expressive et plus identitaire', 'Le design intérieur gagne en attractivité. Nouvelle Dacia Sandero inaugure une nouvelle planche de bord carbone foncé ou bi-ton (selon versions) à l’instrumentation complète et au traité moderne avec des contours de cadrans chromés (selon versions) et des commandes dont l''ergonomie a été complètement repensée', 'LA NOUVELLE BERLINE AVEC 5 VRAIES GRANDES PLACES À PRIX FUTÉ'),
(39, 'La nouvelle identité stylistique Dacia évoque un sentiment général de qualité et de force\r\n<br/>\r\nLa face avant homogène est travaillée autour du logo Dacia, bien installé dans la calandre. Le dessin des larges projecteurs ainsi que la grille de calandre rendent la face avant plus expressive et plus identitaire', 'Le design intérieur gagne en attractivité. Nouvelle Dacia Sandero inaugure une nouvelle planche de bord carbone foncé ou bi-ton (selon versions) à l’instrumentation complète et au traité moderne avec des contours de cadrans chromés (selon versions) et des commandes dont l''ergonomie a été complètement repensée', 'LA NOUVELLE BERLINE AVEC 5 VRAIES GRANDES PLACES À PRIX FUTÉ'),
(38, 'Son design musclé est celui d’un authentique aventurier, robuste et protecteur. Dacia Duster fait aussi l’unanimité en ville avec son style élégant, sa calandre chromée et ses feux avant à doubles optiques.', 'Dacia Duster possède un intérieur vaste et confortable, et parce que les conducteurs et leurs familles ont tous des attentes différentes, il offre un choix large d''équipement.', 'SCANDALEUSEMENT ACCESSIBLE');

-- --------------------------------------------------------

--
-- Table structure for table `gamme`
--

CREATE TABLE IF NOT EXISTS `gamme` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gamme_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gamme_name_slug` text COLLATE utf8_unicode_ci NOT NULL,
  `gamme_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gamme`
--

INSERT INTO `gamme` (`ID`, `gamme_name`, `gamme_name_slug`, `gamme_code`) VALUES
(1, 'Véhicules Particuliers', 'vehicules-particuliers', 'vhcl-part'),
(2, 'Véhicules Utilitaires', 'vehicules-utilitaires', 'vhcl-util'),
(3, 'Véhicules Dacia', 'vehicules-dacia', 'vhcl-dacia');

-- --------------------------------------------------------

--
-- Table structure for table `img_vehicule`
--

CREATE TABLE IF NOT EXISTS `img_vehicule` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `vehicule_id` int(11) NOT NULL,
  `img_name` text COLLATE utf8_unicode_ci NOT NULL,
  `img_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `img_width` int(3) NOT NULL,
  `img_height` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `vehicule_id` (`vehicule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `img_vehicule`
--

INSERT INTO `img_vehicule` (`ID`, `vehicule_id`, `img_name`, `img_type`, `img_width`, `img_height`) VALUES
(1, 1, 'rangepage-off', 'rangepage', 160, 80);

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

CREATE TABLE IF NOT EXISTS `modele` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `modele_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modele_name_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modele_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gamme_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `gamme_id` (`gamme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `modele`
--

INSERT INTO `modele` (`ID`, `modele_name`, `modele_name_slug`, `modele_code`, `gamme_id`) VALUES
(1, 'twingo', 'twingo', 'tw', 1),
(2, 'symbol', 'symbol', 'ct', 1),
(3, 'clio', 'clio', 'cl', 1),
(4, 'mégane', 'megane', 'm3', 1),
(5, 'kangoo', 'kangoo', 'kp', 1),
(6, 'scenic', 'scenic', 's3', 1),
(7, 'fluence', 'fluence', 'flu', 1),
(8, 'kolés', '', 'kol', 1),
(9, 'laguna', 'laguna', 'lc', 1),
(10, 'latitude', '', 'l4', 1),
(11, 'trafic', 'trafic', 'tf', 1),
(12, 'kangoo express', 'kangoo-express', 'ku', 2),
(13, 'master', 'master', 'ma', 2),
(14, 'nouveau trafic', 'nouveau-trafic', 'ntf', 2),
(15, 'logan', 'logan', 'lg', 3),
(16, 'logan mcv', 'logan-mcv', 'lgm', 3),
(17, 'sandero', 'sandero', 'san', 3),
(18, 'duster', 'duster', 'dst', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `tags` varchar(128) NOT NULL,
  `archived` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `url`, `body`, `tags`, `archived`) VALUES
(1, 'Racinauto Fête ses 5 ans', 'racinauto-fete-ses-5-ans', '<strong>Racinauto</strong> fête son 5ème anniversaire et remercie tous ses clients pour leur fidelité.  <br/><br/>\r\n<iframe width="420" height="315" src="http://www.youtube.com/embed/Na2SYmbSbxI?rel=0" frameborder="0" allowfullscreen></iframe>', 'anniversaire', 0),
(2, 'Nouveau site web', 'nouveau-site-web', '<strong>Racinauto</strong> Lance son nouveau site web. Une refonte complète a été réalisée sur ce dernier pour respecter la nouvelle charte graphique de Renault.<br/><br/>', 'site', 1),
(3, 'Renault lance un projet industriel en Algérie', 'renault-lance-un-projet-industriel-en-algerie', '<strong>Renault, la Société Nationale de Véhicules Industriels (SNVI) et le Fonds National d’Investissement (FNI) ont signé le 19 décembre 2012 à Alger, un  pacte d’actionnaires en vue de la création, en partenariat, d’une coentreprise (51% partie algérienne et 49% Renault) afin de développer une filière automobile en Algérie pour soutenir le développement du marché.</strong><br/><br/>\r\n<img src="http://racinauto.com/img/news/renault-projet-algerie.jpg" /><br/>\r\nLa SNVI et le FNI se partagent les 51% respectivement à raison de 34% et 17%.<br/><br/>\r\n\r\nL’accord prévoit l’implantation d’une usine à Oued Tlelat, au sud-ouest d’Oran, pour la production de Véhicules Particuliers et Utilitaires du Groupe Renault à destination principalement du marché local.<br/><br/>\r\n\r\nOued Tlelat a été choisi en raison de ses atouts pour le projet industriel : son réseau routier, sa main d’œuvre qualifiée, sa proximité du port d’Oran, son infrastructure et la qualité du terrain. <br/><br/>\r\n\r\nLe volume annuel de production de l’usine commencera à 25 000 véhicules/an (7 véhicules/heure) pour être augmenté dans une deuxième phase à 75 000 véhicules/an (15 véhicules/heure). Le véhicule produit dans un premier temps sera Nouvelle Symbol.<br/><br/>\r\n\r\nL’intégration locale des véhicules évoluera également de manière progressive pour développer la filière automobile en Algérie.<br/><br/>\r\n\r\nCette intégration sera atteinte grâce aux investissements qui seront réalisés à l’intérieur de l’usine (tôlerie, emboutissage et peinture) mais aussi à l’extérieur de l’usine à travers notamment la mise en place d’un tissu de sous-traitance local fort du concours et de l’expertise de Renault.<br/><br/>\r\n\r\nCe processus, déjà entamé avec les experts de Renault au niveau des sous-traitants potentiels locaux, se poursuivra encore sur plusieurs années.<br/><br/>\r\n\r\nLa formation qui constitue une clé de succès de ce projet sera menée avec le savoir-faire et la  technologie de Renault.<br/><br/>', '', 0),
(4, 'La fiabilité des véhicules Renault distinguée par l’Automobile Magazine', 'La-fiabilit-des-vhicules-Renault-distingue-par-lAutomobile-Magazine', '<br/>\nDans son numéro de février, L’Automobile Magazine publie le TOP 100 de la Fiabilité parmi plus de 100 modèles de 25 marques.\n<br/><br/>\n\nRenault place 7 de ses modèles dans le TOP 3 Fiabilité de leurs catégories respectives, les autres modèles entrant systématiquement au moins dans le TOP 10.\n<br/><br/>\nCes excellents résultats sont les fruits du travail mené ces dernières années par Renault pour retrouver une qualité intrinsèque des véhicules au meilleur niveau, tant en robustesse qu’en fiabilité.\n<br/><br/>\n\nAu-delà de la performance qualité d’un modèle en particulier, c’est l’homogénéité et le redressement durable en matière de qualité et de fiabilité de l’ensemble des modèles Renault qui sont salués par le classement de L’Automobile Magazine.<br/><br/>\n<img src="http://racinauto.com/img/news/crash-test.jpg" />', '', 0),
(5, 'La Quinzaine de la Clio chez RACINAUTO', 'La-Quinzaine-de-la-Clio-chez-RACINAUTO', '<br/>\nDu 24 Février au 10 Mars 2013, exclusivement chez RACINAUTO, Nouvelle Clio et Clio Campus sont disponibles et livrables sous 48H. <br/> Rendez-vous dans un de nos showroom pour en profiter.<br/><br/>\n<img src="http://racinauto.com/img/news/quinzaine-clio.jpg">', '', 0),
(6, 'REMISE -15 % SUR TOUS VOS TRAVAUX DE CARROSSERIE', 'REMISE-15-SUR-TOUS-VOS-TRAVAUX-DE-CARROSSERIE', '<h3>\n<br />Jusqu''au 27 février, Racinauto applique une remise de 15% sur tous vos travaux Tôlerie et peinture, peintures d''origine, cabine de peinture, pare-brise, miroiterie - tirage et restructuration sur marbre.<br /><br />\n\nPour de plus amples infos, appelez-nous au <h1>0770 330 390</h1><br />\n\nN''hésitez pas à nous contacter.\n</h3>', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `page_name_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `page_menu_display` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(2) NOT NULL,
  `page_sub_title` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ID`, `page_name`, `page_name_slug`, `page_menu_display`, `display_order`, `page_sub_title`) VALUES
(1, 'aprés vente', 'apres-vente', 'main', 5, ''),
(2, 'racinauto entreprise', 'racinauto-entreprise', 'main', 6, ''),
(3, 'découvrez racinauto', 'decouvrez-racinauto', 'main', 7, ''),
(4, 'promotions', 'promotions', 'main', 4, ''),
(5, 'Contact', 'contact', 'top', 4, 'Contacter Racinauto'),
(6, 'Recrutement', 'recrutement', 'top', 2, 'Postulez pour un poste chez nous'),
(7, 'Véhicules particuliers', 'vehicules-particuliers', 'main', 1, ''),
(8, 'Véhicules utilitaires', 'vehicules-utilitaires', 'main', 2, ''),
(9, 'Véhicules dacia', 'vehicules-dacia', 'main', 3, ''),
(10, 'Médiathèque', 'mediatheque', 'top', 1, ''),
(11, 'Newsletter', 'newsletter', 'top', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_page`
--

CREATE TABLE IF NOT EXISTS `sub_page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `sub_page_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sub_page_name_slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `sub_page`
--

INSERT INTO `sub_page` (`ID`, `page_id`, `sub_page_name`, `sub_page_name_slug`) VALUES
(12, 1, 'Révision et entretien', 'revision-entretien'),
(16, 1, 'Carrosserie', 'carrosserie'),
(17, 2, 'Racinauto pro+', 'racinauto-pro-plus'),
(18, 2, 'Les engagements pro+', 'engagements-pro-plus'),
(19, 2, 'Vente véhicules neufs', 'vente-vehicules-neufs'),
(20, 2, 'Financement', 'financement'),
(22, 3, 'A la une', 'a-la-une'),
(23, 3, 'Présentation', 'presentation'),
(24, 3, 'Réseau', 'reseau'),
(25, 5, 'Demande d''information', 'demande-information'),
(26, 5, 'Réclamation', 'reclamation'),
(27, 4, 'promotions', 'promotions'),
(28, 7, 'twingo', 'twingo'),
(29, 7, 'symbol', 'symbol'),
(31, 7, 'clio', 'clio'),
(32, 7, 'clio', 'clio'),
(33, 7, 'clio', 'clio'),
(34, 7, 'mégane', 'megane'),
(35, 7, 'mégane', 'megane'),
(36, 7, 'mégane', 'megane'),
(37, 7, 'mégane', 'megane'),
(38, 7, 'kangoo', 'kangoo'),
(39, 7, 'scenic', 'scenic'),
(40, 7, 'fluence', 'fluence'),
(41, 7, 'koléos', 'koleos'),
(42, 7, 'laguna', 'laguna'),
(43, 7, 'latitude', 'latitude'),
(44, 7, 'nouveau trafic passenger', 'nouveau-trafic-passenger'),
(45, 8, 'kangoo express', 'kangoo-express'),
(46, 8, 'master', 'master'),
(47, 8, 'nouveau trafic', 'nouveau-trafic'),
(48, 9, 'logan', 'logan'),
(49, 9, 'logan mcv', 'logan-mcv'),
(50, 9, 'duster', 'duster'),
(51, 9, 'sandero', 'sandero'),
(52, 6, 'Postuler', 'postuler');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_page`
--

CREATE TABLE IF NOT EXISTS `sub_sub_page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sub_page_id` int(11) NOT NULL,
  `sub_sub_page_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sub_sub_page_name_slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `sub_page_id` (`sub_page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `sub_sub_page`
--

INSERT INTO `sub_sub_page` (`ID`, `sub_page_id`, `sub_sub_page_name`, `sub_sub_page_name_slug`, `video_url`) VALUES
(2, 28, 'nouvelle twingo', 'nouvelle-twingo', ''),
(3, 29, 'symbol', 'symbol', ''),
(4, 31, 'clio rs', 'clio-rs', ''),
(5, 32, 'clio campus', 'clio-campus', ''),
(6, 33, 'nouvelle clio', 'nouvelle-clio', ''),
(7, 34, 'mégane rs', 'megane-rs', ''),
(8, 35, 'mégane coupé cabriolet', 'megane-coupe-cabriolet', ''),
(9, 36, 'mégane coupé', 'megane-coupe', ''),
(10, 37, 'mégane berline', 'megane-berline', ''),
(11, 38, 'kangoo', 'kangoo', ''),
(12, 39, 'scenic', 'scenic', ''),
(13, 40, 'fluence', 'fluence', ''),
(14, 41, 'koléos', 'koleos', ''),
(15, 42, 'laguna coupé', 'laguna-coupe', ''),
(16, 43, 'latitude', 'latitude', ''),
(17, 44, 'nouveau trafic passenger', 'nouveau-trafic-passenger', ''),
(18, 45, 'kangoo express', 'kangoo-express', ''),
(19, 46, 'nouveau master', 'nouveau-master', ''),
(20, 47, 'nouveau trafic', 'nouveau-trafic', ''),
(21, 48, 'logan', 'logan', ''),
(22, 49, 'logan mcv', 'logan-mcv', ''),
(23, 50, 'duster', 'duster', ''),
(24, 51, 'sandero', 'sandero', ''),
(25, 12, 'Revision', 'revision', 'http://m1.dz.f6m.fr//central/media/---nouvelle-iv/sav/AXS/22_revision/att00408559/Larevision.flv'),
(27, 16, 'Pare-brise', 'pare-brise', 'http://m1.fr.f6m.fr/apres-vente/revision-entretien/revision/carrosserie/pare-brise/entretien-pare-brise/att00430177/le_pare_brise_fr.flv'),
(28, 16, 'Reparer ma carrosserie', 'reparer-ma-carrosserie', 'http://m1.fr.f6m.fr/apres-vente/revision-entretien/revision/carrosserie/reparer-entretenir-ma-carrosserie/att00478765/la_protection_carrosserie_fr.flv');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'racinadmin', 'acbc5886f4a21b39de14fd21d5b5dc2a');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `vehicule_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `vehicule_name_slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vehicule_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vehicule_base_color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `v_color_code` text COLLATE utf8_unicode_ci NOT NULL,
  `gamme_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gamme_name_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modele_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modele_name_slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vehicule_pr_base` int(11) NOT NULL,
  `vehicule_taxe` int(11) NOT NULL DEFAULT '70000',
  `vehicule_promo` int(11) NOT NULL DEFAULT '0',
  `vehicule_pr_total` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`ID`, `vehicule_name`, `vehicule_name_slug`, `vehicule_code`, `vehicule_base_color`, `v_color_code`, `gamme_name`, `gamme_name_slug`, `modele_name`, `modele_name_slug`, `vehicule_pr_base`, `vehicule_taxe`, `vehicule_promo`, `vehicule_pr_total`) VALUES
(1, 'nouvelle twingo', 'nouvelle-twingo', 'tw2', '#B71234', 'c_44', 'Véhicules Particuliers', 'vehicules-particuliers', 'twingo', 'twingo', 926000, 70000, 65000, 931000),
(18, 'symbol', 'symbol', 'ct5', '#8D3C1E', 'c_L35', 'Véhicules Particuliers', 'vehicules-particuliers', 'symbol', 'symbol', 1010000, 70000, 140000, 940000),
(19, 'clio rs', 'clio-rs', 'cl3_ph2_rs', '#414141', 'c_SPORT', 'Véhicules Particuliers', 'vehicules-particuliers', 'clio', 'clio', 1530000, 70000, 0, 1600000),
(20, 'clio campus', 'clio-campus', 'cl24', '#006983', 'c_B65', 'Véhicules Particuliers', 'vehicules-particuliers', 'clio', 'clio', 1214000, 70000, 50000, 1234000),
(21, 'nouvelle clio', 'nouvelle-clio', 'cl4', '#D52B1E', 'c_X98', 'Véhicules Particuliers', 'vehicules-particuliers', 'clio', 'clio', 1300000, 70000, 0, 1370000),
(22, 'mégane rs', 'megane-rs', 'm3d_rs', '#414141', 'c_SPORT', 'Véhicules Particuliers', 'vehicules-particuliers', 'mégane', 'megane', 2868000, 70000, 0, 2938000),
(23, 'mégane coupé cabriolet', 'megane-coupe-cabriolet', 'm3e', '#644459', 'c_E95', 'Véhicules Particuliers', 'vehicules-particuliers', 'mégane', 'megane', 2614000, 70000, 0, 2684000),
(24, 'mégane coupé', 'megane-coupe', 'm3d', '#983222', 'c_D95', 'Véhicules Particuliers', 'vehicules-particuliers', 'mégane', 'megane', 2868000, 70000, 0, 2938000),
(25, 'mégane berline', 'megane-berline', 'm3b', '#21578A', 'c_B95', 'Véhicules Particuliers', 'vehicules-particuliers', 'mégane', 'megane', 2114000, 70000, 0, 2184000),
(26, 'kangoo', 'kangoo', 'kp2', '#009B76', 'c_K76VP', 'Véhicules Particuliers', 'vehicules-particuliers', 'kangoo', 'kangoo', 1493000, 70000, 0, 1563000),
(27, 'scenic', 'scenic', 's3c', '#981E32', 'c_JR95', 'Véhicules Particuliers', 'vehicules-particuliers', 'scenic', 'scenic', 2112000, 70000, 0, 2182000),
(28, 'fluence', 'fluence', 'flu', '#836344', 'c_L38', 'Véhicules Particuliers', 'vehicules-particuliers', 'fluence', 'fluence', 1784000, 70000, 0, 1854000),
(29, 'koléos', 'koleos', 'kol2', '#51626F', 'c_H45', 'Véhicules Particuliers', 'vehicules-particuliers', 'koléos', 'koleos', 2753000, 70000, 0, 2823000),
(30, 'laguna coupé', 'laguna-coupe', 'lc3', '#003C69', 'c_D91', 'Véhicules Particuliers', 'vehicules-particuliers', 'laguna', 'laguna', 3040000, 70000, 0, 3110000),
(31, 'latitude', 'latitude', 'l43', '#5E172D', 'c_L431', 'Véhicules Particuliers', 'vehicules-particuliers', 'latitude', 'latitude', 2135000, 70000, 0, 2205000),
(32, 'nouveau trafic passenger', 'nouveau-trafic-passenger', 'tfp', '#00505C', 'c_X83', 'Véhicules Particuliers', 'vehicules-particuliers', 'trafic', 'nouveau-trafic-passenger', 1916000, 70000, 0, 1986000),
(33, 'kangoo express', 'kangoo-express', 'ku2', '#8E908F', 'c_VU', 'Véhicules Utilitaires', 'vehicules-utilitaires', 'kangoo express', 'kangoo-express', 1121000, 70000, 0, 1191000),
(34, 'nouveau master', 'nouveau-master', 'mau', '#8E908F', 'c_VU', 'Véhicules Utilitaires', 'vehicules-utilitaires', 'master', 'master', 1980000, 70000, 0, 2050000),
(35, 'nouveau trafic', 'nouveau-trafic', 'tfu', '#8E908F', 'c_VU', 'Véhicules Utilitaires', 'vehicules-utilitaires', 'nouveau trafic', 'nouveau-trafic', 1916000, 70000, 0, 1986000),
(36, 'logan', 'logan', '52l', '#003590', 'DACIA', 'Véhicules Dacia', 'vehicules-dacia', 'logan', 'logan', 756000, 70000, 0, 826000),
(37, 'logan mcv', 'logan-mcv', '90k2', '#003690', 'DACIA', 'Véhicules Dacia', 'vehicules-dacia', 'logan mcv', 'logan-mcv', 1319000, 70000, 0, 1389000),
(38, 'duster', 'duster', '79h', '#003690', 'DACIA', 'Véhicules Dacia', 'vehicules-dacia', 'duster', 'duster', 1016000, 70000, 0, 1086000),
(39, 'sandero', 'sandero', '52b', '#003690', 'DACIA', 'Véhicules Dacia', 'vehicules-dacia', 'sandero', 'sandero', 841000, 70000, 0, 911000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details_vehicule`
--
ALTER TABLE `details_vehicule`
  ADD CONSTRAINT `details_vehicule_ibfk_1` FOREIGN KEY (`id_veh`) REFERENCES `vehicule` (`ID`) ON UPDATE CASCADE;

--
-- Constraints for table `img_vehicule`
--
ALTER TABLE `img_vehicule`
  ADD CONSTRAINT `img_vehicule_ibfk_1` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`gamme_id`) REFERENCES `gamme` (`ID`);

--
-- Constraints for table `sub_page`
--
ALTER TABLE `sub_page`
  ADD CONSTRAINT `sub_page_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`ID`);

--
-- Constraints for table `sub_sub_page`
--
ALTER TABLE `sub_sub_page`
  ADD CONSTRAINT `sub_sub_page_ibfk_1` FOREIGN KEY (`sub_page_id`) REFERENCES `sub_page` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
