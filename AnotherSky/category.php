<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/homea.css">
</head>
<body>
<style>  
        body {
            margin: 0;
            background-color: #DDDDDD;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            flex-direction: column;
        }
        h1 {
            background-color: gray;
            font-size: 23px;
            font-family: "Arial Black";
            letter-spacing: 2px;
            text-align: center;
            color: black;
        }
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 400px; /* コンテナの幅を制限 */
        }
        .button {
            padding: 1rem 2rem;
            border: 1px solid #000;
            color: black;
            text-decoration: none;
            margin: 5px;
            width: 45%; /* ボタンの幅を調整して2列に */
        }
</style>
  </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<a onclick="location.href='../AnotherSky/login.php'" value=""><h2 style="text-align: right;">log in&nbsp;&nbsp;</h2></a>
    <?php  require_once 'header.php' ?>
</div>
<div><hr /></div>
<div>
  <h2>
    <div style="text-align: center;"></div>
    <div style="text-align: center;">
      <span style="font-size: 36px; font-family: serif;">category</span>
      <br />
    </div>
    <div style="text-align: center;">
      <span style="font-size: 36px; font-family: serif;"><br /></span>
    </div>
    <!--<div style="text-align: center;">
    <button onclick="location.href='../AnotherSky/categoryho.php'" value=""><span style="font-size: 36px; font-family: serif;">北海道</span></a>
    <button onclick="location.href='../AnotherSky/categoryto.php'" value=""><span style="font-family: serif; font-size: 36px;">東北</span></a>
    <button onclick="location.href='../AnotherSky/categoryknt.php'" value=""><span style="font-size: 36px; font-family: serif;">関東</span></a>
    <button onclick="location.href='../AnotherSky/categorytu.php'" value=""><span style="font-family: serif; font-size: 36px;">中部</span></a>
    <button onclick="location.href='../AnotherSky/categoryknk.php'" value=""><span style="font-size: 36px; font-family: serif;">近畿</span></a>
    <button onclick="location.href='../AnotherSky/categorytuk.php'" value=""><span style="font-family: serif; font-size: 36px;">中国</span></a>
    <button onclick="location.href='../AnotherSky/categorysko.php'" value=""><span style="font-size: 36px; font-family: serif;">四国 </span></a>
    <button onclick="location.href='../AnotherSky/categorykys.php'" value=""><span style="font-family: serif; font-size: 36px;">九州</span></a>
    <button onclick="location.href='../AnotherSky/categoryabroad.php'" value=""><span style="font-family: serif; font-size: 36px;">海外</span></a>
    </div>
  </h2>
  <h2>
    <div style="text-align: center;"><br /></div>
  </h2>
  <?php
    require_once "DBManager.php";
    $DBM= new DBManager();
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
    <!-- <form action="region.php" name=region method="post">
        <button type="submit" name=region value="1">北海道地方</button>
        <button type="submit" name=region value="2">東北地方</button>
        <button type="submit" name=region value="3">関東地方</button>
        <button type="submit" name=region value="4">中部地方</button>
        <button type="submit" name=region value="5">近畿地方</button>
        <button type="submit" name=region value="6">中国地方</button>
        <button type="submit" name=region value="7">四国地方</button>
        <button type="submit" name=region value="8">九州地方</button>
        <button type="submit" name=region value="9">海外</button>
    </form> -->
    <div class="button-container">
    <?php
    echo "<button id='option1' data-parameter='1'>北海道地方</button>";
    echo "<button id='option2' data-parameter='2'>東北地方</button>";
    echo "<button id='option3' data-parameter='3'>関東地方</button>";
    echo "<button id='option4' data-parameter='4'>中部地方</button>";
    echo "<button id='option5' data-parameter='5'>近畿地方</button>";
    echo "<button id='option6' data-parameter='6'>中国地方</button>";
    echo "<button id='option7' data-parameter='7'>四国地方</button>";
    echo "<button id='option8' data-parameter='8'>九州地方</button>";
    echo "<button id='option9' data-parameter='9'>海外</button>";
    ?>
    </div>
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
        document.getElementById("option4").addEventListener("click", function() {
            redirectToNextPage("4");
        });
        document.getElementById("option5").addEventListener("click", function() {
            redirectToNextPage("5");
        });
        document.getElementById("option6").addEventListener("click", function() {
            redirectToNextPage("6");
        });
        document.getElementById("option7").addEventListener("click", function() {
            redirectToNextPage("7");
        });
        document.getElementById("option8").addEventListener("click", function() {
            redirectToNextPage("8");
        });
        document.getElementById("option9").addEventListener("click", function() {
            redirectToNextPage("9");
        });

        // 次のページに遷移する関数
        function redirectToNextPage(parameter) {
            window.location.href = "region.php?parameter=" + parameter;
        }
    </script>
</body>
</html>
  <h2>
    <?php  require_once 'footer.php' ?>
  </h2>
</div>

</body>
</html>