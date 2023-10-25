<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    更新しました
    <?php
    require_once "DBManager.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $post_id = $_POST["post_id"]; // フォーム内に post_id の入力フィールドを追加します
        $title = $_POST["title"];
        $region = $_POST["region"];
        $place = $_POST["place"];
        $link_path = $_POST["link_path"];
        $text = $_POST["text"];

        
        // DBManagerクラスを使用してデータベース内のポストを更新
        $dbManager = new DBManager();
        $success = $dbManager->update_post($post_id, $title, $region, $place, $link_path, $text);
        
        if ($success) {
            echo "ポストが正常に更新されました！";
        } else {
            echo "ポストの更新中にエラーが発生しました。";
        }
    } else {
        echo "無効なリクエストです。";
    }
    ?>
    <a href='../AnotherSky/hometown.php'><input type='button' value='hometown'style='color: white;color:black;'></a>";
</body>
</html>