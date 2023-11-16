<?php 
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();

    require_once "tmp_test.php";
    $template = new Template();
    $template->header();

    foreach($regions as $region) {
        echo '<button type="button" onclick="location.href='."'hometown.php?branch=region&region=".$region["region_id"]."'".'">'.$region["name"].'</button><br>';
    }
?>