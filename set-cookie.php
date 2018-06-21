<?php
require('config.php');

if ( isset($_POST['user-submit']) ) {
	$userName = $_POST['user-name'];
	$userCity = $_POST['user-city'];
	$expire = 60*60*24*30;
	setcookie('user-name', $userName, time() + $expire );
	setcookie('user-city', $userCity, time() + $expire );
}

header('Location:' . HOST . 'request.php');