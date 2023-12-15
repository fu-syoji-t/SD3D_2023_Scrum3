<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();
    require_once "../!Mng/header.php";
?>
    <?php require_once '../!Mng/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/category.css">
</head>
<body>
        <div>
            <h2>
    <div style="text-align: center;"></div>
    <div style="text-align: center;">
    <br>
        <span style="font-size: 36px; font-family: serif;">REGION</span>
        <br>
        <br />
        <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                <?php 
                    foreach($regions as $region) {
                        echo
                        '<input type="button" class="button" value="'.$region["name"].'" onclick="location.href='."'../hometown/hometown.php?branch=region&region=".$region["region_id"]."'".'">';
                    }
                ?>
        </div>
    </div>
        </h2>
        <h2>
            <div style="text-align: center;"><br /></div>
        </h2>
    </div>
    <div class="button-container">
        <?php
         /*foreach($regions as $region){
                echo "<button id='option".$region["region_id"]."' data-parameter='".$region["region_id"]."' class='button' onclick='location.href=".'"region.php?parameter='.$region["region_id"].'"'."'>".$region["name"]."</button>";
            }*/
        ?>
    </div>
    <?php require_once '../!Mng/footer.php'; ?>
</body>
</html>
