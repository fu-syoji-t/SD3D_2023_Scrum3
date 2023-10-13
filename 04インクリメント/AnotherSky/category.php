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
            margin: 0;
            background-color: #DDDDDD;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
      .right{
        margin-left:auto;
        margin-bottom: auto;
      }
    </style>
</head>
<body>
    <a href="../AnotherSky/login.php">
      <div class="right">
    <a onclick="location.href='../AnotherSky/login.php'" value=""><h2 style="text-align: right;">log in&nbsp;&nbsp;</h2></a>
    </div>
    </a>
    <?php require_once 'header.php'; ?>
    <div><hr /></div>
    <div>
        <h2>
            <div style="text-align: center;"></div>
            <div style="text-align: center;">
                <span style="font-size: 36px; font-family: serif;">category</span>
                <br />
            </div>
        </h2>
        <h2>
            <div style="text-align: center;"><br /></div>
        </h2>
    </div>
    <div class="button-container">
        <?php
            foreach($regions as $region){
                echo "<button id='option".$region["region_id"]."' data-parameter='".$region["region_id"]."' class='button' onclick='location.href=".'"region.php?parameter='.$region["region_id"].'"'."'>".$region["name"]."</button>";
            }
        ?>
    </div>
    <script>
        /*document.getElementById("option1").addEventListener("click", function() {
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

        function redirectToNextPage(parameter) {
            window.location.href = "region.php?parameter=" + parameter;
        }*/
    </script>
    <?php require_once 'footer.php'; ?>
</body>
</html>

