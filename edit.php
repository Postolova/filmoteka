<?php
// connect db
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-function.php');

$film = get_film($link, $_GET['id']);

if ( array_key_exists('update-film', $_POST) ) {

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
    $result = film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $_GET['id'], @$_POST['deleteImg'], $film['photo']);

    if ( $result ) {
      $resultSuccess = "<p>Фильм был успешно обновлен!</p>";
    } else {
      $resultSuccess = "<p>Упс. Что-то пошло не так.</p>";
    }
  }

}

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>