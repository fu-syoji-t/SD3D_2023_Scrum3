<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    // 'YOUR_USER_ID' の部分を実際の user_id に置き換えてください
    $user_id = '1';

    $posts = array_reverse($get->get_posts_by_user_id($user_id));

    foreach($posts as $post){
        echo '<div class="box">
        <h2>
          <a href="hometown_detail.php?post='.$post["post_id"].'">'.$post["place"].'</a>
          <span class="date">('.date('Y.m.d',strtotime($post["date"])).')</span>
        </h2>';
        if(isset($post["first_image"])){
          echo 
          '<p class="box_img">
            <img src="'.$post["first_image"].'" alt="Thumbnail" width="150" height="150">
          </p>';
        }
        echo 
        '<div class="box_sentence">
          <p>
            '.$post["text"].'…
            <a href="hometown_detail.php?post='.$post["post_id"].'">続きを読む</a>
          </p>
        </div>
      </div>';
    }
?>
