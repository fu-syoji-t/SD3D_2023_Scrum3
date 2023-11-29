<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8', 'root', 'root');

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
        $_SESSION['user_id'] = $user['id']; 
        header('Location: account.php');
    } else {
        // ログイン失敗
        echo '<script>alert("メールアドレスまたはパスワードが正しくありません");</script>';
    }
}
?>
