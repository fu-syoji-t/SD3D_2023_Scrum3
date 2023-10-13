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
    </style>
</head>
<body>
    <a href="../AnotherSky/login.php">
        <h2 style="text-align: right;">log in</h2>
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
            echo "<button id='option1' data-parameter='1' class='button'>北海道地方</button>";
            echo "<button id='option2' data-parameter='2' class='button'>東北地方</button>";
            echo "<button id='option3' data-parameter='3' class='button'>関東地方</button>";
            echo "<button id='option4' data-parameter='4' class='button'>中部地方</button>";
            echo "<button id='option5' data-parameter='5' class='button'>近畿地方</button>";
            echo "<button id='option6' data-parameter='6' class='button'>中国地方</button>";
            echo "<button id='option7' data-parameter='7' class='button'>四国地方</button>";
            echo "<button id='option8' data-parameter='8' class='button'>九州地方</button>";
            echo "<button id='option9' data-parameter='9' class='button'>海外</button>";
        ?>
    </div>
    <script>
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

        function redirectToNextPage(parameter) {
            window.location.href = "region.php?parameter=" + parameter;
        }
    </script>
    <?php require_once 'footer.php'; ?>
</body>
</html>

