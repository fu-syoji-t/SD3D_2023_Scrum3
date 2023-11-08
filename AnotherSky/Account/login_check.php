<?php
//セッションの開始
session_start();

//DAOファイルと接続
require_once "../!Mng/DBManager.php";
$get = new DBManager();

//ログインユーザのユーザ情報取得
$user = $dao->get_user_info($_POST['mail'],$_POST['pass']);

//ユーザ情報が正しければmenu画面へと遷移する
foreach($user as $row){
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['pass'] = $row['pass'];
    $_SESSION['id'] = $row['user_id'];
    header('Location: g_login.php');
}
if(count($user) == 0){
    header('Location: login.php?message=error');
}

?>