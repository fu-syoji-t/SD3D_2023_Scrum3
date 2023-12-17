<?php 
    session_start(); //セッションを開始する 
        if(isset($_GET['message'])){
            $message = $_GET['message'];
        }
        if(isset($_SESSION["mail"]) == true && isset($_SESSION["name"]) == true){
            header('Location: ../top/menu.php');
        }
    ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="format-detection"content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equir="content-type" charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>login</title>

    </head>

    <style>
        body {
            background-color: #DDDDDD;
        }
        .form {
            margin: 50px auto;
            text-align: center;
        }
        .form_title {
            font-size: 14px;
            margin: 30px auto;
        }
        .label_left {
            display: inline-block;
            width: 10%;
            border-left: solid 5px gray;
            padding-left: 15px;
            vertical-align: top;
        }
        input[type="email"],
        input[type="password"] {
            width: 500px;
            padding: 10px;
            background-color: white;
        }
        form .btn {
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
        form .btn:hover {
            color: #ffffff;
            background-color: gray;
        }
    </style>
    <?php  require_once '../!Mng/header.php' ?>

    <body>
        <form action="login_check.php" method="post">
        <br><br>

        <div class="form">
        <div class="form_title">
            <h1>sign-in</h1>
        </div>
        <div class="form_area">
            <form action="login_check.php" method="POST">
                <label class="label_left" for="mail">メールアドレス:</label>
                <input type="email" id="mail" name="mail" placeholder="e-mail" required><br><br>

                <label class="label_left" for="password">パスワード:</label>
                <input type="password" id="password" name="pass" placeholder="pass" required><br><br>

                <div class="users-sgin"><a href="account.php">sign-up</a></div><br>

                <input type="submit" name="login" value="ログイン" class="btn">
            </form>

        </div>
            <?php
                if(isset($message)){
                    echo '<p class="error-message">ログインに失敗しました。正しい情報を入力してください</p>';
                }
            ?>
        </div>
    </form>

<script type="text/javascript">
    function check(){

        const mailPattern = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
        let mail = document.userins.mail.value;
        let pass = document.userins.pass.value;
        let isSuccess = true;

        if(mailPattern.test(mail) == false && pass.length < 6){
                alert('メールアドレス、パスワードの形式が不正です。\nパスワードは6文字以上の必要があります');
            isSuccess = false;
            return false;
        }
        else if(mailPattern.test(mail) == false){
                    alert('メールアドレスの形式が不正です。');
                isSuccess = false;
                return false;
        }
        else if(pass.length < 6){
                alert('パスワードは6文字以上の必要があります');
            isSuccess = false;
            return false;
        }
        if(isSuccess == true){
                return true;
        }

    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php  require_once '../!Mng/footer.php' ?>
</html>
</body>