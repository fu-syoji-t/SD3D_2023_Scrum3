<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        background-color: #DDDDDD;
    }

    h1 {
        background-color: gray;
        font-size: 23px;
        font-family: "Arial Black";
        letter-spacing: 2px;
        text-align: center;
    }

    .box {
        background-color: #FFF;
        box-shadow: 0 5px 5px #999;
        height: 250px;
        margin: 30px auto;
        overflow: hidden;
        padding: 15px;
        width: 450px;
    }

    .box a:link,
    .box a:visited {
        color: #00C;
    }

    .box a:hover {
        color: #33F;
    }

    .box>h2 {
        font-size: 16px;
        margin: 0;
    }

    .box>h2>.date {
        color: #666;
        font-size: 13px;
        font-weight: normal;
    }

    .box>.box_img {
        float: left;
        margin-right: 10px;
        width: 150px;
    }

    .box>.box_sentence>p {
        color: #444;
        font-size: 14px;
    }

    .delete-button {
        background-color: #fff;
        /* ボタンの背景色 */
        color: #000;
        /* ボタンのテキスト色 */
        padding: 1px 1px;
        /* ボタンの内側の余白 */
        border-radius: 4px;
        /* 角丸 */
        margin-left: 310px;
        margin-top: 10px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #DDDDDD;
        /* ホバー時の背景色 */
        margin-right: 25px;
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
          <a href="../Hometown/hometown_detail.php?post=' . $post["post_id"] . '">' . $post["place"] . '</a>
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
            <input type="submit" value="投稿を削除" >
            </div>
          </form>';

    echo
        '<div class="box_sentence">
            <p>
                ' . $post["text"] . '…
                <a href="../Hometown/hometown_detail.php?post=' . $post["post_id"] . '">続きを読む</a>
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
