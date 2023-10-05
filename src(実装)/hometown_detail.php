<?php
    require_once "DBManager.php";
    $get = new DBManager();

    $max_post_id = $get->max_post_id();
    $post = $get->get_post($max_post_id);
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>youtube_display_test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body>

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

        echo '<br>[spot'.$i.']<br>';

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