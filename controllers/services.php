<?php

require_once 'C:\xampp\htdocs\messageApp\models\Database.php';
require_once 'C:\xampp\htdocs\messageApp\models\User.php';
require_once 'C:\xampp\htdocs\messageApp\models\Group.php';
require_once 'C:\xampp\htdocs\messageApp\models\Message.php';
// require_once './messageController.php';

// Instancier la classe Database
$database = new Database();
$connection = $database->getConnection();
$userBD = new User($connection);
$groupBD = new Group($connection);
$messageDB = new Message($connection);
