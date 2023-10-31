<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>commithome</title>
    <style>
        body {
          background-color: #DDDDDD;
        }
        .images_area {
        margin: 0 auto;
        overflow: hidden;
        width: 300px;
        }

        .thumb {
        float: left;
        list-style-type: none;
        margin: 0;
        overflow: hidden;
        width: 300px;
        }

        .thumb li {
        cursor: pointer;
        float: left;
        padding: 0;
        margin-right: 5px;
        margin-bottom: 5px;
        }

        .thumb li:hover {
        opacity: 0.8;
        }

        .thumb img {
        height: 145px;
        padding: 0;
        vertical-align: bottom;
        width: 145px;
        }

        .top {
        float: left;
        height: 295px;
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 295px;
        }

        .top img {
        height: 295px;
        width: 295px;
        }

        .top img:nth-child(2),
        .top img:nth-child(3),
        .top img:nth-child(4) {
        display: none;
        }

        .images_area > h1{
            font-size: 24px;
            margin: 20px auto;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        (function($){

        $(document).ready(function(){

        var thumbs = $(".thumb img");
        var top_images = $(".top img");

        thumbs.hover(function(){
            top_images.hide().eq(thumbs.index($(this))).show();
        });

        });

        })(jQuery);
    </script>
  </head>
  <body>
    <?php  require_once '../!Mng/header.php' ?>

    <div class="images_area">

      <h1>COMMIT</h1>

      <ul class="thumb">
        <li><img src="img/logo.jpg" alt="thumbnail A"></li>
        <li><img src="img/another_1.jpeg" alt="thumbnail B"></li>
        <li><img src="img/another_2.jpg" alt="thumbnail C"></li>
        <li><img src="img/another_3.jpg" alt="thumbnail D"></li>
      </ul>

      <ul class="top">
        <li><img src="img/logo.jpg" alt="top image A"></li>
        <li><img src="img/another_1.jpeg" alt="top image B"></li>
        <li><img src="img/another_2.jpg" alt="top image C"></li>
        <li><img src="img/another_3.jpg" alt="top image D"></li>
      </ul>

    </div>

    

    <?php  require_once '../!Mng/footer.php' ?>
  </body>
</html>

