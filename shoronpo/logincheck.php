<?php
session_start();

if (isset($_POST['mail']) || isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8', 'root', 'root');

    $sql = "SELECT * FROM users WHERE mail=? LIMIT 1";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1, $mail, PDO::PARAM_STR);
    $ps->execute();
    $user = $ps->fetch();
echo $password;
echo '-----';
echo $user;
    if (password_verify($password, $user)) { 
        $_SESSION['user_id'] = $user['id']; 
        header('Location: account.php');
    } else {
        echo '<script>alert("メールアドレスまたはパスワードが正しくありません");</script>';
    }
} else {
    echo '<script>alert("メールアドレスまたはパスワードが提供されていません");</script>';
}
?>
