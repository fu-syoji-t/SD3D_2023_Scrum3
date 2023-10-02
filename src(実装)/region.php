<?php
//echo $_GET['region'];
?>
<html>
<!-- 地域別投稿表示画面(バック) -->
    <head>
        <title>地域別投稿</title>
    </head>
    <body>
        <?php
        if (isset($_GET["parameter"])) {
            $selectedParameter = $_GET["parameter"];
            
            // パラメータに基づいて異なるコンテンツを表示
            switch ($selectedParameter) {
                case "1":
                    echo "<h1>北海道地方</h1>";
                    break;
                case "2":
                    echo "<h1>東北地方</h1>";
                    break;
                case "3":
                    echo "<h1>関東地方</h1>";
                    break;
                default:
                    echo "<h1>404 Error<br>このページは存在しません</h1>";
                    echo "<img src='../image/404.jpg' alt='404 Eroor'>";
            }
        } else {
            echo "<h1>パラメータが送信されませんでした</h1>";
        }
        ?>
    </body>
</html>