<?php 
    require_once "tmp_test.php";
    require_once "DBManager.php";

    $template = new Template();
    $get = new DBManager();
    
    $template->head("post");
    $template->header();

    $regions = $get->get_regions();
?>

<input type="button" onclick="history.back()" value="戻る"><br><br>



<?php
    $template->footer();
?>