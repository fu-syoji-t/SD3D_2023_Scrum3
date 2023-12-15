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
    <a href="../account/keep_post.php" type="button" class="button" onclick="addText('bottom-left')">お気に入り</a>
    <a href="../account/history.php" type="button" class="button" onclick="addText('bottom-left')">投稿履歴</a>
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
</body>
</html>
