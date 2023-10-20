<?php
    require_once "DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/homea.css">
    <style>
         body {
            background-color: #DDDDDD;
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
      .right{
        margin-left:auto;
        margin-bottom: auto;
      }
    </style>
</head>
<body>
    <a href="../AnotherSky/login.php">
    <a onclick="location.href='../AnotherSky/login.php'" value=""><h2 style="text-align: right;">log in&nbsp;&nbsp;</h2></a>
    </div>
    </a>
    <?php require_once 'header.php'; ?>
        <div>
            <h2>
    <div style="text-align: center;"></div>
        <div style="text-align: center;">
                    <span style="font-size: 36px; font-family: serif;">category</span>
                    <br />
                        <div style="display: flex; flex-wrap: wrap; justify-content: center;">
            <button class="button" onclick="location.href='../AnotherSky/categoryho.php?region_id=1'">北海道</button>
            <button class="button" onclick="location.href='../AnotherSky/categoryto.php?region_id=2'">東北</button>
            <button class="button" onclick="location.href='../AnotherSky/categoryknt.php?region_id=3'">関東</button>
            <button class="button" onclick="location.href='../AnotherSky/categorytu.php?region_id=4'">中部</button>
            <button class="button" onclick="location.href='../AnotherSky/categoryknk.php?region_id=5'">近畿</button>
            <button class="button" onclick="location.href='../AnotherSky/categorytuk.php?region_id=6'">中国</button>
            <button class="button" onclick="location.href='../AnotherSky/categorysko.php?region_id=7'">四国</button>
            <button class="button" onclick="location.href='../AnotherSky/categorykys.php?region_id=8'">九州</button>
            <button class="button" onclick="location.href='../AnotherSky/categoryabroad.php?region_id=9'">海外</button>
        </div>
    </div>
        </h2>
        <h2>
            <div style="text-align: center;"><br /></div>
        </h2>
    </div>
    <div class="button-container">
        <?php
         /*foreach($regions as $region){
                echo "<button id='option".$region["region_id"]."' data-parameter='".$region["region_id"]."' class='button' onclick='location.href=".'"region.php?parameter='.$region["region_id"].'"'."'>".$region["name"]."</button>";
            }*/
        ?>
    </div>
    <?php require_once 'footer.php'; ?>
</body>
</html>
