<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $get->keep_post($_POST["user_id"], $_POST["post_id"]);
?>