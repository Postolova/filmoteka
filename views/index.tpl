<h1 class="title-1"> Фильмотека</h1>

      <?php foreach($films as $key => $value) { ?>

          <div class="card mb-20">
            <div class="row">
              <div class="col-auto">
                <?php if ( $films[$key]['photo'] == '') { ?>
                <img width="137" src="<?=HOST . 'data/films/nophoto.jpg'?>" alt="<?=$films[$key]['title']?>">
                <?php } else { ?>
                <img height="200" src="<?=HOST . 'data/films/min/' . $films[$key]['photo']?>" alt="<?=$films[$key]['title']?>">
                 <?php } ?>
              </div>
              <div class="col">
                <div class="card-header">
                  <h4 class="title-4"><?=$films[$key]['title']?></h4>
                <div>

                <?php 
                  if ( isset($_SESSION['user']) ) {
                      if( $_SESSION['user'] == 'admin') { 
                  ?>
                    <a href="edit.php?id=<?=$films[$key]['id']?>" class="button button--edit">Редактировать</a>
                    <a href="?action=delete&id=<?=$films[$key]['id']?>" class="button button--delete">Удалить</a>
                  <?php 
                      }
                  }
                ?>
                </div>
                </div>
                <div class="badge"><?=$films[$key]['genre']?></div>
                <div class="badge"><?=$films[$key]['year']?></div>
                <div class="mt-20">
                  <a href="single.php?id=<?=$films[$key]['id']?>" class="button">Подробнее</a>
                </div>
              </div>
            </div>
          </div>

      <?php } ?>