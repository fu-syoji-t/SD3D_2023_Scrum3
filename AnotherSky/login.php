<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSSスタイルで中央配置を指定 */
        .centered-form {
            text-align: center; /* テキストを中央に配置 */
            position: absolute; /* 絶対位置指定 */
            top: 20%; /* 上から20%の位置に配置 */
            left: 50%; /* 左から50%の位置に配置 */
            transform: translate(-50%, -50%); /* 中央に配置 */
        }

        /* ログインフォームのスタイル */
        .login-form {
            margin-top: 20px;
            text-align: center;
        }

        /* 入力フィールドのスタイル */
        .input-field {
            width: 300px;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* 送信ボタンのスタイル */
        .submit-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="centered-form">
        <?php
            echo "ログイン";
        ?>
        <div class="login-form">
            <form action="login.php" method="post">
                <input type="text" class="input-field" name="username" placeholder="ユーザー名" required><br>
                <input type="password" class="input-field" name="password" placeholder="パスワード" required><br>
                <div style="button-align: center;">
                <input onclick="location.href='../AnotherSky/menu.php'"class="submit-button"  value="ログイン"><font face="serif"></font></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
