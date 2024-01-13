<?php
    session_start();
    if(isset($_SESSION["user_id"]) == false) {
        header('Location:../account/sign_in.php');
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿♪</title>
    <link rel="icon" href="../img/icon.png">
    <!-- <link rel="stylesheet" type="text/css" href="../css/.css"> -->
</head>

<style>
    .macro{
        text-align: center;
        font-size: 14px;
        }
    .image-preview-container img {
        max-width: 100%;
        max-height: 300px;
    }
    select[name="region"] {
        background-color: #fff;
        border-radius: 5px;
    }
</style>

</html>
<?php  require_once '../!Mng/header.php' ?>
<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();

    $spot_limit = $get->spot_limit;
    require_once "../!Mng/header.php";
?>

<br>
<div class="macro">
<form action="hometown_post(b).php" method="post" enctype="multipart/form-data">
    title <br>
    <input type="text" name="title" maxlength="30" style="background-color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;"><br>
    region <br>
    <select name="region" required>
        <option value="" selected style="color: #888">未選択</option>
    </div>
</div>
    <?php
        foreach($regions as $region) {
            echo 
        '<option value='.$region["region_id"].'>'.$region["name"].'</option>';
        }
    ?>
    </select><br>
    place <br>
    <input type="text" name="place" style="background-color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;"><br>
    youtube <br>
    <textarea name="link" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br>
    freespace <br>
    <textarea name="text" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br><br>

    <button type="button" id="addSpot">+</button><br>

    <div class="spot-container">
        ------------------------------------------------------------<br>
        画像を選択 <br>
        <div class="image-preview-container">
        </div>

        <input type="file" name="post_image[]" accept="image/*" onchange="showImagePreview(this)">
        <br><br>
        
        <textarea class="maro" name="sentence[]" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" rows=8 cols=50 style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br>
    </div>

    <div class="spot-container">
        ------------------------------------------------------------<br>
        画像を選択 <br>
        <div class="image-preview-container">
        </div>

        <input type="file" name="post_image[]" accept="image/*">
        <br><br>
        
        <textarea class="maro" name="sentence[]" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" rows=8 cols=50 style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br>
    </div>

    <br>
    <input class="subu" type="submit" value="投稿">
    <?php  require_once '../!Mng/footer.php' ?>
</form>
<script>


    /*$(document).ready(function () {
        $('#addSpot').click(function () {
            $('.spot-container:hidden:first').show();
        });
    });*/
    
    
    /*function showImagePreview(element) {
        var containers = element.parentNode.getElementsByClassName('image-preview-container');
        var container = containers[0];
    
        if (element.files && element.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                container.appendChild(img);
            };

            reader.readAsDataURL(element.files[0]);
        }
    }*/

    function showImagePreview(element){
        var containers = element.parentNode.getElementsByClassName('image-preview-container');
        var container = containers[0];
        
        if(element.files.length == 1){
            var fileData = new FileReader();
            fileData.readAsDataURL(element.files[0]);
            /*id属性が付与されているimgタグのsrc属性に、
            fileReaderで取得した値の結果を入力することでプレビュー表示している*/
            fileData.onload = (function(e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                container.appendChild(img);
            });
            
        }
    }
    function viewImg(hoge){
    var imgBox = document.getElementById("imgBox");
    var imgElem = document.getElementById('preview');
    if(hoge.files.length > 0){
        var fileData = new FileReader();
        fileData.readAsDataURL(hoge.files[0]);
        /*id属性が付与されているimgタグのsrc属性に、
        fileReaderで取得した値の結果を入力することでプレビュー表示している*/
        fileData.onload = (function() {
            imgElem.src = fileData.result;
        });
        imgBox.style.display = "block";
    }else{
        imgBox.style.display = "none";
    }
}
</script>