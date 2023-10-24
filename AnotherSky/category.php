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
    <?php require_once 'header.php'; ?>
        <div>
            <h2>
    <div style="text-align: center;"></div>
        <div style="text-align: center;">
            <span style="font-size: 36px; font-family: serif;">category</span>
            <br />
            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                <form action="../src(実装)/region(b).php" method="post">
                    <input type="submit" class="button" name="1" value="北海道">
                    <input type="submit" class="button" name="2" value="東北">
                    <input type="submit" class="button" name="3" value="関東">
                    <input type="submit" class="button" name="4" value="中部">
                    <input type="submit" class="button" name="5" value="近畿">
                    <input type="submit" class="button" name="6" value="中国">
                    <input type="submit" class="button" name="7" value="四国">
                    <input type="submit" class="button" name="8" value="九州">
                    <input type="submit" class="button" name="9" value="海外">
                </form>
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
