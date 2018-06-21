<?php
require('config.php');
require('functions/login-function.php');
require('database.php');
$link = db_connect();


if ( isset($_POST['enter']) ) {
	$query = "SELECT * FROM `user`";
	$resault = mysqli_query($link, $query);

	if ( $resault = mysqli_query($link, $query) ) {
		$user = mysqli_fetch_array($resault);
	}

	// $userName = 'admin';
	// $userPassword = "123";

	if ( $_POST['login'] == $user['userlogin'] ) {
		if ( $_POST['password'] == $user['userpassword'] ) {

			$_SESSION['user'] = 'admin';
			header('Location:' . HOST . 'index.php');
		}
	}
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');


?>