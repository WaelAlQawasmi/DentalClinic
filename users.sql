CREATE TABLE IF NOT EXISTS `dcteam_dcteam`.`users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(70) NOT NULL,
  `last_sctivity` varchar(70) NOT NULL,
    PRIMARY KEY  (`id`)
  );
