<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color: #DDDDDD;
        }
        .c{
            margin-top: 100px;
            margin-bottom: auto;
            font-size: 200%;
            text-align: center;
        }
    </style>
<?php
    require_once "header.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_id"])) {
        $post_id = $_POST["post_id"];
    
        // DBManagerクラスをインクルード
        require_once "DBManager.php";
    
        // DBManagerのインスタンスを作成
        $dbManager = new DBManager();
    
        // 投稿を削除
        $success = $dbManager->delete_post($post_id);
    
        if ($success) {
            // 投稿が正常に削除されました
            echo "<div class='c'</div>";
            echo "投稿が削除されました。<a href='../AnotherSky/hometown.php'><input type='button' value='hometown'style='color: white;color:black;'></a>";
        } else {
            // 削除中にエラーが発生しました
            echo "エラー：投稿を削除できませんでした。";
        }
    }
  ?>
  <?php
    require_once "footer.php";
  ?>
    <!--<input class="" type="button" onclick="history.back()" value="⬅︎"><br><br>-->
</body>
</html>