CREATE TABLE `admins` (
  `Id` int(11) NOT NULL primary key AUTO_INCREMENT,
  `AdminId` varchar(60) NOT NULL UNIQUE KEY,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ProfileImage` varchar(255) DEFAULT NULL,
  `PermissionLevel` int(3) DEFAULT 10,
  `RegistrationDate` date
)