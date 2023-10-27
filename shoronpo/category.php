<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>header</title>
    <style>

        body {
          background-color: #DDDDDD;
        }
        .contents {
        overflow: hidden;
        padding: 10px;
        width: 498px;
        margin: auto;
        }

        .contents > h1 {
        text-align: center;
        font-size: 24px;
        margin: 24px;
        }
        z
        .grid_column {
        float: right;
        overflow: hidden;
        width: 249px;
        }
        .grid_column .box h2 {
          text-align: center; 
          margin: 15px; 
        }


        .box {
        background-color: #FFF;
        border: 1px solid #333;
        float: left;
        margin: 4.5px;
        padding: 10px;
        width: 218px;
        text-align: center;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all  0.3s ease;
        }

        .box:hover {
        background-color: #d3d3d3;
        }

        a {
          text-decoration: none;
          color:black;
        }


    </style>
  </head>
  <body>
    <?php  require_once 'header.php' ?>

    <div class="contents">
      <h1>CATEGORY</h1>

      <div class="grid_column">
        <div class="box">
          <h2><a href="">北海道</a></h2>
        </div>

        <div class="box">
          <h2><a href="">東北</a></h2>
        </div>
      </div>
      <div class="grid_column">
        <div class="box">
          <h2><a href="">関東</a></h2>
        </div>

        <div class="box">
          <h2><a href="">中部</a></h2>
        </div>
      </div>
      <div class="grid_column">
        <div class="box">
          <h2><a href="">近畿</a></h2>
        </div>

        <div class="box">
          <h2><a href="">中国</a></h2>
        </div>
      </div>
      <div class="grid_column">
        <div class="box">
          <h2><a href="">四国</a></h2>
        </div>

        <div class="box">
          <h2><a href="">九州 </a></h2>
        </div>
      </div>
      <div class="grid_column">
        <div class="box">
          <h2><a href="">海外</a></h2>
        </div>
      </div>
    </div>

    <?php  require_once 'footer.php' ?>
  </body>
</html>

