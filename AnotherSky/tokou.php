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
        

          body{
              background-color:#DDDDDD;
              font-family: 'Sacramento', cursive;
              font-family: "Kokoro";
          }
          .center{
            text-align: center;
          }
          .input{
            text-align: center;
            margin-top: 10%;
            margin-left: 10%;
            margin-right: 10%;
            border-radius: 20% 20% 20% 20%;
            background-color: #999999;
            padding: 0.5em;/*文字周りの余白*/
            border-radius: 1.5em;/*角丸*/

          }
          h1{
            margin-bottom: 10%;
            font-family: 'Sacramento', cursive;
          }
          .subu{
            background-color: #999999;
            font-size: 100%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            position:relative;
            border-radius: 50vh;/*丸く*/
          }
          .maru{
          border-radius: 1.5em;/*角丸*/
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
        <div class="input-section">
    <button id="addInput" type="button">＋</button>
    <div class="input" style="display: none;">
        画像を選択 <br>
        <input class="maru" type="file" name="post_image1" accept="image/*"><br>
        具体的なスポット　　　　　　　  <br>
        <textarea class="maru" name="sentence1_1"></textarea><br>
        そこに行くようになったきっかけ  <br>
        <textarea class="maru" name="sentence1_2"></textarea><br>
        どんな思い出があるのか　　　　  <br>
        <textarea class="maru" name="sentence1_3"></textarea><br><br>
    </div>
</div>
    <!--<div class="input">
        画像を選択 <br>
        <input class="maru" type="file" name="post_image1" accept="image/*"><br>
        具体的なスポット　　　　　　　  <br>
        <textarea class="maru" name="sentence1_1"></textarea><br>
        そこに行くようになったきっかけ  <br>
        <textarea class="maru" name="sentence1_2"></textarea><br>
        どんな思い出があるのか　　　　  <br>
        <textarea class="maru" name="sentence1_3"></textarea><br><br>
    </div>-->
    <div class="center">
    <input class="subu" type="submit" value="投稿">
    </div>
</form>
</body>
</html>
<script>
    var inputSection = document.querySelector('.input');
    var addButton = document.getElementById('addInput');
    var inputSectionCounter = 1;

    addButton.addEventListener('click', function() {
        // クローン元の.input要素を複製
        var newInputSection = inputSection.cloneNode(true);
        // 複製した.input要素を表示状態に変更
        newInputSection.style.display = 'block';

        // 新しい.input要素に対して一意のIDを設定
        var newInputId = "input" + inputSectionCounter;
        newInputSection.setAttribute('id', newInputId);

        // 新しい.input要素内のinput要素のname属性を一意に設定
        newInputSection.querySelectorAll('input').forEach(function(inputElement, index) {
            inputElement.name = inputElement.name + inputSectionCounter;
        });

        // 新しい.input要素内のtextarea要素のname属性を一意に設定
        newInputSection.querySelectorAll('textarea').forEach(function(textareaElement, index) {
            textareaElement.name = textareaElement.name + inputSectionCounter;
        });

        // 複製した.input要素を追加
        inputSection.parentElement.appendChild(newInputSection);
        inputSectionCounter++;
    });
</script>