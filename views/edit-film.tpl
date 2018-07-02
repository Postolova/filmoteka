<h1 class="title-1">Редактировать фильм</h1>
<?php 
echo @$_SESSION['resultSuccess'];
if ( @$_SESSION['resultSuccess'] != '' ) {
unset($_SESSION['resultSuccess']);
}
?>
<div class="panel-holder mt-30 mb-40">
        <form enctype="multipart/form-data" action="edit.php?id=<?=$film['id']?>" method="POST">
          <?php
	          if ( !empty($errors) ) {
	            foreach ($errors as $key => $value) {
	              echo "<div class='error'>$value</div>";
	            }
	          }

          ?>
          <label class="label-title">Название фильма</label>

          <input class="input" type="text" placeholder="Такси 2" name="title" value="<?=($_POST) ? $_POST['title'] : $film['title']?>"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="комедия" name="genre" value="<?=($_POST) ? $_POST['genre'] : $film['genre']?>"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="2000" name="year" value="<?=($_POST) ? $_POST['year'] : $film['year']?>"/>
            </div>
          </div>
          <textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"><?=($_POST) ? $_POST['description'] : $film['description']?></textarea>
          <div class="mb-20">
          <input type="file" name="photo" value="текст">
          </div>

          <div class="file-upload mt-20">

            <?php if ( $film['photo'] == '') { ?>
                 <img width="137" src="<?=HOST?>data/films/nophoto.jpg?>" alt="<?=$film['title']?>">
                <?php } else { ?>
                  <img src="<?=HOST . 'data/films/min/' . $film['photo']?>">            
                  <label for="deleteImg" class="button button--delete">Удалить</label>
                  <input id="deleteImg" type="checkbox" name="deleteImg">
                 <?php } ?>

            <div class="deletetitle mt-10">Нажмите "Сохранить", чтобы удалить фотографию</div>
              
          </div>

          <input type="submit" class="button mt-30" value="Сохранить" name="update-film">
        </form>
        
      </div>