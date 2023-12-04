<?php
$pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8', 'root', 'root');
$sql = "SELECT * FROM users WHERE mail=? LIMIT 1"; 
$ps = $pdo->prepare($sql);
$ps->bindValue(1, $_POST['mail'], PDO::PARAM_STR);
$ps->execute();
$mailcheck = $ps->fetch();

if ($mailcheck !== false) {
    ?>
    <script type='text/javascript'>
        alert('既に同じメールアドレスが使用されています');
        location.href = 'toroku.php'; // ページ名を修正
    </script>
<?php
} else {
    $sql = "INSERT INTO users(mail, password, name) VALUES(?,?,?)";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1, $_POST['mail'], PDO::PARAM_STR);
    //$ps->bindValue(2, $_POST['password'], PDO::PARAM_STR);
    $ps->bindValue(2, password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
    $ps->bindValue(3, $_POST['name'], PDO::PARAM_STR);
    $ps->execute();

    header('Location: user.php'); // リダイレクト先を修正
}
?>
