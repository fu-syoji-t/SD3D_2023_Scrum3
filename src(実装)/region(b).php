<?php
require_once "DBManager.php";
$get = new DBManager();

require_once "tmp_test.php";
// $template = new header("Category");

$posts = $get->get_all_post();

$region_id = $_GET["post"];
    $post = $get->get_post($region_id);
?>
<html>
<!-- 地域別投稿表示画面(バック) -->
    <head>
        <title>地域別投稿</title>
    </head>
    <body>
    <input type="button" onclick="history.back()" value="戻る"><br>"
        <?php
        if (isset($_GET["parameter"])) {
            $selectedParameter = $_GET["parameter"];
            // パラメータに基づいて異なるコンテンツを表示
            switch ($selectedParameter) {
                case "1":
                    echo "<h1>北海道地方</h1>";
                    $query = "SELECT * FROM posts WHERE region_id = 1";
                    $result = $PDO->query($query);
        // 外部キー結合をする
                        echo 'post_id : ';
                        echo $post["post_id"].'<br>';
                    
                        echo 'datetime : ';
                        echo $post["date"]."<br>";
                    
                        echo 'title : ';
                        echo $post["title"]."<br>";
                    
                        echo 'region : ';
                        echo $post["region"][1]."<br>";
                    
                        echo 'place : ';
                        echo $post["place"]."<br>";
                    
                        echo 'youtube : <br>';
                        echo '<div>'.$post["link_path"]."</div><br>";
                        
                        echo 'freespace : <br>';
                        echo $post["text"]."<br>";
                    
                        $spot_limit = 4;
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
                    break;
                case "2":
                    echo "<h1>東北地方</h1>";
                    break;
                case "3":
                    echo "<h1>関東地方</h1>";
                    break;
                case "4":
                    echo "<h1>中部地方</h1>";
                    break;
                case "5":
                    echo "<h1>近畿地方</h1>";
                    break;
                case "6":
                    echo "<h1>中国地方</h1>";
                    break;
                case "7":
                    echo "<h1>四国地方</h1>";
                    break;
                case "8":
                    echo "<h1>九州地方</h1>";
                    break;
                case "9":
                    echo "<h1>海外</h1>";
                    break;
                default:
                    echo "<h1>404 Error<br>このページは存在しません</h1>";
                    echo "<img src='image/404.jpg' alt='404 Eroor'>";
            }
        } else {
            echo "<h1>不正な操作です。</h1>";
        }
        ?>
    </body>
</html>