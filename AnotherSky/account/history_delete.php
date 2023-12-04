// hometown_delete.php

<?php
require_once "../!Mng/DBManager.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからpost_idを取得
    $post_id = $_POST["post_id"];

    // DBManagerクラスのインスタンスを作成
    $dbManager = new DBManager();

    // 投稿と画像を削除（外部キー制約を無視）
    $success = $dbManager->delete_post_and_images_ignore_constraints($post_id);

    if ($success) {
        // リダイレクトするページの実際の URL に置き換えてください
        header("Location:rireki.php");
        exit();
    } else {
        // 失敗した場合の処理
        echo "投稿の削除に失敗しました。";
    }
} else {
    echo "無効なリクエストです。";
}
?>
