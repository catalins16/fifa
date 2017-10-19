<?php 
ob_start(); 
session_start();

//$_SESSION['user_id'] = 'csmarand';
//$_SESSION['company'] = 'SPR';
//$_SESSION['auth_passMD5'] = 'bed128365216c019988915ed3add75fb';

require_once 'connect/database.php';
require_once 'classes/users.php';
require_once 'classes/general.php';

$users 		= new Users($db);
$general 	= new General();

$errors = array();