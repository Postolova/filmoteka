<h1 class="title-1"> Фильмотека</h1>

      <?php foreach($films as $key => $value) { ?>

          <div class="card mb-20">
            <div class="card-header">
              <h4 class="title-4"><?=$films[$key]['title']?></h4>
              <div>
              <a href="edit.php?id=<?=$films[$key]['id']?>" class="button button--edit">Редактировать</a>
              <a href="?action=delete&id=<?=$films[$key]['id']?>" class="button button--delete">Удалить</a>
              </div>
            </div>
            <div class="badge"><?=$films[$key]['genre']?></div>
            <div class="badge"><?=$films[$key]['year']?></div>
          </div>

      <?php } ?>