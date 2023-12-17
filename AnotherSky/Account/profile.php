<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>丸みを帯びた四角内に四行</title>
  <style>
    body {
      background-color: #ccc;
      margin: 0;
    }

    .a {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      position: relative;
    }

    .profile-title {
      position: absolute;
      top: 50px;
      left: 50%;
      font-size: 32px;
      color: #000;
      transform: translateX(-50%);
    }

    .square {
      position: relative;
      width: 500px;
      height: 500px;
      border: 2px solid #000;
      background-color: transparent;
      border-radius: 20px;
      color: #000;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-evenly;
    }

    .text-box {
      width: 80%;
      padding: 20px;
      background-color: transparent;
      box-sizing: border-box;
      position: relative;
    }

    .text-box::before {
      content: '';
      position: absolute;
      bottom: 50px;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #000;
    }

    .editable-text {
      width: 100%;
      outline: none;
      border: none;
      background-color: transparent;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
    }

    .button-container {
      position: absolute;
      bottom: 60px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-direction: row;
    }

    .button {
      margin-right: 10px;
      padding: 10px;
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
  <?php
    require_once "../!Mng/header.php";
  ?>
<body>
<div class="a">
  <div class="profile-title">Profile</div>
  <div class="square">
    <div>name</div>
    <div class="text-box">
      <div contenteditable="true" class="editable-text"></div>
    </div>
    <div>mailaddress</div>
    <div class="text-box">
      <div contenteditable="true" class="editable-text"></div>
    </div>
  </div>
</div>

  <div class="button-container">
    <a href="../hometown/hometown.php?branch=keep" type="button" class="button" onclick="addText('bottom-left')">お気に入り</a>
    <a href="../hometown/hometown.php?branch=history" type="button" class="button" onclick="addText('bottom-left')">投稿履歴</a>
    <a href="../account/loguot.php" type="button" class="button" onclick="addText('bottom-left')">ログアウト</a>
  </div>
  <?php
      require_once "../!Mng/DBManager.php";
      $get = new DBManager();
  ?>

  <script>
    function addText(position) {
      const editableText = document.createElement('div');
      editableText.contentEditable = true;
      editableText.className = 'editable-text';

      const textBox = document.createElement('div');
      textBox.className = 'text-box';
      textBox.appendChild(editableText);

      const newDiv = document.createElement('div');
      newDiv.appendChild(textBox);

      if (position === 'bottom-left') {
        newDiv.style.position = 'absolute';
        newDiv.style.bottom = '10px';
        newDiv.style.left = '10px';
      } else if (position === 'bottom-right') {
        newDiv.style.position = 'absolute';
        newDiv.style.bottom = '10px';
        newDiv.style.right = '10px';
      }

      document.body.appendChild(newDiv);
    }
  </script>
   <?php  require_once '../!Mng/footer.php' ?>
</body>
</html>
