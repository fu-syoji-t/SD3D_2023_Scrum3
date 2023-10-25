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
        .hoge-class {
    visibility:hidden;
    border:1px solid red;
    width:100px;
    height:100px;
}
.other-class{
    border:1px solid blue;
    width:100px;
    height:100px;
}
.float-class{
    float: left;
    margin: 20px;
}
    </style>
</head>
<body>
<div class="other-class float-class">Hello World!!こんにちは！</div>
    <div class="hoge-class float-class">Hello World!!こんにちは！</div>
    <div class="other-class float-class">Hello World!!こんにちは！</div>
    <div class="other-class float-class">Hello World!!こんにちは！</div>
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


<?php
        require_once "DBManager.php";
        $get = new DBManager();

        if (isset($_GET["post"])) {
            $post_id = $_GET["post"];
            $post = $get->get_post_for_edit($post_id);
        
            // 必要なデータを取得し、フォームの各フィールドに事前に設定します
        
            // ここにフォームを作成するコードを追加します
            // タイトル、場所、リンク、テキストのフィールドを含みます
        
            // 画像や文章のデータを取得し、フォームに表示するコードを追加します
        
            // フォームの送信先を指定します
            echo '<form action="update_post.php" method="post">';
        
            // フォームの各フィールドに事前に設定したデータを表示します
        
            // 画像や文章のデータをフォームに表示するコードを追加します
        
            // フォームの送信ボタンを表示します
            echo "<a href='../AnotherSky/hometown.php'><input type='button' value='更新'style='color: white;color:black;'>";
            echo '</form>';
        } else {
            // 投稿IDが提供されていない場合の処理
            echo "投稿IDが指定されていません。";
            exit;
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
        body {
            background-color: #DDDDDD;
            font-family: 'Sacramento', cursive;
            font-family: "Kokoro";
        }
        .center {
            text-align: center;
        }
        .inputa {
            text-align: center;
            margin-top: 10%;
            margin-left: 10%;
            margin-right: 10%;
            border-radius: 20% 20% 20% 20%;
            background-color: #999999;
            padding: 0.5em;
            border-radius: 1.5em;
        }
        .input {
            text-align: center;
            margin-top: 10%;
            margin-left: 10%;
            margin-right: 10%;
            border-radius: 20% 20% 20% 20%;
            background-color: #999999;
            padding: 0.5em;
            border-radius: 1.5em;
            display: none;
        }
        h1 {
            margin-bottom: 10%;
            font-family: 'Sacramento', cursive;
        }
        .subu {
            background-color: #999999;
            font-size: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            position: relative;
            margin-bottom: auto;
            border-radius: 50vh;
        }
        .maru {
            border-radius: 1.5em;
            padding: 5%; /* テキストと枠線の間の余白を指定 */
        }
        .maro{
            border: 2px solid #000; /* 枠線の太さと色を指定 */
            padding: 5%; /* テキストと枠線の間の余白を指定 */
            border-radius: 1.5em;
            margin-bottom: 10%;
        }
    </style>

    <?php  require_once 'header.php' ?>
<?php
    require_once "DBManager.php";
    $get = new DBManager();

    $post_id = $_GET["post"];
    $post = $get->get_post($post_id);

    $max_sentence_id = $get->max_sentence_id($post_id);

    require_once "header.php";
?>

    <?php
            echo'<div class="center">';
            echo'<h1>post</h1>';
            echo'<form action="post(b).php" method="post" enctype="multipart/form-data">';

            echo ' <br>';
            echo '<div class="maru"> ';
            echo $post["date"]."<br>";

            echo ' <br>';
            echo 'title <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["title"]) . '"><br>';

            
            echo ' <br>';
            echo'<div class="center">
            <select name="region">
                    <option value=1>北海道</option>
                    <option value=2>東北</option>
                    <option value=3>関東</option>
                    <option value=4>中部</option>
                    <option value=5>近畿</option>
                    <option value=6>中国</option>
                    <option value=7>四国</option>
                    <option value=8>九州</option>
                    <option value=9>海外</option>
                 </select><br>
                 </div>';


            echo ' <br>';
            echo 'place <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["place"]) . '"><br>';

            echo ' <br>';
            echo 'youtube <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["link_path"]) . '"><br>';

            echo ' <br>';
            echo 'freespace <br>';
            echo '<input class="maru" type="text" name="title" maxlength="30" value="' . htmlspecialchars($post["text"]) . '"><br>';
    ?>

        <div class="inputa" id="inputSection1">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image1" accept="image/*"><br>
            <textarea class="maro" name="sentence1_1" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
        <div class="input" id="inputSection2">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image2" accept="image/*"><br>
            <textarea class="maro" name="sentence2_1"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
        <div class="input" id="inputSection3">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image3" accept="image/*"><br>
            <textarea class="maro" name="sentence3_1"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
        <div class="input" id="inputSection4">
            画像を選択 <br>
            <input class = "maru" type="file" name="post_image4" accept="image/*"><br>
            <textarea class="maro" name="sentence4_1"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
        <div class="input" id="inputSection5">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image5" accept="image/*"><br>
            <textarea class="maro" name="sentence5_1"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
    </div>
    <div style="width: 100%; background-color: #bbb;text-align: center; margin-top: 10%;">
        <button type="button" class="more" id="more">+</button>
    </div>
    <!--<div class="input-section">
        <button id="addInput" type="button">＋</button>
    </div>-->
    <script>
        var addButton = document.getElementById('more');
        var inputSectionCounter = 5; // 5つの入力セクションが既に表示されている
        var moreElem = document.getElementById("more");
        var sections = document.getElementsByClassName("input");
        var visibleSections = 0;

        addButton.addEventListener('click', function() {
            if (visibleSections < sections.length) {
                sections[visibleSections].style.display = "block";
                visibleSections++;
            }
        });
    </script>
        <div class="center">
        <a href='../AnotherSky/k.php'><input type='button' value='k'style='color: white;color:black;'></a>
       <!--<button type="submit">更新を確定</button>-->
    </div>
</body>
</html>