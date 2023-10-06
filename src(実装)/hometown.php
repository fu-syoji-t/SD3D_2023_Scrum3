hometown<br>
<?php
    require_once "DBManager.php";
    $get = new DBManager();

    $posts = $get->get_all_post();

    foreach($posts as $post){
        echo '<a href="hometown_detail.php?post='.$post["post_id"].'">'.$post["place"].'</a>　　　';
        echo $post["date"].'<br>';
        if(isset($post["first_image"])){
            echo '<img width=560 src="'.$post["first_image"].'"><br>';
        }
        echo '<div style="width:560px">'.$post["text"].'</div>';
    }
?>