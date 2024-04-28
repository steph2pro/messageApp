<?php

require_once './models/Database.php';
require_once './models/User.php';
require_once './models/Group.php';
// Instancier la classe Database
$database = new Database();
$connection = $database->getConnection();
$userBD= new User($connection);
$groupBD= new Group($connection);