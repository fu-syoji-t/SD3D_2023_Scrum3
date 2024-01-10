<?php
    session_start();
    if(isset($_SESSION["user_id"]) == false){
        header('Location:sign_in.php');
    }

    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $user = $get -> get_user($_SESSION["user_id"]);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール</title>
    <link rel="icon" href="../img/icon.png">
    <style>
    body {
        text-align: center;
    }

    .square {
        margin: 0 auto;
        width: 500px;
        border: 2px solid #000;
        border-radius: 20px;
        font-weight: bold;
        text-align: center;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
    }

    .square_head {
        color: gray;
        margin: 4rem 0 0;
        font-size: 1.5rem;
    }
    .square_index {
        margin: 3rem;
        border-bottom: 2px solid #000;
        font-size: 1.2rem;
    }

    .button-container {
        margin: 3rem;
        margin-left: auto;
        margin-right: auto;
    }

    .btn {
        display: inline-block;
        vertical-align: middle;
        margin: 0 10px;
        padding: 6px 25px;
        color: gray;
        font-weight: bold;
        letter-spacing: 0.5pt;
        text-decoration: none;
        background-color: #ffffff;
        border: 1px solid gray;
        cursor: pointer;
        transition-duration: 0.3s;
        -webkit-transition-duration: 0.3s;
        -moz-transition-duration: 0.3s;
        -o-transition-duration: 0.3s;
        -ms-transition-duration: 0.3s;
    } 
    .btn:hover {
        color: #ffffff;
        background-color: gray;
    }

    </style>
</head>
    <?php
        require_once "../!Mng/header.php";
    ?>
<body>
<h2>
    <div style="text-align: center;">
        <font face="serif">
        <br />
            <span style="font-size: 36px;">Profile</span>
            <br />
        </font>
    </div>
</h2>
    
<div class="square">

    <div class="square_head">name</div>
    <div class="square_index"><?php echo $user["name"] ?></div>

    <div class="square_head">E-mail</div>
    <div class="square_index"><?php echo $user["mail"] ?></div>

</div>

<div class="button-container">
    <button type="botton" class="btn" onclick="location.href='../hometown/hometown.php?branch=keep'">お気に入り</button>
    <button type="botton" class="btn" onclick="location.href='../hometown/hometown.php?branch=history'">投稿履歴</button>
    <button type="botton" class="btn" onclick="location.href='../account/sign_out(b).php'">サインアウト</button>
</div>
    <?php
        require_once "../!Mng/DBManager.php";
        $get = new DBManager();
    ?>

    <?php  require_once '../!Mng/footer.php' ?>
</body>
</html>
