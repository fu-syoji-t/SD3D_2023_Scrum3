<?php
require_once "../!Mng/DBManager.php";
$create = new DBManager();
$mailcheck = $create -> mail_check($_POST["mail"]);
if ($mailcheck > 0) {
    ?>
    <script type='text/javascript'>
        alert('既に同じメールアドレスが使用されています');
        location.href = 'toroku(b).html'; // ページ名を修正
    </script>
<?php
} else {
    $create -> sign_up($_POST["mail"], $_POST["pass"], $_POST["name"]);

    header('Location: login.php'); // リダイレクト先を修正
}
?>
