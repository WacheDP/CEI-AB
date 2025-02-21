-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2025 a las 19:33:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de datos: `abdatabase`
--

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `dantronñ`
--

CREATE TABLE `dantronñ` (
  `dpancodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `antocodg` varchar(32) NOT NULL,
  `nñcedesc` varchar(15) NOT NULL,
  `dpanalto` float NOT NULL,
  `dpangodo` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `dantropo`
--

CREATE TABLE `dantropo` (
  `dpapcodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `antocodg` varchar(32) NOT NULL,
  `persoced` varchar(12) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detacept`
--

CREATE TABLE `detacept` (
  `detacpcd` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `aceptcod` varchar(32) NOT NULL,
  `persoced` varchar(12) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detcolab`
--

CREATE TABLE `detcolab` (
  `dcolbcod` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `colabcod` varchar(32) NOT NULL,
  `perscedi` varchar(12) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detlaula`
--

CREATE TABLE `detlaula` (
  `daulacod` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `aulacodg` varchar(32) NOT NULL,
  `dauladia` timestamp NOT NULL DEFAULT current_timestamp(),
  `daulastt` varchar(15) NOT NULL,
  `daulaobv` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `detlaula`
--

INSERT INTO `detlaula` (
    `daulacod`,
    `aulacodg`,
    `dauladia`,
    `daulastt`,
    `daulaobv`
  )
VALUES (
    '91ae714ad85d11ef896984a93ea1a4c5',
    'e45d44c3d82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc7de7d85d11ef896984a93ea1a4c5',
    'e4634323d82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc849ad85d11ef896984a93ea1a4c5',
    'e4634548d82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc873bd85d11ef896984a93ea1a4c5',
    'e46345afd82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc8e79d85d11ef896984a93ea1a4c5',
    'e4634616d82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc90c1d85d11ef896984a93ea1a4c5',
    'e463466cd82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc92bed85d11ef896984a93ea1a4c5',
    'e46346c6d82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc94b5d85d11ef896984a93ea1a4c5',
    'e463474ed82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  ),
  (
    '91bc9784d85d11ef896984a93ea1a4c5',
    'e46347b9d82a11ef96da84a93ea1a4c5',
    '2025-01-22 01:09:45',
    'Habilitado',
    NULL
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detmatnñ`
--

CREATE TABLE `detmatnñ` (
  `demtnñcd` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `matcodig` varchar(32) NOT NULL,
  `nñcedesc` varchar(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detmatpo`
--

CREATE TABLE `detmatpo` (
  `demtpocd` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `matcodig` varchar(32) NOT NULL,
  `persoced` varchar(12) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `detmatpo`
--

INSERT INTO `detmatpo` (`demtpocd`, `matcodig`, `persoced`)
VALUES (
    '0464355cde8a11efbe0584a93ea1a4c5',
    '042e8ec8de8a11efbe0584a93ea1a4c5',
    '10024578'
  ),
  (
    '8cd7496ede9c11efbe0584a93ea1a4c5',
    '8c888bd4de9c11efbe0584a93ea1a4c5',
    '28657483'
  ),
  (
    '92dfa88dde9c11efbe0584a93ea1a4c5',
    '92d67f8ade9c11efbe0584a93ea1a4c5',
    '78457822'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detreurp`
--

CREATE TABLE `detreurp` (
  `derurpcd` varchar(32) NOT NULL,
  `reuncodg` varchar(32) NOT NULL,
  `repreced` varchar(12) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabacept`
--

CREATE TABLE `tabacept` (
  `aceptcod` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `colabcod` varchar(32) NOT NULL,
  `aceptobs` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabantro`
--

CREATE TABLE `tabantro` (
  `antocodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `clsccodg` varchar(32) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabcolab`
--

CREATE TABLE `tabcolab` (
  `colabcod` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `invrcodg` varchar(32) NOT NULL,
  `colabcat` int(11) NOT NULL,
  `colabdia` timestamp NOT NULL DEFAULT current_timestamp(),
  `colabtyp` varchar(14) NOT NULL,
  `colabobs` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablamat`
--

CREATE TABLE `tablamat` (
  `matcodig` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `aulacodg` varchar(32) NOT NULL,
  `añsccodg` varchar(10) NOT NULL,
  `matturno` varchar(6) NOT NULL,
  `matgrupo` varchar(10) NOT NULL,
  `matsecco` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tablamat`
--

INSERT INTO `tablamat` (
    `matcodig`,
    `aulacodg`,
    `añsccodg`,
    `matturno`,
    `matgrupo`,
    `matsecco`
  )
VALUES (
    '042e8ec8de8a11efbe0584a93ea1a4c5',
    'e463466cd82a11ef96da84a93ea1a4c5',
    '2025-2026',
    'MAÑANA',
    'A',
    'A'
  ),
  (
    '8c888bd4de9c11efbe0584a93ea1a4c5',
    'e46346c6d82a11ef96da84a93ea1a4c5',
    '2025-2026',
    'MAÑANA',
    'MATERNAL',
    'A'
  ),
  (
    '92d67f8ade9c11efbe0584a93ea1a4c5',
    'e463474ed82a11ef96da84a93ea1a4c5',
    '2025-2026',
    'MAÑANA',
    'C',
    'A'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablaula`
--

CREATE TABLE `tablaula` (
  `aulacodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `aulanomb` varchar(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tablaula`
--

INSERT INTO `tablaula` (`aulacodg`, `aulanomb`)
VALUES ('e45d44c3d82a11ef96da84a93ea1a4c5', 'Cocina'),
  (
    'e4634323d82a11ef96da84a93ea1a4c5',
    'Patio Central'
  ),
  ('e4634548d82a11ef96da84a93ea1a4c5', 'Deposito'),
  ('e46345afd82a11ef96da84a93ea1a4c5', 'Dirección'),
  ('e4634616d82a11ef96da84a93ea1a4c5', 'Parque'),
  ('e463466cd82a11ef96da84a93ea1a4c5', 'Aula 1'),
  ('e46346c6d82a11ef96da84a93ea1a4c5', 'Aula 2'),
  ('e463474ed82a11ef96da84a93ea1a4c5', 'Aula 3'),
  ('e46347b9d82a11ef96da84a93ea1a4c5', 'Aula 4');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablbook`
--

CREATE TABLE `tablbook` (
  `bookcodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `persoced` varchar(12) NOT NULL,
  `clsccodg` varchar(32) NOT NULL,
  `bookhini` time NOT NULL,
  `bookhfin` time NOT NULL,
  `bookturn` varchar(6) NOT NULL,
  `bookobsv` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablcatg`
--

CREATE TABLE `tablcatg` (
  `catgcodg` varchar(10) NOT NULL,
  `catgdscp` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablestd`
--

CREATE TABLE `tablestd` (
  `estdcodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `paiscodg` varchar(32) NOT NULL,
  `estdnomb` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tablestd`
--

INSERT INTO `tablestd` (`estdcodg`, `paiscodg`, `estdnomb`)
VALUES (
    '9c1ef694c71611efad5984a93ea1a4c5',
    '67c71d54c71611efad5984a93ea1a4c5',
    'Táchira'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablinvr`
--

CREATE TABLE `tablinvr` (
  `invrcodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `aulacodg` varchar(32) NOT NULL,
  `catgcodg` varchar(10) NOT NULL,
  `invrdscp` varchar(50) NOT NULL,
  `invrcant` int(11) DEFAULT 1,
  `invrvalu` float DEFAULT NULL,
  `invrstat` varchar(14) NOT NULL,
  `invrmotv` varchar(10) DEFAULT NULL,
  `invrtype` varchar(14) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablniño`
--

CREATE TABLE `tablniño` (
  `nñcedesc` varchar(15) NOT NULL,
  `parrqcod` varchar(32) NOT NULL,
  `nñprnomb` varchar(12) NOT NULL,
  `nñsgnomb` varchar(12) DEFAULT NULL,
  `nñprapel` varchar(12) NOT NULL,
  `nñsgapel` varchar(12) DEFAULT NULL,
  `nñgenero` varchar(1) NOT NULL,
  `nñfecnac` date NOT NULL,
  `nñnacion` varchar(1) NOT NULL,
  `nñlugnac` varchar(100) DEFAULT NULL,
  `nñdirecc` varchar(100) NOT NULL,
  `nñherman` int(11) DEFAULT 0,
  `nñtransp` varchar(30) DEFAULT NULL,
  `nñestado` varchar(15) NOT NULL DEFAULT 'Habilitado',
  `nñperfil` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablpais`
--

CREATE TABLE `tablpais` (
  `paiscodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `paisnomb` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tablpais`
--

INSERT INTO `tablpais` (`paiscodg`, `paisnomb`)
VALUES ('67c71d54c71611efad5984a93ea1a4c5', 'Venezuela');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablpers`
--

CREATE TABLE `tablpers` (
  `perscedi` varchar(12) NOT NULL,
  `parrqcod` varchar(32) NOT NULL,
  `persnom1` varchar(12) NOT NULL,
  `persnom2` varchar(12) DEFAULT NULL,
  `persape1` varchar(12) NOT NULL,
  `persape2` varchar(12) DEFAULT NULL,
  `perstel1` varchar(20) DEFAULT NULL,
  `perstel2` varchar(20) DEFAULT NULL,
  `persfena` date NOT NULL,
  `persluna` varchar(100) DEFAULT NULL,
  `persnaco` varchar(1) NOT NULL,
  `persdire` varchar(100) NOT NULL,
  `perscatg` varchar(25) NOT NULL,
  `persstat` varchar(15) NOT NULL DEFAULT 'Habilitado',
  `persfoto` varchar(50) NOT NULL DEFAULT 'STAND.webp'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tablpers`
--

INSERT INTO `tablpers` (
    `perscedi`,
    `parrqcod`,
    `persnom1`,
    `persnom2`,
    `persape1`,
    `persape2`,
    `perstel1`,
    `perstel2`,
    `persfena`,
    `persluna`,
    `persnaco`,
    `persdire`,
    `perscatg`,
    `persstat`,
    `persfoto`
  )
VALUES (
    '10024578',
    '3ae036fec71911efad5984a93ea1a4c5',
    'Lizandro',
    NULL,
    'Perez',
    NULL,
    NULL,
    NULL,
    '2002-11-21',
    NULL,
    'V',
    'Santa Teresa, Vereda Bello Monte',
    'PERSONAL',
    'Habilitado',
    'STAND.webp'
  ),
  (
    '28657483',
    '3ae036fec71911efad5984a93ea1a4c5',
    'Juan',
    NULL,
    'Perez',
    NULL,
    NULL,
    NULL,
    '2002-11-21',
    NULL,
    'V',
    'Santa Teresa, Vereda Bello Monte',
    'PERSONAL',
    'Habilitado',
    'STAND.webp'
  ),
  (
    '29649307',
    '3ae036fec71911efad5984a93ea1a4c5',
    'daniel',
    'alejandro',
    'parra',
    'arellano',
    '+584147464175',
    NULL,
    '2002-11-21',
    'San Cristóbal, Estado Táchira',
    'V',
    'Santa Teresa, Vereda Bello Monte',
    'ADMINISTRADOR',
    'Habilitado',
    'STAND.webp'
  ),
  (
    '78457822',
    '3ae036fec71911efad5984a93ea1a4c5',
    'Jacky',
    NULL,
    'Perez',
    NULL,
    NULL,
    NULL,
    '2002-11-21',
    NULL,
    'V',
    'Santa Teresa, Vereda Bello Monte',
    'PERSONAL',
    'Habilitado',
    'STAND.webp'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tablreun`
--

CREATE TABLE `tablreun` (
  `reuncodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `clsccodg` varchar(32) NOT NULL,
  `aulacodg` varchar(32) NOT NULL,
  `reuntype` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabluser`
--

CREATE TABLE `tabluser` (
  `username` varchar(12) NOT NULL,
  `perscedi` varchar(12) NOT NULL,
  `userpawo` varchar(1024) NOT NULL,
  `usercorr` varchar(100) NOT NULL,
  `usercode` int(11) NOT NULL DEFAULT 1,
  `userstat` varchar(15) NOT NULL DEFAULT 'Habilitado'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tabluser`
--

INSERT INTO `tabluser` (
    `username`,
    `perscedi`,
    `userpawo`,
    `usercorr`,
    `usercode`,
    `userstat`
  )
VALUES (
    'User1',
    '28657483',
    '$2y$10$vp4.Gy6FRVkkp3mJatuVS.b4dgFvCrbkYaILcgTlS7EwKwbrZtOSS',
    'n1@gmail.com',
    3,
    'Habilitado'
  ),
  (
    'User2',
    '78457822',
    '$2y$10$F3Ko4ZRB9esK9xOGQ/ChyO5cZ4ac9Yz6HkHsj5uG1yHe8c81e7zM6',
    'n2@gmail.com',
    3,
    'Habilitado'
  ),
  (
    'User3',
    '10024578',
    '$2y$10$M..BXulPzybrwX2tMzyrzOM4bUgy9N4KBqLdUAU76rc8gEQWUq4kS',
    'n3@gmail.com',
    3,
    'Habilitado'
  ),
  (
    'WACHEDP',
    '29649307',
    '$2y$10$o7CH0jDZnrDpmDAC4hjGz.NpdRKuOUC9JNPU4vqASuGecXhH1TkoW',
    'wacheparra21@gmail.com',
    10,
    'Habilitado'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabparez`
--

CREATE TABLE `tabparez` (
  `parzcodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `nñcedesc` varchar(15) NOT NULL,
  `perscedi` varchar(15) NOT NULL,
  `parztype` varchar(32) NOT NULL,
  `parzvvjt` tinyint(4) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabparrq`
--

CREATE TABLE `tabparrq` (
  `parrqcod` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `ciudadcd` varchar(32) NOT NULL,
  `parrqnom` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tabparrq`
--

INSERT INTO `tabparrq` (`parrqcod`, `ciudadcd`, `parrqnom`)
VALUES (
    '3ae036fec71911efad5984a93ea1a4c5',
    'db948c17c71811efad5984a93ea1a4c5',
    'San Juan Bautista'
  ),
  (
    '3af36485c71911efad5984a93ea1a4c5',
    'db948c17c71811efad5984a93ea1a4c5',
    'La Concordia'
  ),
  (
    '3af36613c71911efad5984a93ea1a4c5',
    'db948c17c71811efad5984a93ea1a4c5',
    'Pedro María Morantes'
  ),
  (
    '3af367b0c71911efad5984a93ea1a4c5',
    'db948c17c71811efad5984a93ea1a4c5',
    'San Sebastián'
  ),
  (
    '3af36864c71911efad5984a93ea1a4c5',
    'db948c17c71811efad5984a93ea1a4c5',
    'Francisco Romero Lobo'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabperso`
--

CREATE TABLE `tabperso` (
  `persoced` varchar(12) NOT NULL,
  `perscedi` varchar(12) NOT NULL,
  `cargcodg` varchar(6) NOT NULL,
  `persotim` date NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tabperso`
--

INSERT INTO `tabperso` (`persoced`, `perscedi`, `cargcodg`, `persotim`)
VALUES ('10024578', '10024578', 'D12345', '2002-11-21'),
  ('28657483', '28657483', 'D12345', '2002-11-21'),
  ('78457822', '78457822', 'D12345', '2002-11-21');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tabrepre`
--

CREATE TABLE `tabrepre` (
  `repreced` varchar(12) NOT NULL,
  `perscedi` varchar(12) NOT NULL,
  `repre_fe` varchar(30) NOT NULL,
  `repretit` varchar(100) DEFAULT NULL,
  `repretrb` varchar(100) DEFAULT NULL,
  `reprelug` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tabrepre`
--

INSERT INTO `tabrepre` (
    `repreced`,
    `perscedi`,
    `repre_fe`,
    `repretit`,
    `repretrb`,
    `reprelug`
  )
VALUES (
    '29649307',
    '29649307',
    'Católica',
    'Ingeniero de Sistemas',
    'Programador',
    NULL
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbañoesc`
--

CREATE TABLE `tbañoesc` (
  `añsccodg` varchar(10) NOT NULL,
  `añscfini` date NOT NULL,
  `añscffin` date NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tbañoesc`
--

INSERT INTO `tbañoesc` (`añsccodg`, `añscfini`, `añscffin`)
VALUES ('2025-2026', '2025-01-10', '2026-02-10');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbcalesc`
--

CREATE TABLE `tbcalesc` (
  `clsccodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `añsccodg` varchar(10) NOT NULL,
  `clscdate` date NOT NULL,
  `clscobsv` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tbcalesc`
--

INSERT INTO `tbcalesc` (`clsccodg`, `añsccodg`, `clscdate`, `clscobsv`)
VALUES (
    '0780d7ded82311ef962284a93ea1a4c5',
    '2025-2026',
    '2025-01-21',
    NULL
  ),
  (
    '0a426f52d82311ef962284a93ea1a4c5',
    '2025-2026',
    '2025-01-22',
    NULL
  ),
  (
    '70f8ad1ed16411ef861b84a93ea1a4c5',
    '2025-2026',
    '2025-01-14',
    NULL
  ),
  (
    '71c359bed16411ef861b84a93ea1a4c5',
    '2025-2026',
    '2025-01-15',
    NULL
  ),
  (
    'b6dc89b8de5511efbe0584a93ea1a4c5',
    '2025-2026',
    '2025-01-29',
    NULL
  ),
  (
    'b725af9cde5511efbe0584a93ea1a4c5',
    '2025-2026',
    '2025-01-30',
    NULL
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbconast`
--

CREATE TABLE `tbconast` (
  `coascodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `clsccodg` varchar(32) NOT NULL,
  `matcodig` varchar(32) NOT NULL,
  `coasvaro` int(11) NOT NULL,
  `coashemb` int(11) NOT NULL,
  `coastodo` int(11) NOT NULL,
  `coasobsv` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbcroact`
--

CREATE TABLE `tbcroact` (
  `crctcodg` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `clsccodg` varchar(32) NOT NULL,
  `crctacto` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tbcroact`
--

INSERT INTO `tbcroact` (`crctcodg`, `clsccodg`, `crctacto`)
VALUES (
    '08ce3bebd82311ef962284a93ea1a4c5',
    '0780d7ded82311ef962284a93ea1a4c5',
    'ORGANIZACIÓN DE GRUPOS Y SECCIONES'
  ),
  (
    '0b472609d82311ef962284a93ea1a4c5',
    '0a426f52d82311ef962284a93ea1a4c5',
    'ORGANIZACIÓN DE GRUPOS Y SECCIONES'
  ),
  (
    '712ef46ed16411ef861b84a93ea1a4c5',
    '70f8ad1ed16411ef861b84a93ea1a4c5',
    'INSCRIPCIONES'
  ),
  (
    '738c9313d16411ef861b84a93ea1a4c5',
    '71c359bed16411ef861b84a93ea1a4c5',
    'INSCRIPCIONES'
  ),
  (
    '73e132f8d16411ef861b84a93ea1a4c5',
    '71c359bed16411ef861b84a93ea1a4c5',
    'ORGANIZACIÓN DE GRUPOS Y SECCIONES'
  ),
  (
    'b7080910de5511efbe0584a93ea1a4c5',
    'b6dc89b8de5511efbe0584a93ea1a4c5',
    'ORGANIZACIÓN DE GRUPOS Y SECCIONES'
  ),
  (
    'b7440728de5511efbe0584a93ea1a4c5',
    'b725af9cde5511efbe0584a93ea1a4c5',
    'ORGANIZACIÓN DE GRUPOS Y SECCIONES'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tblcargo`
--

CREATE TABLE `tblcargo` (
  `cargcodg` varchar(6) NOT NULL,
  `cargfunc` varchar(15) NOT NULL,
  `cargdenm` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tblcargo`
--

INSERT INTO `tblcargo` (`cargcodg`, `cargfunc`, `cargdenm`)
VALUES ('D12345', 'Docente', 'Docente IV Diurno');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tbniñosa`
--

CREATE TABLE `tbniñosa` (
  `nñsacodg` varchar(15) NOT NULL,
  `nñcedesc` varchar(15) NOT NULL,
  `nñsadoct` varchar(50) DEFAULT NULL,
  `nñsaallg` tinyint(4) NOT NULL,
  `nñsafood` varchar(50) DEFAULT NULL,
  `nñsamedc` varchar(50) DEFAULT NULL,
  `nñsaatmd` tinyint(4) DEFAULT NULL,
  `nñsalimt` varchar(50) DEFAULT NULL,
  `nñsavuls` tinyint(4) NOT NULL,
  `nñsarazo` varchar(50) DEFAULT NULL,
  `nñsa_sae` tinyint(4) NOT NULL,
  `nñsarsae` varchar(50) DEFAULT NULL,
  `nñsahabt` int(11) NOT NULL,
  `nñsatual` varchar(50) NOT NULL,
  `nñsadepo` varchar(50) DEFAULT NULL,
  `nñsaplay` varchar(50) DEFAULT NULL,
  `nñsaobsv` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tdciudad`
--

CREATE TABLE `tdciudad` (
  `ciudadcd` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `muncpcod` varchar(32) NOT NULL,
  `ciudadnm` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tdciudad`
--

INSERT INTO `tdciudad` (`ciudadcd`, `muncpcod`, `ciudadnm`)
VALUES (
    'db948c17c71811efad5984a93ea1a4c5',
    '42c9d650c71811efad5984a93ea1a4c5',
    'San Cristóbal'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tdmuncip`
--

CREATE TABLE `tdmuncip` (
  `muncpcod` varchar(32) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4), '-', ''),
  `estdcodg` varchar(32) NOT NULL,
  `muncpnom` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `tdmuncip`
--

INSERT INTO `tdmuncip` (`muncpcod`, `estdcodg`, `muncpnom`)
VALUES (
    '42c9d650c71811efad5984a93ea1a4c5',
    '9c1ef694c71611efad5984a93ea1a4c5',
    'San Cristóbal'
  );
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dantronñ`
--
ALTER TABLE `dantronñ`
ADD PRIMARY KEY (`dpancodg`),
  ADD KEY `antocodg` (`antocodg`),
  ADD KEY `nñcedesc` (`nñcedesc`);
--
-- Indices de la tabla `dantropo`
--
ALTER TABLE `dantropo`
ADD PRIMARY KEY (`dpapcodg`),
  ADD KEY `antocodg` (`antocodg`),
  ADD KEY `persoced` (`persoced`);
--
-- Indices de la tabla `detacept`
--
ALTER TABLE `detacept`
ADD PRIMARY KEY (`detacpcd`),
  ADD KEY `aceptcod` (`aceptcod`),
  ADD KEY `persoced` (`persoced`);
--
-- Indices de la tabla `detcolab`
--
ALTER TABLE `detcolab`
ADD PRIMARY KEY (`dcolbcod`),
  ADD KEY `colabcod` (`colabcod`),
  ADD KEY `perscedi` (`perscedi`);
--
-- Indices de la tabla `detlaula`
--
ALTER TABLE `detlaula`
ADD PRIMARY KEY (`daulacod`),
  ADD KEY `aulacodg` (`aulacodg`);
--
-- Indices de la tabla `detmatnñ`
--
ALTER TABLE `detmatnñ`
ADD PRIMARY KEY (`demtnñcd`),
  ADD KEY `matcodig` (`matcodig`),
  ADD KEY `nñcedesc` (`nñcedesc`);
--
-- Indices de la tabla `detmatpo`
--
ALTER TABLE `detmatpo`
ADD PRIMARY KEY (`demtpocd`),
  ADD KEY `matcodig` (`matcodig`),
  ADD KEY `persoced` (`persoced`);
--
-- Indices de la tabla `detreurp`
--
ALTER TABLE `detreurp`
ADD PRIMARY KEY (`derurpcd`),
  ADD KEY `reuncodg` (`reuncodg`),
  ADD KEY `repreced` (`repreced`);
--
-- Indices de la tabla `tabacept`
--
ALTER TABLE `tabacept`
ADD PRIMARY KEY (`aceptcod`),
  ADD KEY `colabcod` (`colabcod`);
--
-- Indices de la tabla `tabantro`
--
ALTER TABLE `tabantro`
ADD PRIMARY KEY (`antocodg`),
  ADD KEY `clsccodg` (`clsccodg`);
--
-- Indices de la tabla `tabcolab`
--
ALTER TABLE `tabcolab`
ADD PRIMARY KEY (`colabcod`),
  ADD KEY `invrcodg` (`invrcodg`);
--
-- Indices de la tabla `tablamat`
--
ALTER TABLE `tablamat`
ADD PRIMARY KEY (`matcodig`),
  ADD KEY `aulacodg` (`aulacodg`),
  ADD KEY `añsccodg` (`añsccodg`);
--
-- Indices de la tabla `tablaula`
--
ALTER TABLE `tablaula`
ADD PRIMARY KEY (`aulacodg`);
--
-- Indices de la tabla `tablbook`
--
ALTER TABLE `tablbook`
ADD PRIMARY KEY (`bookcodg`),
  ADD KEY `persoced` (`persoced`),
  ADD KEY `clsccodg` (`clsccodg`);
--
-- Indices de la tabla `tablcatg`
--
ALTER TABLE `tablcatg`
ADD PRIMARY KEY (`catgcodg`);
--
-- Indices de la tabla `tablestd`
--
ALTER TABLE `tablestd`
ADD PRIMARY KEY (`estdcodg`),
  ADD KEY `paiscodg` (`paiscodg`);
--
-- Indices de la tabla `tablinvr`
--
ALTER TABLE `tablinvr`
ADD PRIMARY KEY (`invrcodg`),
  ADD KEY `aulacodg` (`aulacodg`),
  ADD KEY `catgcodg` (`catgcodg`);
--
-- Indices de la tabla `tablniño`
--
ALTER TABLE `tablniño`
ADD PRIMARY KEY (`nñcedesc`),
  ADD KEY `parrqcod` (`parrqcod`);
--
-- Indices de la tabla `tablpais`
--
ALTER TABLE `tablpais`
ADD PRIMARY KEY (`paiscodg`);
--
-- Indices de la tabla `tablpers`
--
ALTER TABLE `tablpers`
ADD PRIMARY KEY (`perscedi`),
  ADD KEY `parrqcod` (`parrqcod`);
--
-- Indices de la tabla `tablreun`
--
ALTER TABLE `tablreun`
ADD PRIMARY KEY (`reuncodg`),
  ADD KEY `clsccodg` (`clsccodg`),
  ADD KEY `aulacodg` (`aulacodg`);
--
-- Indices de la tabla `tabluser`
--
ALTER TABLE `tabluser`
ADD PRIMARY KEY (`username`),
  ADD KEY `perscedi` (`perscedi`);
--
-- Indices de la tabla `tabparez`
--
ALTER TABLE `tabparez`
ADD PRIMARY KEY (`parzcodg`),
  ADD KEY `nñcedesc` (`nñcedesc`),
  ADD KEY `perscedi` (`perscedi`);
--
-- Indices de la tabla `tabparrq`
--
ALTER TABLE `tabparrq`
ADD PRIMARY KEY (`parrqcod`),
  ADD KEY `ciudadcd` (`ciudadcd`);
--
-- Indices de la tabla `tabperso`
--
ALTER TABLE `tabperso`
ADD PRIMARY KEY (`persoced`),
  ADD KEY `perscedi` (`perscedi`),
  ADD KEY `cargcodg` (`cargcodg`);
--
-- Indices de la tabla `tabrepre`
--
ALTER TABLE `tabrepre`
ADD PRIMARY KEY (`repreced`),
  ADD KEY `perscedi` (`perscedi`);
--
-- Indices de la tabla `tbañoesc`
--
ALTER TABLE `tbañoesc`
ADD PRIMARY KEY (`añsccodg`);
--
-- Indices de la tabla `tbcalesc`
--
ALTER TABLE `tbcalesc`
ADD PRIMARY KEY (`clsccodg`),
  ADD KEY `añsccodg` (`añsccodg`);
--
-- Indices de la tabla `tbconast`
--
ALTER TABLE `tbconast`
ADD PRIMARY KEY (`coascodg`),
  ADD KEY `clsccodg` (`clsccodg`),
  ADD KEY `matcodig` (`matcodig`);
--
-- Indices de la tabla `tbcroact`
--
ALTER TABLE `tbcroact`
ADD PRIMARY KEY (`crctcodg`),
  ADD KEY `clsccodg` (`clsccodg`);
--
-- Indices de la tabla `tblcargo`
--
ALTER TABLE `tblcargo`
ADD PRIMARY KEY (`cargcodg`);
--
-- Indices de la tabla `tbniñosa`
--
ALTER TABLE `tbniñosa`
ADD PRIMARY KEY (`nñsacodg`),
  ADD KEY `nñcedesc` (`nñcedesc`);
--
-- Indices de la tabla `tdciudad`
--
ALTER TABLE `tdciudad`
ADD PRIMARY KEY (`ciudadcd`),
  ADD KEY `muncpcod` (`muncpcod`);
--
-- Indices de la tabla `tdmuncip`
--
ALTER TABLE `tdmuncip`
ADD PRIMARY KEY (`muncpcod`),
  ADD KEY `estdcodg` (`estdcodg`);
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dantronñ`
--
ALTER TABLE `dantronñ`
ADD CONSTRAINT `dantronñ_ibfk_1` FOREIGN KEY (`antocodg`) REFERENCES `tabantro` (`antocodg`),
  ADD CONSTRAINT `dantronñ_ibfk_2` FOREIGN KEY (`nñcedesc`) REFERENCES `tablniño` (`nñcedesc`);
--
-- Filtros para la tabla `dantropo`
--
ALTER TABLE `dantropo`
ADD CONSTRAINT `dantropo_ibfk_1` FOREIGN KEY (`antocodg`) REFERENCES `tabantro` (`antocodg`),
  ADD CONSTRAINT `dantropo_ibfk_2` FOREIGN KEY (`persoced`) REFERENCES `tabperso` (`persoced`);
--
-- Filtros para la tabla `detacept`
--
ALTER TABLE `detacept`
ADD CONSTRAINT `detacept_ibfk_1` FOREIGN KEY (`aceptcod`) REFERENCES `tabacept` (`aceptcod`),
  ADD CONSTRAINT `detacept_ibfk_2` FOREIGN KEY (`persoced`) REFERENCES `tabperso` (`persoced`);
--
-- Filtros para la tabla `detcolab`
--
ALTER TABLE `detcolab`
ADD CONSTRAINT `detcolab_ibfk_1` FOREIGN KEY (`colabcod`) REFERENCES `tabcolab` (`colabcod`),
  ADD CONSTRAINT `detcolab_ibfk_2` FOREIGN KEY (`perscedi`) REFERENCES `tablpers` (`perscedi`);
--
-- Filtros para la tabla `detlaula`
--
ALTER TABLE `detlaula`
ADD CONSTRAINT `detlaula_ibfk_1` FOREIGN KEY (`aulacodg`) REFERENCES `tablaula` (`aulacodg`);
--
-- Filtros para la tabla `detmatnñ`
--
ALTER TABLE `detmatnñ`
ADD CONSTRAINT `detmatnñ_ibfk_1` FOREIGN KEY (`matcodig`) REFERENCES `tablamat` (`matcodig`),
  ADD CONSTRAINT `detmatnñ_ibfk_2` FOREIGN KEY (`nñcedesc`) REFERENCES `tablniño` (`nñcedesc`);
--
-- Filtros para la tabla `detmatpo`
--
ALTER TABLE `detmatpo`
ADD CONSTRAINT `detmatpo_ibfk_1` FOREIGN KEY (`matcodig`) REFERENCES `tablamat` (`matcodig`),
  ADD CONSTRAINT `detmatpo_ibfk_2` FOREIGN KEY (`persoced`) REFERENCES `tabperso` (`persoced`);
--
-- Filtros para la tabla `detreurp`
--
ALTER TABLE `detreurp`
ADD CONSTRAINT `detreurp_ibfk_1` FOREIGN KEY (`reuncodg`) REFERENCES `tablreun` (`reuncodg`),
  ADD CONSTRAINT `detreurp_ibfk_2` FOREIGN KEY (`repreced`) REFERENCES `tabrepre` (`repreced`);
--
-- Filtros para la tabla `tabacept`
--
ALTER TABLE `tabacept`
ADD CONSTRAINT `tabacept_ibfk_1` FOREIGN KEY (`colabcod`) REFERENCES `tabcolab` (`colabcod`);
--
-- Filtros para la tabla `tabantro`
--
ALTER TABLE `tabantro`
ADD CONSTRAINT `tabantro_ibfk_1` FOREIGN KEY (`clsccodg`) REFERENCES `tbcalesc` (`clsccodg`);
--
-- Filtros para la tabla `tabcolab`
--
ALTER TABLE `tabcolab`
ADD CONSTRAINT `tabcolab_ibfk_1` FOREIGN KEY (`invrcodg`) REFERENCES `tablinvr` (`invrcodg`);
--
-- Filtros para la tabla `tablamat`
--
ALTER TABLE `tablamat`
ADD CONSTRAINT `tablamat_ibfk_1` FOREIGN KEY (`aulacodg`) REFERENCES `tablaula` (`aulacodg`),
  ADD CONSTRAINT `tablamat_ibfk_2` FOREIGN KEY (`añsccodg`) REFERENCES `tbañoesc` (`añsccodg`);
--
-- Filtros para la tabla `tablbook`
--
ALTER TABLE `tablbook`
ADD CONSTRAINT `tablbook_ibfk_1` FOREIGN KEY (`persoced`) REFERENCES `tabperso` (`persoced`),
  ADD CONSTRAINT `tablbook_ibfk_2` FOREIGN KEY (`clsccodg`) REFERENCES `tbcalesc` (`clsccodg`);
--
-- Filtros para la tabla `tablestd`
--
ALTER TABLE `tablestd`
ADD CONSTRAINT `tablestd_ibfk_1` FOREIGN KEY (`paiscodg`) REFERENCES `tablpais` (`paiscodg`);
--
-- Filtros para la tabla `tablinvr`
--
ALTER TABLE `tablinvr`
ADD CONSTRAINT `tablinvr_ibfk_1` FOREIGN KEY (`aulacodg`) REFERENCES `tablaula` (`aulacodg`),
  ADD CONSTRAINT `tablinvr_ibfk_2` FOREIGN KEY (`catgcodg`) REFERENCES `tablcatg` (`catgcodg`);
--
-- Filtros para la tabla `tablniño`
--
ALTER TABLE `tablniño`
ADD CONSTRAINT `tablniño_ibfk_1` FOREIGN KEY (`parrqcod`) REFERENCES `tabparrq` (`parrqcod`);
--
-- Filtros para la tabla `tablpers`
--
ALTER TABLE `tablpers`
ADD CONSTRAINT `tablpers_ibfk_1` FOREIGN KEY (`parrqcod`) REFERENCES `tabparrq` (`parrqcod`);
--
-- Filtros para la tabla `tablreun`
--
ALTER TABLE `tablreun`
ADD CONSTRAINT `tablreun_ibfk_1` FOREIGN KEY (`clsccodg`) REFERENCES `tbcalesc` (`clsccodg`),
  ADD CONSTRAINT `tablreun_ibfk_2` FOREIGN KEY (`aulacodg`) REFERENCES `tablaula` (`aulacodg`);
--
-- Filtros para la tabla `tabluser`
--
ALTER TABLE `tabluser`
ADD CONSTRAINT `tabluser_ibfk_1` FOREIGN KEY (`perscedi`) REFERENCES `tablpers` (`perscedi`);
--
-- Filtros para la tabla `tabparez`
--
ALTER TABLE `tabparez`
ADD CONSTRAINT `tabparez_ibfk_1` FOREIGN KEY (`nñcedesc`) REFERENCES `tablniño` (`nñcedesc`),
  ADD CONSTRAINT `tabparez_ibfk_2` FOREIGN KEY (`perscedi`) REFERENCES `tablpers` (`perscedi`);
--
-- Filtros para la tabla `tabparrq`
--
ALTER TABLE `tabparrq`
ADD CONSTRAINT `tabparrq_ibfk_1` FOREIGN KEY (`ciudadcd`) REFERENCES `tdciudad` (`ciudadcd`);
--
-- Filtros para la tabla `tabperso`
--
ALTER TABLE `tabperso`
ADD CONSTRAINT `tabperso_ibfk_1` FOREIGN KEY (`perscedi`) REFERENCES `tablpers` (`perscedi`),
  ADD CONSTRAINT `tabperso_ibfk_2` FOREIGN KEY (`cargcodg`) REFERENCES `tblcargo` (`cargcodg`);
--
-- Filtros para la tabla `tabrepre`
--
ALTER TABLE `tabrepre`
ADD CONSTRAINT `tabrepre_ibfk_1` FOREIGN KEY (`perscedi`) REFERENCES `tablpers` (`perscedi`);
--
-- Filtros para la tabla `tbcalesc`
--
ALTER TABLE `tbcalesc`
ADD CONSTRAINT `tbcalesc_ibfk_1` FOREIGN KEY (`añsccodg`) REFERENCES `tbañoesc` (`añsccodg`);
--
-- Filtros para la tabla `tbconast`
--
ALTER TABLE `tbconast`
ADD CONSTRAINT `tbconast_ibfk_1` FOREIGN KEY (`clsccodg`) REFERENCES `tbcalesc` (`clsccodg`),
  ADD CONSTRAINT `tbconast_ibfk_2` FOREIGN KEY (`matcodig`) REFERENCES `tablamat` (`matcodig`);
--
-- Filtros para la tabla `tbcroact`
--
ALTER TABLE `tbcroact`
ADD CONSTRAINT `tbcroact_ibfk_1` FOREIGN KEY (`clsccodg`) REFERENCES `tbcalesc` (`clsccodg`);
--
-- Filtros para la tabla `tbniñosa`
--
ALTER TABLE `tbniñosa`
ADD CONSTRAINT `tbniñosa_ibfk_1` FOREIGN KEY (`nñcedesc`) REFERENCES `tablniño` (`nñcedesc`);
--
-- Filtros para la tabla `tdciudad`
--
ALTER TABLE `tdciudad`
ADD CONSTRAINT `tdciudad_ibfk_1` FOREIGN KEY (`muncpcod`) REFERENCES `tdmuncip` (`muncpcod`);
--
-- Filtros para la tabla `tdmuncip`
--
ALTER TABLE `tdmuncip`
ADD CONSTRAINT `tdmuncip_ibfk_1` FOREIGN KEY (`estdcodg`) REFERENCES `tablestd` (`estdcodg`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;