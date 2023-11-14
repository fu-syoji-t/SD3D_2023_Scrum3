<?php
require_once "../!Mng/DBManager.php";
$get = new DBManager();

$posts = $get->get_all_posts();

foreach ($posts as $post) {
    // 記事が「海外」カテゴリーに属しているか確認
    if ($post["user_id"] == $post["post_id"]) 
        echo '<div class="box">
        <h2>
          <a href="hometown_detail.php?post=' . $post["post_id"] . '">' . $post["place"] . '</a>
          <span class="date">(' . date('Y.m.d', strtotime($post["date"])) . ')</span>
        </h2>';
        if (isset($post["first_image"])) {
            echo
                '<p class="box_img">
            <img src="' . $post["first_image"] . '" alt="サムネイル" width="150" height="150">
          </p>';
        }
        echo
            '<div class="box_sentence">
          <p>
            ' . $post["text"] . '…
            <a href="hometown_detail.php?post=' . $post["post_id"] . '">続きを読む</a>
          </p>
        </div>
      </div>';
    }
?>