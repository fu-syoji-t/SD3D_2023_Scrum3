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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login</title>

    <?php 
    session_start(); //セッションを開始する 
        if(isset($_GET['message'])){
            $message = $_GET['message'];
        }
        //セッションの情報が登録されている場合、グループログイン画面へと遷移する
        if(isset($_SESSION["mail"]) == true && isset($_SESSION["name"]) == true){
            header('Location: ../top/menu.php');
        }
    ?>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
    body{
        text-align: center;
        background-color: #DDDDDD;
        font-family: 'Sacramento', cursive;
    } 
    h1{
        margin-bottom: 10%;
        font-family: 'Sacramento', cursive;
    }
    h2 {     
        text-align:center;
        font-size : 25px; 
        line-height : 5; 
    }
    button {    
        padding: 1% 2%;
        width: 600x;
        border-radius: 10px;
        border: 2px solid black;
        background-color:	#C0C0C0;
        font-family: 'Sacramento', cursive;
    }
    input{
        padding: 1% 2%;
        width: 600x;
        border-radius: 10px;
        border: 2px solid black;
        background-color:	#C0C0C0;
    } 
    .test{
        font-family: 'Sacramento', cursive;
    }
    p{
    }
</style>

<body>
    <form action="login_check.php" method="post">
        <br><br>

        <div id="error-message">
            <div class="container mt-3"></div>

            <h1>Login</h1>

            <div class="container mt-3">
                <input type="text" class="from-control" name="mail" placeholder="mailaddress"><br><br>
            </div>

            <div class="container mt-3">
                <input type="password" class="from-control" name="pass" placeholder="password"><br>
            </div>
            <br>
            <a href="account.php">Sign up</a>
            <br>

            <?php
                if(isset($message)){
                    echo '<p class="error-message">ログインに失敗しました。正しい情報を入力してください</p>';
                }
            ?>
            <br>
            <button type = "submit">Login</button>
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
<!--
<script>
var loginForm = document.querySelector("form");
loginForm.addEventListener("submit", function(event) {
    event.preventDefault();
    var mailInput = document.querySelector('input[name="mail"]');
    var passInput = document.querySelector('input[name="pass"]');
    var errorContainer = document.getElementById("error-container");
    if (mailInput.value === "" || passInput.value === "") {
        errorContainer.textContent = "正しいメールアドレスとパスワードを入力してください。";
    } else {
        loginForm.submit();
    }
});
</script>
!-->
</html>
</body>