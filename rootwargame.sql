-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 17-05-11 03:45
-- 서버 버전: 10.1.21-MariaDB
-- PHP 버전: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `rootwargame`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `answer_input_log`
--

CREATE TABLE `answer_input_log` (
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `try_answer` text NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `free_board`
--

CREATE TABLE `free_board` (
  `idx` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `write_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `login_log`
--

CREATE TABLE `login_log` (
  `email` varchar(30) NOT NULL,
  `nick_name` varchar(20) NOT NULL,
  `day` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `login_log`
--

INSERT INTO `login_log` (`email`, `nick_name`, `day`) VALUES
('root@sdhs.kr', 'Admin', '2017-05-11 03:02:13'),
('rlagudwns@naver.com', '김형준', '2017-05-11 03:41:54');

-- --------------------------------------------------------

--
-- 테이블 구조 `question`
--

CREATE TABLE `question` (
  `track` varchar(10) NOT NULL,
  `que_name` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `answer` text NOT NULL,
  `solve` int(11) NOT NULL DEFAULT '0',
  `down_link` text NOT NULL,
  `day` varchar(20) NOT NULL,
  `N_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user_imf`
--

CREATE TABLE `user_imf` (
  `email` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `solve_name` text NOT NULL,
  `resolve` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user_imf`
--

INSERT INTO `user_imf` (`email`, `passwd`, `nickname`, `solve_name`, `resolve`) VALUES
('root@sdhs.kr', 'dhrudwpghlwkd', 'Admin', '', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `free_board`
--
ALTER TABLE `free_board`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`N_ID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `free_board`
--
ALTER TABLE `free_board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 테이블의 AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `N_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
