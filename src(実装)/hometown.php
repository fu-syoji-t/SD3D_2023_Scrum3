<?php
    require_once "tmp_test.php";
    require_once "DBManager.php";

    $template = new Template();
    $get = new DBManager();
    
    $template->head("hometown");
    $template->header();

    $posts = $get->get_all_post();

    foreach($posts as $post){
        echo '----------------------------------------------------------------------------------------------------<br>';
        echo '<a href="hometown_detail.php?post='.$post["post_id"].'">'.$post["place"].'</a>　　　';
        echo $post["date"].'<br>';
        if(isset($post["first_image"])){
            echo '<img width=560 src="'.$post["first_image"].'"><br>';
        }
        echo '<div style="width:560px">'.$post["text"].'</div>';
        echo '----------------------------------------------------------------------------------------------------<br>';
    }
?>

    <button onclick="location.href='post.php'" style="width: 100%; height:50px; margin-bottom: 50px">
        投稿する
    </button>
</body>

</html>