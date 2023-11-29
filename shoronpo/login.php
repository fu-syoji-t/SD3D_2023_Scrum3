<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
</head>
<body>
    <?php require_once 'header.php'; ?>
    <div class="form">
        <div class="form_title">
            <h1>LOGIN</h1>
        </div>
        <div class="form_area">
            <form action="logincheck.php" method="POST">
                <label class="label_left" for="mail">メールアドレス:</label>
                <input type="email" id="mail" name="mail" placeholder="e-mail" required><br><br>

                <label class="label_left" for="password">パスワード:</label>
                <input type="password" id="password" name="pass" placeholder="pass" required><br><br>

                <input type="submit" name="login" value="ログイン" class="btn">
            </form>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</body>
</html>
