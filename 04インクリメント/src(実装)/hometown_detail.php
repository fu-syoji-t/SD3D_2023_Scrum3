<?php
    require_once "DBManager.php";
    $get = new DBManager();

    $post_id = $_GET["post"];
    $post = $get->get_post($post_id);

    require_once "index.php";
    $template = new header("hometown_detail");
?>

    <input type="button" onclick="history.back()" value="戻る"><br>
    
    <?php
    echo 'post_id : ';
    echo $post["post_id"].'<br>';

    echo 'datetime : ';
    echo $post["date"]."<br>";

    echo 'title : ';
    echo $post["title"]."<br>";

    echo 'region : ';
    echo $post["region"][0]."<br>";

    echo 'place : ';
    echo $post["place"]."<br>";

    echo 'youtube : <br>';
    echo '<div>'.$post["link_path"]."</div><br>";
    
    echo 'freespace : <br>';
    echo $post["text"]."<br>";

    $spot_limit = 4; // 投稿内のスポット数の上限
    for($i = 1; $i <= $spot_limit; $i++) {
        echo '----------------------------------------------------------------------------------------------------<br>';
        echo '[spot'.$i.']<br>';

        if(isset($post["images"])){
            foreach($post["images"] as $image){
                if($image["image_order"] == $i){
                    echo '<img src="'.$image["path"].'" width=560>';
                }
            }
        }

        if(isset($post["sentences"])){
            foreach($post["sentences"] as $sentence){
                if($sentence["sentence_order"] == $i){
                    echo $sentence["sentence"];
                }
            }
        }

        echo '<br>';

    }

    ?>
</body>

</html>