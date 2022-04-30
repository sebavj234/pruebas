
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `esquemaprueba1`
--
CREATE DATABASE IF NOT EXISTS `esquemaprueba1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `esquemaprueba1`;

-- --------------------------------------------------------

--
-- Table structure for table `tablaresultados`
--

CREATE TABLE `tablaresultados` (
  `id_resultado` int(11) NOT NULL,
  `str_nombre` varchar(50) NOT NULL,
  `f_valorhora` float NOT NULL,
  `i_horascontrato` int(11) NOT NULL,
  `i_diastrabajados` int(11) NOT NULL,
  `i_horasausencia` int(11) NOT NULL,
  `i_minutosausencia` int(11) NOT NULL,
  `i_valorsueldobase` int(11) NOT NULL,
  `dt_fecharegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tablaresultados`
--
ALTER TABLE `tablaresultados`
  ADD PRIMARY KEY (`id_resultado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tablaresultados`
--
ALTER TABLE `tablaresultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
