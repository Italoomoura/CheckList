CREATE DATABASE db_contact;

CREATE TABLE `db_contact`.`accounts` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(255) NOT NULL,
 `username` varchar(50) NOT NULL,
 `password` varchar(255) NOT NULL,
 PRIMARY KEY (`id`),
 FULLTEXT KEY `username` (`username`),
 FULLTEXT KEY `username_2` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

CREATE TABLE `db_contact`.`checklist` (
 `Id` int(11) NOT NULL AUTO_INCREMENT,
 `EmpilhadeiraNumero` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Turno` varchar(255) CHARACTER SET utf8 NOT NULL,
 `OperadorResponsavel` varchar(255) CHARACTER SET utf8 NOT NULL,
 `HorimetroInicial` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Sinaleiro` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Extintor` varchar(255) CHARACTER SET utf8 NOT NULL,
 `CintodeSeguranca` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Buzina` varchar(255) CHARACTER SET utf8 NOT NULL,
 `NiveldeOleodoMotor` varchar(255) CHARACTER SET utf8 NOT NULL,
 `NiveldeAguadoRadiador` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Pintura` varchar(255) CHARACTER SET utf8 NOT NULL,
 `TravadoCilindrodeGas` varchar(255) CHARACTER SET utf8 NOT NULL,
 `AlinhamentodosGarfos` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Banco` varchar(255) CHARACTER SET utf8 NOT NULL,
 `ChaveFrenteRe` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Mangueiras` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Correntes` varchar(255) CHARACTER SET utf8 NOT NULL,
 `EstruturasdaMaquina` varchar(255) CHARACTER SET utf8 NOT NULL,
 `ChecarAnormalidade` varchar(255) CHARACTER SET utf8 NOT NULL,
 `LimpezadoEquipamento` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Direcao` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Aceleracao` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Freio` varchar(255) CHARACTER SET utf8 NOT NULL,
 `FuncaoHidraulica` varchar(255) CHARACTER SET utf8 NOT NULL,
 `BarulhosAnormais` varchar(255) CHARACTER SET utf8 NOT NULL,
 `Observacoes` varchar(255) CHARACTER SET utf8 NOT NULL,
 `data` varchar(255) CHARACTER SET utf8 NOT NULL,
 PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;