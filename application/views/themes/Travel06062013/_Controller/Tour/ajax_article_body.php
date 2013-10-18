            <?php
              if(!empty($article)){
            ?>
            <h2 class="head_title"><?php echo $article["title"];?></h2>
              <div class="row">
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][0])){
                    echo $article['body_column'][0];
                  }
                  ?>
                </div>
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][1])){
                    echo $article['body_column'][1];
                  }
                  ?>
                </div>
                <div class="four columns">
                  <?php
                  if(! empty($article['body_column'][2])){
                    echo $article['body_column'][2];
                  }
                  ?>
                </div>
              </div>
            <?php
            }
            ?>