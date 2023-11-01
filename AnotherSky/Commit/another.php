<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>commithome</title>
    <link rel="stylesheet" type="text/css" href="../css/another.css">
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

