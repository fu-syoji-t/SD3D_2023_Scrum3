<?php
//セッションの開始
session_start();

//DAOファイルと接続
require_once "../!Mng/DBManager.php";
$login = new DBManager();

$search = $login -> login($_POST["mail"],$_POST["pass"]);

if(count($search)==0){
    header("Location:login.php?message=error");
}else{
    foreach($search as $row){
        $_SESSION['user_id'] = $row['user_id'];
        header('Location:../Top/menu.php');
    }
}
?>