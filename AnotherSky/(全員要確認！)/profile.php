<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $user_id = 1;

    $user = $get->get_user_info(1);
?>

<p><?php echo $user["name"] ?></p>

<p><?php echo $user["mail"] ?></p>

<button onclick="location.href='hometown_favorite.php'">お気に入りの投稿</button>

<button onclick="location.href='hometown_history.php'">投稿履歴</button>