<?php
$table = file_get_contents('users.sql'); // read sql file that create table






$conn = new mysqli("127.0.0.1", "root", "");// connect to server
$DB="CREATE DATABASE IF NOT EXISTS `dcteam_dcteam`;"; //// create db
$createDB=$conn->query($DB) ;//connect db
$table_connect=$conn->query($table) ;// connect table to db
$conn = new mysqli("127.0.0.1", "root" ,"","dcteam_dcteam");// new connection


 $sql2=" INSERT INTO `users` (`id`,`password`, `email`, `username`) VALUES
(1, '2016', 'wael', 'dcteam');";
$conn->query($sql2) ; // add user
?>