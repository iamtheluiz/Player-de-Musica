-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Out-2018 às 02:17
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_player`
--
CREATE DATABASE IF NOT EXISTS `db_player` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_player`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `cd_login` int(3) NOT NULL AUTO_INCREMENT,
  `nm_login` varchar(150) NOT NULL,
  `tx_login` varchar(30) NOT NULL,
  `tx_pass` varchar(70) NOT NULL,
  PRIMARY KEY (`cd_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_musica`
--

CREATE TABLE IF NOT EXISTS `tb_musica` (
  `cd_musica` int(11) NOT NULL AUTO_INCREMENT,
  `nm_musica` varchar(200) NOT NULL,
  `url_musica` varchar(500) NOT NULL,
  `nm_banda` varchar(200) NOT NULL DEFAULT 'Desconhecido',
  PRIMARY KEY (`cd_musica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_playlist`
--

CREATE TABLE IF NOT EXISTS `tb_playlist` (
  `cd_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `nm_playlist` varchar(70) NOT NULL,
  `nm_categoria` varchar(70) NOT NULL,
  `url_icon` varchar(150) NOT NULL DEFAULT 'padrao.png',
  PRIMARY KEY (`cd_playlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_playlist_musica`
--

CREATE TABLE IF NOT EXISTS `tb_playlist_musica` (
  `cd_playlist_musica` int(11) NOT NULL AUTO_INCREMENT,
  `id_playlist` int(11) NOT NULL,
  `id_musica` int(11) NOT NULL,
  PRIMARY KEY (`cd_playlist_musica`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
