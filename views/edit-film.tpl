<?php if ($resaultSuccess != '') { ?>
	<div class="info-success"><?=$resaultSuccess?></div>
<?php } ?>

<?php if ($resaultInfo != '') { ?>
	<div class="info-notification"><?=$resaultInfo?></div>
<?php } ?>

<?php if ($resaultError != '') { ?>
	<div class="error"><?=$resaultError?></div>
<?php } ?>

<h1 class="title-1">Редактировать фильм</h1>

<div class="panel-holder mt-30 mb-40">
        <form action="edit.php?id=<?=$film['id']?>" method="POST">
          <?php
	          if ( !empty($errors) ) {
	            foreach ($errors as $key => $value) {
	              echo "<div class='error'>$value</div>";
	            }
	          }
          ?>
          <label class="label-title">Название фильма</label>
          <input class="input" type="text" placeholder="Такси 2" name="title" value="<?=$film['title']?>"/>
          <div class="row">
            <div class="col">
              <label class="label-title">Жанр</label>
              <input class="input" type="text" placeholder="комедия" name="genre" value="<?=$film['genre']?>"/>
            </div>
            <div class="col">
              <label class="label-title">Год</label>
              <input class="input" type="text" placeholder="2000" name="year" value="<?=$film['year']?>"/>
            </div>
          </div>
          <input type="submit" class="button" value="Сохранить" name="update-film">
        </form>
      </div>