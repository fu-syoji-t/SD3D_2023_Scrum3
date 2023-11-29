<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $user_id = 1;

    $user = $get->get_user_info(1);

    require_once "tmp_test.php";
    $template = new Template();
    $template->header();
?>

<p><?php echo $user["name"] ?></p>

<p><?php echo $user["mail"] ?></p>

<button onclick="location.href='hometown.php?branch=favorite'">お気に入りの投稿</button>

<button onclick="location.href='../hometown/hometown.php?branch=history'">投稿履歴</button>