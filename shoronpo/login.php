<?php
session_start(); // セッションの開始

$pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE mail=? LIMIT 1";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1, $mail, PDO::PARAM_STR);
    $ps->execute();
    $user = $ps->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // ログイン成功
        $_SESSION['user_id'] = $user['id']; // ユーザーIDをセッションに保存
        header('Location: account.php'); // リダイレクト先を修正
    } else {
        // ログイン失敗
        echo '<script>alert("メールアドレスまたはパスワードが正しくありません");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- 必要に応じてCSSを追加 -->
</head>
<body>
    <?php require_once 'header.php'; ?>
    <div class="form">
        <div class="form_title">
            <h1>LOGIN</h1>
        </div>
        <div class="form_area">
            <form action="login.php" method="POST">
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
