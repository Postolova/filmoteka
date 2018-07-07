<?php
// connect db
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-function.php');

if ( array_key_exists('add-film', $_POST) ) {
	if ( $_POST['title'] == '' ) {
		$errors[] = "<p>Необходимо ввести название фильма.</p>";
	}
	if ( $_POST['genre'] == '' ) {
		$errors[] = "<p>Необходимо ввести жанр фильма.</p>";
	}
	if ( $_POST['year'] == '' ) {
		$errors[] = "<p>Необходимо ввести год фильма.</p>";
	}

	if ( empty($errors) ) {

		$result = film_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
		
		if ( $result ) {
			$lastId = mysqli_insert_id($link);
			header("Location: http://".$_SERVER['HTTP_HOST']."/edit.php?id=".$lastId);
			$resultSuccess = '<div class="info-success"><p>Фильм успешно добавлен!</p></div>';
			$_SESSION['resultSuccess'] = $resultSuccess;
		} else {
			$resultSuccess = "<p>Упс. Что-то пошло не так.</p>";
		}
	}

}



include('views/head.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');

?>