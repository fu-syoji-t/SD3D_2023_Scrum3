<?php
    session_start();
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }
    // ログインしていない場合の挙動？ Keep & History
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿一覧</title>
    <link rel="icon" href="../img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/hometown.css"> 
</head>

<style>

    .box {
        display: none;
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
        margin-left: 680px;
        margin-top: 10px;
        cursor: pointer;
    }

</style>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<?php  
    require_once '../!Mng/header.php' ;

    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    switch($_GET["branch"]) {

        case "all":
            $title = 'Hometown';
            $posts = array_reverse($get->get_posts());
            break;

        case "region":
            $regions = $get->get_regions();
            $region_id = $_GET["region"];
            $title = $regions[$region_id-1]["name"];
            $posts = array_reverse($get->get_posts());
            $posts = array_filter($posts, function ($post) use ($region_id) {
                return $post['region_id'] == $region_id;
            });
            break;

        case "keep":
            $title = 'Keep';
            $posts = array_reverse($get->get_keep_posts($user_id));
            break;

        case "history":
            $title = 'History';
            $posts = array_reverse($get->get_posts());
            $posts = array_filter($posts, function ($post) use ($user_id) {
                return $post['user_id'] == $user_id;
            });
            break;

        default:
            $posts = [];

    }

?>

<h2>
    <div style="text-align: center;">
        <font face="serif">
        <br />
            <span style="font-size: 36px;"><?php echo $title ?></span>
            <br />
        </font>
    </div>
</h2>


<?php
foreach($posts as $post){
    echo 
'<div class="box">
    <h2>
        <a href="hometown_detail.php?post='.$post["post_id"].'">'.$post["place"].'</a>
        <span class="date">('.date('Y.m.d',strtotime($post["date"])).')</span>
    </h2>';
    if(isset($post["image_id"])){
    echo 
    '<p class="box_img">
        <img src="'.$post["path"].'" alt="Thumbnail" width="150" height="150">
    </p>';
    }

    if($_GET["branch"] == "history") {
    // 削除ボタンを追加
    echo 
    '<form action="../Account/history_delete(b).php" method="post" onsubmit="return confirmDelete()">
        <input type="hidden" name="post_id" value="' . $post["post_id"] . '">
        <div class="delete-button">
            <a href="../hometown/hometown_edit.php?post='. $post["post_id"] . '">編集</a>
            <input type="submit" value="投稿を削除" >
        </div>
    </form>';
    }

    echo 
    '<div class="box_sentence">
        <p>
            '.$post["text"].'…
            <a href="hometown_detail.php?post='.$post["post_id"].'">続きを読む</a>
        </p>
    </div>
</div>';
}

echo 
'<div class="read_more">
    <button type="button" class="more" id="more">more view...</button>
</div>';

if($_GET["branch"] == "all") {
    echo
'<div class="input">
    <a onclick="location.href=\'../hometown/hometown_post.php\'"><font face="serif"><span style="font-size: 36px;">投稿する</span></font></a>
</div>';
}
?>
  
<?php  require_once '../!Mng/footer.php' ?>
</body>

</html>

<script>
    var start = 10;
    var add = 10;
    var c_box = 0;

    var boxes = document.getElementsByClassName("box");
    while(c_box < start) {
        boxes[c_box].style.display = "block";
        c_box++;
    }
    console.log(c_box);

    function moreBox() {
        var i = c_box;
        while(c_box < i + add && c_box < boxes.length) {
            boxes[c_box].style.display = "block";
            c_box++;
        }
        console.log(c_box);
    }

    var moreElem = document.getElementById("more");
    moreElem.addEventListener('click', function() {
        moreBox();
    });

    /*
    // スクロールイベントのリスナを追加
    window.addEventListener('scroll', function() {
        // 現在のスクロール位置を取得
        var scrollPosition = window.scrollY || document.documentElement.scrollTop;

        // スクロール位置が (画面の総高さ - 表示領域の高さ) 以下ならば関数を実行
        if (scrollPosition >= (document.documentElement.scrollHeight - window.innerHeight)) {
            moreBox();
        }
    });
    */

    function confirmDelete() {
        // 確認ダイアログを表示し、OKなら削除処理を実行、キャンセルなら処理を中止
        return confirm("本当にこの投稿を削除しますか？");
    }
</script>
