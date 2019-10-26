-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 01. April 2010 um 11:56
-- Server Version: 5.1.37
-- PHP-Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `portfolio`
--
DROP DATABASE `portfolio`;
CREATE DATABASE `portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portfolio`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mapblockentry`
--

DROP TABLE IF EXISTS `mapblockentry`;
CREATE TABLE IF NOT EXISTS `mapblockentry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromX` int(11) NOT NULL,
  `fromY` int(11) NOT NULL,
  `toX` int(11) NOT NULL,
  `toY` int(11) NOT NULL,
  `mapblockclass` varchar(10) NOT NULL,
  `inserted` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fromX` (`fromX`,`fromY`,`toX`,`toY`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `mapblockentry`
--

INSERT INTO `mapblockentry` (`id`, `fromX`, `fromY`, `toX`, `toY`, `mapblockclass`, `inserted`) VALUES
(1, 0, 0, 5, 5, 'A', '2010-03-11 11:05:41'),
(2, 0, -5, 5, 0, 'F', '2010-03-11 11:06:24'),
(3, 5, -5, 10, 0, 'C', '2010-03-11 11:06:35'),
(4, 5, 0, 10, 5, 'D', '2010-03-11 11:06:45'),
(5, 10, 0, 15, 5, 'E', '2010-03-11 11:06:54'),
(6, 10, -5, 15, 0, 'A', '2010-03-11 11:07:24'),
(7, 10, -10, 15, -5, 'B', '2010-03-11 11:07:46');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mapplace`
--

DROP TABLE IF EXISTS `mapplace`;
CREATE TABLE IF NOT EXISTS `mapplace` (
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `direction` tinyint(4) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`x`,`y`,`direction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mapplace`
--

INSERT INTO `mapplace` (`x`, `y`, `direction`, `userid`) VALUES
(4, 0, 1, 0),
(4, 1, 4, 0),
(4, 2, 2, 0),
(4, 3, 4, 0),
(4, 4, 2, 0),
(3, 4, 1, 0),
(2, 4, 3, 0),
(1, 4, 1, 0),
(0, 4, 4, 0),
(0, 0, 4, 0),
(1, 0, 3, 0),
(2, 0, 1, 0),
(3, 0, 3, 0),
(2, 3, 4, 0),
(2, 2, 2, 0),
(2, 1, 4, 0),
(0, 2, 1, 0),
(1, 2, 3, 0),
(0, 3, 2, 0),
(4, -5, 1, 0),
(4, -4, 2, 0),
(4, -3, 2, 0),
(3, -3, 3, 0),
(2, -3, 4, 0),
(2, -4, 4, 0),
(2, -5, 1, 0),
(1, -5, 3, 0),
(0, -5, 1, 0),
(3, -1, 1, 0),
(3, -1, 2, 0),
(3, -1, 3, 0),
(2, -1, 3, 0),
(1, -1, 3, 0),
(1, -1, 1, 0),
(2, -2, 2, 0),
(2, -2, 4, 0),
(0, -4, 4, 0),
(0, -3, 2, 0),
(0, -2, 4, 0),
(9, -2, 4, 0),
(9, -3, 2, 0),
(9, -4, 4, 0),
(9, -5, 1, 0),
(9, -5, 2, 0),
(9, -1, 2, 0),
(8, -1, 1, 0),
(7, -1, 3, 0),
(6, -1, 1, 0),
(5, -1, 4, 0),
(5, -1, 3, 0),
(8, -3, 3, 0),
(8, -3, 1, 0),
(6, -3, 3, 0),
(6, -3, 1, 0),
(5, -3, 4, 0),
(8, -5, 3, 0),
(7, -5, 1, 0),
(6, -5, 3, 0),
(5, -5, 1, 0),
(7, -2, 4, 0),
(7, -2, 2, 0),
(7, -4, 4, 0),
(7, -4, 2, 0),
(5, -2, 2, 0),
(5, -4, 2, 0),
(9, 4, 3, 0),
(8, 4, 1, 0),
(7, 4, 3, 0),
(6, 4, 1, 0),
(5, 4, 4, 0),
(5, 4, 3, 0),
(9, 1, 4, 0),
(9, 2, 2, 0),
(9, 2, 3, 0),
(8, 2, 1, 0),
(7, 2, 3, 0),
(6, 2, 1, 0),
(5, 2, 4, 0),
(8, 0, 3, 0),
(8, 0, 4, 0),
(8, 0, 1, 0),
(6, 0, 1, 0),
(6, 0, 2, 0),
(6, 0, 3, 0),
(5, 0, 1, 0),
(5, 1, 2, 0),
(5, 3, 2, 0),
(14, 2, 4, 0),
(14, 2, 2, 0),
(14, 0, 2, 0),
(14, 4, 2, 0),
(13, 4, 3, 0),
(12, 4, 1, 0),
(11, 4, 3, 0),
(13, 3, 1, 0),
(13, 3, 4, 0),
(13, 1, 4, 0),
(13, 1, 3, 0),
(10, 0, 1, 0),
(12, 0, 3, 0),
(12, 0, 1, 0),
(11, 3, 1, 0),
(11, 3, 2, 0),
(10, 3, 4, 0),
(11, 1, 2, 0),
(11, 1, 3, 0),
(10, 1, 4, 0),
(10, 2, 2, 0),
(14, -5, 1, 0),
(14, -4, 4, 0),
(14, -3, 2, 0),
(14, -2, 4, 0),
(14, -1, 2, 0),
(13, -1, 1, 0),
(12, -1, 3, 0),
(11, -1, 1, 0),
(10, -1, 4, 0),
(10, -5, 4, 0),
(11, -5, 3, 0),
(12, -5, 1, 0),
(13, -5, 3, 0),
(12, -2, 4, 0),
(12, -3, 2, 0),
(12, -4, 4, 0),
(10, -3, 1, 0),
(11, -3, 3, 0),
(10, -2, 2, 0),
(14, -10, 1, 10),
(14, -8, 2, 6),
(14, -9, 2, 2),
(14, -9, 4, 11),
(14, -7, 3, 12),
(14, -7, 4, 13),
(10, -8, 4, 21),
(10, -8, 1, 19),
(11, -8, 1, 16),
(13, -8, 3, 15),
(13, -8, 1, 14),
(11, -10, 4, 9),
(11, -10, 3, 3),
(12, -10, 1, 0),
(13, -10, 3, 5),
(10, -7, 4, 0),
(12, -7, 2, 0),
(16, -6, 2, 0),
(16, -6, 3, 0),
(15, -6, 3, 0),
(13, -6, 1, 0),
(13, -6, 3, 0),
(12, -6, 3, 20),
(11, -6, 3, 0),
(12, -6, 2, 0),
(12, -8, 1, 17);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mapspawnpoint`
--

DROP TABLE IF EXISTS `mapspawnpoint`;
CREATE TABLE IF NOT EXISTS `mapspawnpoint` (
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `direction` smallint(6) NOT NULL,
  PRIMARY KEY (`x`,`y`,`direction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `mapspawnpoint`
--

INSERT INTO `mapspawnpoint` (`x`, `y`, `direction`) VALUES
(0, -1, 1),
(0, -1, 2),
(2, -5, 3),
(2, -3, 3),
(2, -1, 1),
(2, 0, 3),
(2, 4, 1),
(4, 0, 3),
(4, 4, 1),
(4, 4, 4),
(5, -3, 2),
(5, 2, 2),
(5, 4, 1),
(7, -5, 3),
(7, -3, 3),
(7, -1, 1),
(9, -1, 1),
(9, 2, 4),
(9, 4, 4),
(10, -8, 2),
(10, 0, 2),
(10, 0, 3),
(10, 4, 2),
(11, -6, 1),
(12, -8, 2),
(12, -5, 3),
(12, -1, 1),
(14, -10, 3),
(14, -9, 3),
(14, -8, 4),
(14, -5, 3),
(14, -1, 1),
(14, -1, 4),
(14, 0, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usedfilename`
--

DROP TABLE IF EXISTS `usedfilename`;
CREATE TABLE IF NOT EXISTS `usedfilename` (
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`filename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `usedfilename`
--

INSERT INTO `usedfilename` (`filename`) VALUES
('10vwfo.jpg'),
('11zizo.jpg'),
('12gnad.jpg'),
('13xydc.jpg'),
('14jonw.jpg'),
('15crgn.jpg'),
('15epux.jpg'),
('15lsfs.jpg'),
('15mlut.jpg'),
('15tkbu.jpg'),
('15ujct.jpg'),
('15wtqt.jpg'),
('15xwjy.jpg'),
('15zqtq.jpg'),
('16xqnk.jpg'),
('17hmxi.jpg'),
('19fovu.jpg'),
('1zepg.jpg'),
('20ktqh.jpg'),
('21rqje.jpg'),
('2azmh.jpg'),
('2bgzm.jpg'),
('2cfmz.jpg'),
('2clif.jpg'),
('2cryh.jpg'),
('2dqni.jpg'),
('2fkhe.jpg'),
('2fozc.jpg'),
('2gbyd.jpg'),
('2gfwp.jpg'),
('2hgxi.jpg'),
('2hopy.jpg'),
('2horg.jpg'),
('2inuf.jpg'),
('2jelu.jpg'),
('2joby.jpg'),
('2jwpe.jpg'),
('2kdaj.jpg'),
('2kfor.jpg'),
('2khcj.jpg'),
('2kler.jpg'),
('2knip.jpg'),
('2knqn.jpg'),
('2lexc.jpg'),
('2lexo.jpg'),
('2lobq.jpg'),
('2lstq.jpg'),
('2mbwt.jpg'),
('2nkrc.jpg'),
('2onar.jpg'),
('2pknk.jpg'),
('2qduf.jpg'),
('2qduj.jpg'),
('2qlmb.jpg'),
('2rkdi.jpg'),
('2shgx.jpg'),
('2slwj.jpg'),
('2talk.jpg'),
('2taza.jpg'),
('2tehc.jpg'),
('2vahe.jpg'),
('2vkvk.jpg'),
('2wpoj.jpg'),
('2xclu.jpg'),
('2xgve.jpg'),
('2xifc.jpg'),
('2zclc.jpg'),
('2zizi.jpg'),
('3bgvk.jpg'),
('3nyrc.jpg'),
('3qfql.jpg'),
('3srcx.jpg'),
('3tcfq.jpg'),
('4jshm.jpg'),
('4kvsb.jpg'),
('5fevq.jpg'),
('5gnad.jpg'),
('6avax.jpg'),
('6kbyn.jpg'),
('6mluz.jpg'),
('6otev.jpg'),
('6ozcf.jpg'),
('6pwtw.jpg'),
('6tqjq.jpg'),
('7yxmf.jpg'),
('8stej.jpg'),
('9boru.jpg'),
('9fuxc.jpg'),
('9ilcr.jpg'),
('9itsj.jpg'),
('9nmvm.jpg'),
('9nqbk.jpg'),
('9qdyx.jpg'),
('9qrat.jpg'),
('9qrwv.jpg'),
('9rqje.jpg'),
('9srmf.jpg'),
('9srqz.jpg'),
('9tsjs.jpg'),
('9vqbg.jpg'),
('9zizo.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `shortDescription` varchar(161) COLLATE utf8_unicode_ci NOT NULL,
  `weblink` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `imageFilename` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `allowsComments` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `shortDescription`, `weblink`, `email`, `newsletter`, `imageFilename`, `allowsComments`) VALUES
(2, 'Dickschn', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.kroganerland.de', 'dickschn@gmx.net', 1, '2hopy.jpg', 1),
(3, 'Japan-Kram', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.Japan.de', 'stefan.heiler@gmx.de', 1, '3nyrc.jpg', 1),
(4, 'dico', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'nö nö nö!', '', 'dico@gmx.de', 1, '4jshm.jpg', 1),
(5, 'Assassins Creed II', '356a192b7913b04c54574d18c28d46e6395428ab', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.assassinscreed2.de', '1@gmx.de', 1, '5gnad.jpg', 1),
(6, 'Bioshock II', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.bioshockgame.com', '2@gmx.de', 1, '6tqjq.jpg', 1),
(7, 'Resident Evil 5', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Resident Evil 5 gehört eindeutig zu den grafisch beeindruckendsten Spielen, die wir bis dato zu Gesicht bekommen haben. Der Detailgrad ist herausragend, in Gebäu', 'www.residentevil.de', 're5@gmx.de', 1, '7yxmf.jpg', 1),
(8, 'fred-netz', '4765d59e031324f10438a767093014e761109796', 'merde, jorde, merde, jorde,\r\nmerde, jorde, merde, jorde,\r\nmerde, jorde, merde, jorde,\r\nmerde, jorde, merde, jorde,\r\nmerde, jorde, merde, jorde,\r\nmerde, jorde, me', 'gmx.de', 'fred-netz@gmx.de', 1, '8stej.jpg', 1),
(9, 'Dead Space', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.deadspacegame.com', 'deadspace@gmx.de', 1, '9rqje.jpg', 1),
(10, 'Final Fantasy XIII', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.finalfantasy.de', 'finalfantasyXIII@gmx.de', 1, '10vwfo.jpg', 1),
(11, 'Need 4 Speed Shift', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.need4speed.de', 'need4speed@gmx.de', 1, '11zizo.jpg', 1),
(12, 'Im Juli', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.imjuli.de', 'imjuli@gmx.de', 1, '12gnad.jpg', 1),
(13, 'Die Fetten Jahre sind vorbei', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.filme.de', 'fettejahre@gmx.de', 1, '13xydc.jpg', 1),
(14, 'Gegen Die Wand', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.gegendiewand.de', 'wand@gmx.de', 1, '14jonw.jpg', 1),
(15, 'Bang Boom Bang', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.bangboombang.de', 'bang@gmx.de', 1, '15mlut.jpg', 1),
(16, 'Goldene Zeiten', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.goldeneZeiten.de', 'zeiten@gmx.de', 1, '16xqnk.jpg', 1),
(17, '2001', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.2001.de', '2001@gmx.de', 1, '17hmxi.jpg', 1),
(19, 'Mass Effect II', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', '', 'masseffect@gmx.de', 1, '19fovu.jpg', 1),
(20, 'Gears Of War II', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.gearsOfWar.de', 'gow@gmx.de', 1, '20ktqh.jpg', 1),
(21, 'Planet Terrror', '1bc7a88f49c11aca7d964554e5b35ab21f64ce45', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At ve', 'www.planetTerror.de', 'terror@gmx.de', 1, '21rqje.jpg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usercomment`
--

DROP TABLE IF EXISTS `usercomment`;
CREATE TABLE IF NOT EXISTS `usercomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `commentUserId` int(11) NOT NULL,
  `text` text NOT NULL,
  `datePosted` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Daten für Tabelle `usercomment`
--

INSERT INTO `usercomment` (`id`, `userId`, `commentUserId`, `text`, `datePosted`) VALUES
(47, 3, 3, 'wirklich sehr schöne Farben insgesamt..', '2010-03-11 09:22:23'),
(30, 4, 4, 'toll das bin ich! :)', '2010-03-08 16:30:55'),
(48, 7, 2, 'geilo', '2010-03-11 09:33:38'),
(46, 6, 2, 'Man, das ist geil!', '2010-03-11 08:53:58'),
(49, 2, 2, 'dfggg', '2010-03-11 09:39:16'),
(50, 9, 9, 'ja, so sieht das aus! :D', '2010-03-11 11:22:22'),
(51, 2, 5, 'Finger!', '2010-03-11 11:25:24'),
(52, 15, 16, 'Guck Dir mal lieber mich an, Du Arsch!', '2010-03-11 11:39:29'),
(53, 16, 19, 'Ach so''n Quatsch, spiel lieber mich!', '2010-03-11 11:56:24'),
(54, 2, 19, 'voll doof dieser Anime kram...', '2010-03-11 11:56:58'),
(55, 19, 20, 'nö :O)', '2010-03-11 11:59:17'),
(56, 17, 21, 'Terror, alteer!', '2010-03-11 12:03:09'),
(57, 17, 2, 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', '2010-03-11 12:52:47'),
(58, 20, 2, 'schöööön :)', '2010-03-11 12:55:07');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `lastAction` datetime DEFAULT NULL,
  PRIMARY KEY (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `userlogin`
--

INSERT INTO `userlogin` (`token`, `userId`, `lastAction`) VALUES
('o6dqpujofcd6q4bbfk9hf9sc63', 2, '2010-03-22 20:49:14'),
('l2ot0tacgau5cm5ggjnfhh5ks2', 21, '2010-03-11 12:02:21'),
('b42iphle47q61bfnrr6f3r6jp1', 8, '2010-03-11 11:02:30');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userpasswordforget`
--

DROP TABLE IF EXISTS `userpasswordforget`;
CREATE TABLE IF NOT EXISTS `userpasswordforget` (
  `userId` int(11) NOT NULL,
  `key` varchar(16) NOT NULL,
  KEY `key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `userpasswordforget`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
