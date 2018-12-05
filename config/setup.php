<?php 
try{
  $db = new PDO("mysql:host=localhost", "root", "123456");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(PDOException $e){
  die($e->getMessage());
}

$db_name = "CREATE DATABASE IF NOT EXISTS `camagru`";

$user = "CREATE TABLE camagru.users (
  `id` int(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `acl` int(11) DEFAULT NULL,
  `confirm` varchar(255) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `notify` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$img ="CREATE TABLE camagru.images (
  `id` int(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8";


$ss ="CREATE TABLE camagru.user_sessions (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$db->query($db_name);
$db->query($user);
$db->query($img);
$db->query($ss);

echo "Installation Complete";