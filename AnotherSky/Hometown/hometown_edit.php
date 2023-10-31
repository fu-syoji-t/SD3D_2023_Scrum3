<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
        body {
            background-color: #DDDDDD;
            font-family: 'Sacramento', cursive;
            font-family: "Kokoro";
        }
        .center {
            text-align: center;
        }
        .inputa {
            text-align: center;
            margin-top: 10%;
            margin-left: 10%;
            margin-right: 10%;
            border-radius: 20% 20% 20% 20%;
            background-color: #999999;
            padding: 0.5em;
            border-radius: 1.5em;
        }
        .input {
            text-align: center;
            margin-top: 10%;
            margin-left: 10%;
            margin-right: 10%;
            border-radius: 20% 20% 20% 20%;
            background-color: #999999;
            padding: 0.5em;
            border-radius: 1.5em;
            display: none;
        }
        h1 {
            margin-bottom: 10%;
            font-family: 'Sacramento', cursive;
        }
        .subu {
            background-color: #999999;
            font-size: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            position: relative;
            margin-bottom: auto;
            border-radius: 50vh;
        }
        .maru {
            border-radius: 1.5em;
            padding: 5%; /* テキストと枠線の間の余白を指定 */
        }
        .maro{
            border: 2px solid #000; /* 枠線の太さと色を指定 */
            padding: 5%; /* テキストと枠線の間の余白を指定 */
            border-radius: 1.5em;
            margin-bottom: 10%;
        }
    </style>

    <?php  require_once '../!Mng/header.php' ?>
    <?php
// edit_post.php

require_once '../!Mng/DBManager.php';

if (isset($_GET["post"])) {
    $post_id = $_GET["post"];
    $dbManager = new DBManager();
    $post = $dbManager->get_post_for_edit($post_id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $post_id = $_POST["post_id"];
        $title = $_POST["title"];
        $region = $_POST["region"];
        $place = $_POST["place"];
        $link = $_POST["link_path"];
        $text = $_POST["text"];
    
        // 修正: UPDATE クエリを実行
        $result = $dbManager->updatePost($post_id, $title, $region, $place, $link, $text);
    
        if ($result) {
            echo "投稿が更新されました。";
        } else {
            echo "更新に失敗しました。";
        }
    }
}
    ?>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post["title"]); ?>">

    <label for="region">Region:</label>
    <select id="region" name="region">
        <option value="1" <?php if ($post["region_id"] == 1) echo 'selected'; ?>>北海道</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>東北</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>関東</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>中部</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>近畿</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>中国</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>四国</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>九州</option>
        <option value="2" <?php if ($post["region_id"] == 2) echo 'selected'; ?>>海外</option>
    </select>
    <label for="place">Place:</label>
    <input type="text" id="place" name="place" value="<?php echo htmlspecialchars($post["place"]); ?>">

    <label for="youtube">YouTube Link:</label>
    <input type="text" id="youtube" name="youtube" value="<?php echo htmlspecialchars($post["link_path"]); ?>">

    <label for="freespace">Free Space:</label>
    <input type="text" id="freespace" name="freespace" value="<?php echo htmlspecialchars($post["text"]); ?>">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_post"])) {
            $title = $_POST["title"];
            $region = $_POST["region"];
            $place = $_POST["place"];
            $youtube = $_POST["youtube"];
            $freespace = $_POST["freespace"];

            // DBManager クラスの updatePost メソッドを呼び出して投稿を更新
            $dbManager = new DBManager();
            if ($dbManager->updatePost($post_id, $title, $region, $place, $youtube, $freespace)) {
                echo "投稿が更新されました。";
            } else {
                echo "更新に失敗しました。";
            }
        }
    ?>



    <?php
            /*echo'<div class="center">';
            echo'<h1>post</h1>';*/
            echo'<form action="post(b).php" method="post" enctype="multipart/form-data">';

            /*echo ' <br>';
            echo '<div class="maru"> ';
            echo $post["date"]."<br>";

            echo ' <br>';
            echo 'title <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["title"]) . '"><br>';

            
            echo ' <br>';
            echo'<div class="center">
            <select name="region">
                    <option value=1>北海道</option>
                    <option value=2>東北</option>
                    <option value=3>関東</option>
                    <option value=4>中部</option>
                    <option value=5>近畿</option>
                    <option value=6>中国</option>
                    <option value=7>四国</option>
                    <option value=8>九州</option>
                    <option value=9>海外</option>
                 </select><br>
                 </div>';


            echo ' <br>';
            echo 'place <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["place"]) . '"><br>';

            echo ' <br>';
            echo 'youtube <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["link_path"]) . '"><br>';

            echo ' <br>';
            echo 'freespace <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["text"]) . '"><br>';*/
    ?>
    </div>
    <div style="width: 100%; background-color: #bbb;text-align: center; margin-top: 10%;">
        <button type="button" class="more" id="more">+</button>
    </div>
        <div class="center">
        <input type="submit" name="update_post" value="更新">
        <input type="submit" name="update_post['title'.'region''place''link''text'] value='おおお'">
        <!--<a href='../AnotherSky/k.php'><input type='submit'name='action' value='更新'style='color: white;color:black;'></a>-->
       <!--<button type="submit">更新を確定</button>-->
    </div>
</body>
</html>