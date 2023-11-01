<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/tokou.css"> 
</head>
<body>
    <?php  require_once '../!Mng/header.php' ?>
    <div class="center">
        <h1>post</h1>
        <form action="post(b).php" method="post" enctype="multipart/form-data">
            title <br>
            <input class="maru" type="text" name="title" maxlength="30"><br>
            region <br>
            <select name="region">
                <!--<option value="" selected style="color: #888">未選択</option>-->
                <option value=1 selected>北海道</option>
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

        <div class="inputa" id="inputSection0">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image0" accept="image/*"><br>
            <textarea class="maro" name="sentence0" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
<?php 
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();
    $spot_limit = $get->spot_limit;
    for($i = 1; $i < $spot_limit; $i++) {
        echo
        '<div class="input" id="inputSection'.$i.'">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image'.$i.'" accept="image/*"><br>
            <textarea class="maro" name="sentence'.$i.'" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>';
    }
?>
        <!--<div class="input" id="inputSection1">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image1" accept="image/*"><br>
            <textarea class="maro" name="sentence1"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
        <div class="input" id="inputSection2">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image2" accept="image/*"><br>
            <textarea class="maro" name="sentence2"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
        <div class="input" id="inputSection3">
            画像を選択 <br>
            <input class = "maru" type="file" name="post_image3" accept="image/*"><br>
            <textarea class="maro" name="sentence3"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>
        <div class="input" id="inputSection4">
            画像を選択 <br>
            <input class="maru" type="file" name="post_image4" accept="image/*"><br>
            <textarea class="maro" name="sentence4"placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット"></textarea><br>
        </div>-->
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
