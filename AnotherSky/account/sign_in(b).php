<?php
session_start();

//DAOファイルと接続
require_once "../!Mng/DBManager.php";
$sign_in = new DBManager();

$user = $sign_in -> sign_in($_POST["mail"],$_POST["pass"]);

if(count($user)==0){
    header("Location:sign_in.php?message=error");
}else{
    $_SESSION["user_id"] = $user["user_id"];
    header('Location:../top/menu.php');
}
?>