<!-- 削除ボタンを添付するファイルにこれを記入 -->
<!--
<form action="hometown_delete.php" method="post">
	<input type="hidden" name="postdlt" value=<?php echo $row['post_id']?>>
	<input type="submit" class="btn btn-link" value="削除">
</form>
-->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=teamadb;charset=utf8','webuser','abccsd2');

$sql = "DELETE FROM cart WHERE post_id=?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_POST['postdlt'],PDO::PARAM_INT);
$ps->execute();
header('Location: hometown.php');
?>

