<?php
    require_once "../!Mng/DBManager.php";
    $update = new DBManager();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_id"])) {
        // フォームから現在の投稿を取得
        $post_id = $_POST["post_id"];
        $title = $_POST["title"];
        $region = $_POST["region"];
        $place = $_POST["place"];
        $youtube = $_POST["youtube"];
        $freespace = $_POST["freespace"];
        



        // 投稿を更新
        $success = $update->updatePost($post_id, $title, $region, $place, $youtube, $freespace);
        
        if ($success) {
            // 更新に成功した場合はリダイレクト
            header('Location:../account/history.php');
            exit();
        } else {
            // 失敗した場合はメッセージを表示
            echo "投稿の更新に失敗しました。";
        }
    } else {
        //直接リンクでこのページを表示しようとした場合等、キーに値が存在しない時はメッセージを表示
        echo "無効なリクエストです。";
    }
?>