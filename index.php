<?php
// connect db
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-function.php');

if ( @$_GET['action'] == 'delete') {

	$film = get_film($link, $_GET['id']);

	$result = film_delete($link, $_GET['id'], $film['photo']);

	if ( $result ) {
		$resultInfo = "<p>Фильм успешно удален!</p>";
	} else {
		$resultInfo = "<p>Упс. Что-то пошло не так.</p>";
	}
}

$films = films_all($link);

include('views/head.tpl');
include('views/index.tpl');
include('views/footer.tpl');
