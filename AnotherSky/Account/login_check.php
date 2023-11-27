<?php
//セッションの開始
session_start();

//DAOファイルと接続
require_once "../!Mng/DBManager.php";
$get = new DBManager();

$search = $login->login($_POST["loginID"],$_POST["password"]);

if(count($search)==0){
    echo '<script> history.back(); </script>';
}else{
    foreach($search as $row){
        $_SESSION['userID']=$row['user_id'];
        header('Location:G1-3.php');
    }
}

header('Location: ../Top/menu.php');
if(count($user) == 0){
    header('Location: login.php?message=error');
}

?>