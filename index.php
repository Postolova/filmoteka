<?php
// connect db
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-function.php');

if ( @$_GET['action'] == 'delete') {
	$resault = film_delete($link, $_GET['id']);

	if ( $resault ) {
		$resaultInfo = "<p>Фильм успешно удален!</p>";
	} else {
		$resaultInfo = "<p>Упс. Что-то пошло не так.</p>";
	}
}

$films = films_all($link);

include('views/head.tpl');
include('views/index.tpl');
include('views/footer.tpl');
