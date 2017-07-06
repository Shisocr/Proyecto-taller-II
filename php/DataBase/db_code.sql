-----------------------------
--- CREATING USERS TABLE  ---
-----------------------------


    CREATE TABLE `ia_users` (
  `ID` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_name` VARCHAR(100) NOT NULL,
  `user_lastname` VARCHAR(100) NOT NULL,
  `user_birthdate` date,
  `user_sex` tinyint(1),
  `user_email` varchar(100) NOT NULL UNIQUE,
  `user_telephone` int(50),
  `user_login` varchar(50) NOT NULL UNIQUE,
  `user_password` varchar(50) NOT NULL,
  `user_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` INT DEFAULT 1    
) ENGINE = InnoDB DEFAULT CHARSET = UTF8;
