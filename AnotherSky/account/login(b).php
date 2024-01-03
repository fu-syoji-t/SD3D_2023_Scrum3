<?php
session_start();

//DAOファイルと接続
require_once "../!Mng/DBManager.php";
$login = new DBManager();

$user = $login -> login($_POST["mail"],$_POST["pass"]);

if(count($user)==0){
    header("Location:login.php?message=error");
}else{
    $_SESSION["user_id"] = $user["user_id"];
    header('Location:../top/menu.php');
}
?>