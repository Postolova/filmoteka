<?php
// getting all films from db
function films_all($link){
	$query = "SELECT * FROM `filmoteka`";
	$films = array();
	$resault = mysqli_query($link, $query);
	if ( $resault = mysqli_query($link, $query) ) {
	while ( $row = mysqli_fetch_array($resault) ) {
	  $films[] = $row;
	  }
	}
	return $films;
}


function film_new($link, $title, $genre, $year){

	if ( empty($errors) ) {
	$query = "INSERT INTO `filmoteka` (`title`, `genre`, `year`) VALUES (
	  '". mysqli_real_escape_string($link, $_POST['title']) ."',
	  '". mysqli_real_escape_string($link, $_POST['genre']) ."',
	  '". mysqli_real_escape_string($link, $_POST['year']) ."'
	)";

	if ( mysqli_query($link, $query) ) {
		$resault = true;
	} else {
		$resault = false;
	}

	return $resault;
	}
}

function get_film($link, $id){
	$query = "SELECT * FROM `filmoteka` WHERE id='".mysqli_real_escape_string($link, $id)."' LIMIT 1";

	$resault = mysqli_query($link, $query);

	if ( $resault = mysqli_query($link, $query) ) {
		$film = mysqli_fetch_array($resault);
	}

	return $film;
}


function film_update($link, $title, $genre, $year, $id){

	   $query = "UPDATE `filmoteka` 
	               SET title = '". mysqli_real_escape_string($link, $title) ."', 
	                   genre = '". mysqli_real_escape_string($link, $genre) ."', 
	                   year = '". mysqli_real_escape_string($link, $year) ."'
	                   WHERE id = '". mysqli_real_escape_string($link, $id) ."' LIMIT 1";
 
		if ( mysqli_query($link, $query) ) {
			$resault = true;
		} else {
			$resaultError = fales;
		}

		return $resault;
}

function film_delete($link, $id){
  	$query = "DELETE FROM `filmoteka` WHERE id = '".mysqli_real_escape_string($link, $id)."' LIMIT 1";

	mysqli_query($link, $query);

	if ( mysqli_affected_rows($link) > 0) {
		$resault = true;
	} else {
		$resault = false;
	}
	return $resault;
}


?>