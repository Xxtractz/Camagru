<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
  $db = new PDO("mysql:host=localhost", "root", "123456");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(PDOException $e){
  die($e->getMessage());
}

$db_name = "CREATE DATABASE IF NOT EXISTS `camagru`";

$user = "CREATE TABLE `users` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `acl` int(11) DEFAULT NULL,
  `verify` int(255) NOT NULL DEFAULT '0',
  `confirm_code` varchar(255) NOT NULL,
  `notify` int(150) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$com = "CREATE TABLE `comment` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `comment` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$img ="CREATE TABLE `images` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_like` int(255) NOT NULL DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8";


$ss ="CREATE TABLE `user_sessions` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$db->exec($db_name);
$db->exec('USE camagru');
$db->exec($com);
$db->exec($user);
$db->exec($img);
$db->exec($ss);

echo "Installation Complete";
$db = null;
?>