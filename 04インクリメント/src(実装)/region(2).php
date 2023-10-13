<?php 
    require_once "DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();

    require_once "index.php";
    $template = new header("post");
?>