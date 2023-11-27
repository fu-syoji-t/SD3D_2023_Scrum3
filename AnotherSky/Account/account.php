<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>header</title>
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
        .label_left{
        display: inline-block;
        width:10%;
        border-left: solid 5px gray;
        padding-left: 15px;
        vertical-align:top;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"]{
            width: 500px;
            padding: 10px;
            background-color: white;
        }
        form .btn{
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
            transition-duration:0.3s;
            -webkit-transition-duration:0.3s;
            -moz-transition-duration:0.3s;
            -o-transition-duration:0.3s;
            -ms-transition-duration:0.3s;
        } 
        form .btn:hover{
            color: #ffffff;
            background-color: gray;
        }
    </style>
  </head>
  <body>
    <?php  require_once '../!Mng/header.php' ?>
    <div class="form">
        <div class="form_title">
            <h1>SIGN-UP</h1>
        </div>
        <div class="form_area">
            <form action="toroku(b).php" method="POST" name="userins" onsubmit="return check();">
                <label class="label_left" for="name">名前:</label>
                <input type="text" id="name" name="name" placeholder="name" required><br><br>
                
                <label class="label_left" for="mail">メールアドレス:</label>
                <input type="email" id="mail" name="mail" placeholder="e-mail" required><br><br>
                
                <label class="label_left" for="password">パスワード:</label>
                <input type="password" id="password" name="pass" placeholder="pass" required><br><br> <!-- パスワードのname属性を修正 -->
                
                <input type="submit" name="register" value="登録" class="btn">
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function check(){
            const mailPattern = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
            let mail = document.userins.mail.value;
            let pass = document.userins.pass.value;
            let isSuccess = true;
        
            if(mailPattern.test(mail) == false && pass.length < 6){
                alert('メールアドレス、パスワードの形式が不正です。\nパスワードは6文字以上である必要があります');
                isSuccess = false;
                return false;
            }
            else if(mailPattern.test(mail) == false){
                    alert('メールアドレスの形式が不正です。');
                    isSuccess = false;
                    return false;
            }
            else if(pass.length < 6){
                alert('パスワードは6文字以上である必要があります');
                isSuccess = false;
                return false;
            }
            if(isSuccess == true){
                return true;
            }
        };
    </script>

    <?php  require_once '../!Mng/footer.php' ?>
  </body>
</html>

