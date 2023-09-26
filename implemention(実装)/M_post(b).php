<?php
    require_once "DBManager.php";
    $create = new DBManager();
    $create->create($_SESSION["loginID"],$_SESSION["password"],$_SESSION["nickname"],$_SESSION["course"],
                    $_SESSION["major"],$_SESSION["grade"],$_SESSION["classname"],$_SESSION["Fsubject"]);

    header('Location:M_post.php');
?>