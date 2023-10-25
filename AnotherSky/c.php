<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once "DBManager.php";
?>
<form action="update_post.php" method="POST">
    <input type="hidden" name="post_id" value="編集対象の投稿のID">
    <textarea name="post_content">編集したい内容</textarea>
    <input type="submit" value="更新">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["post_id"];
    $post_content = $_POST["post_content"];

    $sql = "UPDATE posts SET content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $post_content, $post_id);

    if ($stmt->execute()) {
        echo "投稿が更新されました。";
    } else {
        echo "更新に失敗しました。";
    }

    $stmt->close();
}
$conn->close();
?>

    
</body>
</html>