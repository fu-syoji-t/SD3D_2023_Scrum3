<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSSスタイルで中央配置を指定 */
        .centered-text {
            text-align: center; 
            position: absolute; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
        }

        .rectangle {
            width: 100px; 
            height: 100px; 
            background-color: #ff0000; 
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <div class="centered-text">
        <?php
            echo "ログイン";
        ?>
        <div class="rectangle"></div> 
    </div>
</body>
</html>
