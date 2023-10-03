<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSSスタイルで中央配置を指定 */
        .centered-text {
            text-align: center; /* テキストを中央に配置 */
            position: absolute; /* 絶対位置指定 */
            top: 50%; /* 上から50%の位置に配置 */
            left: 50%; /* 左から50%の位置に配置 */
            transform: translate(-50%, -50%); /* 中央に配置 */
        }

        .rectangle {
            width: 100px; /* 四角形の幅 */
            height: 100px; /* 四角形の高さ */
            background-color: #ffffff; /* 白色の背景 */
            margin-top: 20px; /* テキストとの間隔 */
        }
    </style>
</head>
<body>
    <div class="centered-text">
        <?php
            echo "ここに中央の上に配置したいテキストを入力してください。";
        ?>
        <div class="rectangle"></div> <!-- 四角形の追加 -->
    </div>
</body>
</html>
