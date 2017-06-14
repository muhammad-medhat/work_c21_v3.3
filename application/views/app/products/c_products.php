          
          <?php foreach ($products as $p) {?>

          <button class='product' data-id='<?=$p->id?>' data-price=<?=$p->price?>>
                  <div class='title' >
                     <?=$p->arabic?>
                  </div>
              </button>
            <?php } ?>


