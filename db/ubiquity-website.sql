-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 fév. 2023 à 17:27
-- Version du serveur : 10.4.11-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ubiquity-website`
--
CREATE DATABASE IF NOT EXISTS `ubiquity-website` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ubiquity-website`;

-- --------------------------------------------------------

--
-- Structure de la table `feature`
--

CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `label` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `php` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `sens` tinyint(1) NOT NULL,
  `tabs` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `feature`
--

INSERT INTO `feature` (`id`, `title`, `label`, `content`, `php`, `icon`, `sens`, `tabs`) VALUES
(1, 'MVC design pattern', 'Directory structure', 'Ubiquity implements MVC2 design pattern.<br>\r\nThe directory structure makes it easy to separate views, models and controllers.', 'app\r\n ├ cache\r\n ├ config\r\n ├ controllers\r\n ├ models\r\n └ views', 'sitemap', 1, 0),
(2, 'Pretty URLs', 'Controllers & routes', 'Ubiquity uses pretty URLs, built from the principle <b>controller/action/{parameters...}</b>.<br>\r\nIt is also possible to use the <b>@route</b> annotations.', 'namespace controllers;\r\nclass Main extends ControllerBase{\r\n	/**\r\n	 * @route(\"index\",\"methods\"=>[\"get\",\"post\"])\r\n	 */\r\n	public function index(){\r\n		//\r\n	}\r\n}', 'external link square alternate', 0, 0),
(3, 'Datas', 'Models & ORM', 'Models are Plain Old PHP Objects, only with members and accessors to them.<br>\r\n\r\nObject relational mapping relies on member annotations.<br>\r\nA Data Access Layer (<b><u>DAO</u></b> class) performs bidirectional transfer of data between the relational database and the domain layer (models).', '<pre><code class=\"language-php\">namespace models;\nclass Product{\n	/**\n	 * @id\n	 * @column(\"name\"=>\"id\",\"dbType\"=>\"int(11)\")\n	*/\n	private $id;\n\n	/**\n	 * @column(\"name\"=>\"name\",\"dbType\"=>\"varchar(65)\")\n	*/\n	private $name;\n}</code></pre>\n<pre><code class=\"language-php\">$products=DAO::getAll(\"models\\Product\");</code></pre>\n<pre><code class=\"language-php\">$product=new Product();\n$product->setName(\"Brocolis\");\n$products=DAO::save($product);</code></pre>', 'sticky note', 1, 0),
(4, 'Views', 'View loading & Twig templating', 'Views are loaded from the controller, in a classic way.<br>\r\nThe controller optionally pass them the data.<br>\r\n<br>\r\n<a href=\"http://twig.symfony.com\" target=\"_new\">Twig</a> is the default template engine.\r\n', '<pre><code class=\"language-php\">class Products extends ControllerBase{\r\n\r\n	public function index(){\r\n		$this->loadView(\"index.html\",[\"message\"=>\"Hello\"]);\r\n	}</code></pre>\r\n<pre><code class=\"language-twig\">{% extends \"base.html\" %}\r\n{% block body %}\r\n	{{ message }}\r\n{% endblock %}\r\n}</code></pre>', 'file alternate outline', 0, 0),
(5, 'Classes autoloading', 'PSR-4', 'Ubiquity use PSR-4 composer autoloader.<br>\r\nThe root namespace of a project is anchored in the <b>app/</b> folder. ', '<pre><code class=\"language-php\">namespace controllers;\nclass Product{\n}</code></pre>\n<pre><code class=\"language-batch\">app\n └ controllers \n      └ Product.php\n</code></pre>', 'file code outline', 1, 0),
(6, 'Access control', 'Actions', 'Access control to a controller can be performed using the isValid and onInvalidControl methods.', '<pre><code class=\"language-php\">\r\n     class IndexController extends ControllerBase{\r\n             ...\r\n             public function isValid($action){\r\n                     return USession::exists(\'activeUser\');\r\n             }\r\n\r\n             public function onInvalidControl(){\r\n                     $this->initialize();\r\n                     $this->loadView(\"unauthorized.html\");\r\n                     $this->finalize();\r\n             }\r\n     }\r\n</code></pre>', 'user', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
