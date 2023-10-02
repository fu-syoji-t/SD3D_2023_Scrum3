<?php
// echo "<form action='region.php' name=region method='post'>";

// echo "<button type='submit' name=region value='1'>北海道地方</button>";
// echo "<button type='submit' name=region value='2'>東北地方</button>";
// echo "<button type='submit' name=region value='3'>関東地方</button>";
// echo "<button type='submit' name=region value='4'>中部地方</button>";
// echo "<button type='submit' name=region value='5'>近畿地方</button>";
// echo "<button type='submit' name=region value='6'>中国地方</button>";
// echo "<button type='submit' name=region value='7'>四国地方</button>";
// echo "<button type='submit' name=region value='8'>九州地方</button>";
// echo "<button type='submit' name=region value='9'>海外</button>";
// echo "</form>";
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>地域選択</title>
</head>
<body>
    <h1>Category</h1>
    <!-- 地域選択画面(バック) -->
    <!--<form action="region.php" name=region method="post">
        <button type="submit" name=region value="1">北海道地方</button>
        <button type="submit" name=region value="2">東北地方</button>
        <button type="submit" name=region value="3">関東地方</button>
        <button type="submit" name=region value="4">中部地方</button>
        <button type="submit" name=region value="5">近畿地方</button>
        <button type="submit" name=region value="6">中国地方</button>
        <button type="submit" name=region value="7">四国地方</button>
        <button type="submit" name=region value="8">九州地方</button>
        <button type="submit" name=region value="9">海外</button>
    </form>-->

    <button id="option1" data-parameter="1">北海道地方</button>
    <button id="option2" data-parameter="2">東北地方</button>
    <button id="option3" data-parameter="3">関東地方</button>
    
    <script>
        // ボタンがクリックされたときの処理
        document.getElementById("option1").addEventListener("click", function() {
            redirectToNextPage("1");
        });
        document.getElementById("option2").addEventListener("click", function() {
            redirectToNextPage("2");
        });
        document.getElementById("option3").addEventListener("click", function() {
            redirectToNextPage("3");
        });

        // 次のページに遷移する関数
        function redirectToNextPage(parameter) {
            window.location.href = "region.php?parameter=" + parameter;
        }
    </script>
</body>
</html>