<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
        }
    </style>

    <a onclick="location.href='../AnotherSky/login.php'" value=""><h2 style="text-align: right;">log in&nbsp;&nbsp;</h2></a>
    <?php  require_once 'header.php' ?>
    <div class="center">
        <h1>post</h1>
        <form action="post(b).php" method="post" enctype="multipart/form-data">
            title <br>
            <input class="maru" type="text" name="title" maxlength="30"><br>
            region <br>
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
            place <br>
            <input class="maru" type="text" name="place"><br>
            youtube <br>
            <textarea class="maru" name="link"></textarea><br>
            freespace <br>
            <textarea class="maru" name="text"></textarea><br><br>
        </div>
        </div>
        <div class="inputa" id="inputSection1">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image1" accept="image/*"><br>
            具体的なスポット <br>
            <textarea class="maru" name="sentence1_1"></textarea><br>
            そこに行くようになったきっかけ <br>
            <textarea class="maru" name="sentence1_2"></textarea><br>
            どんな思い出があるのか <br>
            <textarea class="maru" name="sentence1_3"></textarea><br><br>
        </div>
        <div class="input" id="inputSection2">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image2" accept="image/*"><br>
            具体的なスポット <br>
            <textarea class="maru" name="sentence2_1"></textarea><br>
            そこに行くようになったきっかけ <br>
            <textarea class="maru" name="sentence2_2"></textarea><br>
            どんな思い出があるのか <br>
            <textarea class="maru" name="sentence2_3"></textarea><br><br>
        </div>
        <div class="input" id="inputSection3">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image3" accept="image/*"><br>
            具体的なスポット <br>
            <textarea class="maru" name="sentence3_1"></textarea><br>
            そこに行くようになったきっかけ <br>
            <textarea class="maru" name="sentence3_2"></textarea><br>
            どんな思い出があるのか <br>
            <textarea class="maru" name="sentence3_3"></textarea><br><br>
        </div>
        <div class="input" id="inputSection4">
            画像を選択 <br>
            <input class "maru" type="file" name="post_image4" accept="image/*"><br>
            具体的なスポット <br>
            <textarea class="maru" name="sentence4_1"></textarea><br>
            そこに行くようになったきっかけ <br>
            <textarea class="maru" name="sentence4_2"></textarea><br>
            どんな思い出があるのか <br>
            <textarea class="maru" name="sentence4_3"></textarea><br><br>
        </div>
        <div class="input" id="inputSection5">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image5" accept="image/*"><br>
            具体的なスポット <br>
            <textarea class="maru" name="sentence5_1"></textarea><br>
            そこに行くようになったきっかけ <br>
            <textarea class="maru" name="sentence5_2"></textarea><br>
            どんな思い出があるのか <br>
            <textarea class="maru" name="sentence5_3"></textarea><br><br>
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
        <input class="subu" type="submit" value="投稿">
    </div>
</body>
</html>
