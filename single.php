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

  if ( $resault ) {
    $resaultInfo = "<p>Фильм успешно удален!</p>";
  } else {
    $resaultInfo = "<p>Упс. Что-то пошло не так.</p>";
  }
}

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/film-single.tpl');
include('views/footer.tpl');