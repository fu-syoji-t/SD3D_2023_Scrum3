<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hometown.css"> 
    <title>Document</title>
</head>

<style>
    .delete-button {
        background-color: #fff;
        /* ボタンの背景色 */
        color: #000;
        /* ボタンのテキスト色 */
        padding: 1px 1px;
        /* ボタンの内側の余白 */
        border-radius: 4px;
        /* 角丸 */
        margin-left: 680px;
        margin-top: 10px;
        cursor: pointer;
    }

    .delete-button:hover {
       /* background-color: #DDDDDD;
        // ホバー時の背景色
        margin-right: 25px;*/
    }
</style>
</html>

<?php
require_once '../!Mng/header.php';

require_once "../!Mng/DBManager.php";
$get = new DBManager();

// ここで適切な user_id を設定してください
$user_id = 1;

// 全ての記事を取得
$all_posts = array_reverse($get->get_all_posts());

// user_id に関連する記事だけを選別
$posts = array_filter($all_posts, function ($post) use ($user_id) {
    return $post['user_id'] == $user_id;
});

foreach ($posts as $post) {
    echo '<div class="box">
        <h2>
          <a href="../hometown/hometown_detail.php?post=' . $post["post_id"] . '">' . $post["place"] . '</a>
          <span class="date">(' . date('Y.m.d', strtotime($post["date"])) . ')</span>
        </h2>';
    if (isset($post["first_image"])) {
        echo
            '<p class="box_img">
                <img src="' . $post["first_image"] . '" alt="Thumbnail" width="150" height="150">
            </p>';
    }

    // 削除ボタンを追加
    echo '<form action="rireki_delete.php" method="post" onsubmit="return confirmDelete()">
            <input type="hidden" name="post_id" value="' . $post["post_id"] . '">
            <div class="delete-button">
            <a href="../hometown/hometown_edit.php?post='. $post["post_id"] . '">編集</a>
            <input type="submit" value="投稿を削除" >
            </div>
          </form>';

    echo
        '<div class="box_sentence">
            <p>
                ' . $post["text"] . '…
                <a href="../hometown/hometown_detail.php?post=' . $post["post_id"] . '">続きを読む</a>
            </p>
        </div>
    </div>';
}
?>
<script>
    function confirmDelete() {
        // 確認ダイアログを表示し、OKなら削除処理を実行、キャンセルなら処理を中止
        return confirm("本当にこの投稿を削除しますか？");
    }
</script>
<body>
</body>
<?php require_once '../!Mng/footer.php' ?>
