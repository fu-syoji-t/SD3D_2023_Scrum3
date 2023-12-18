<?php
    // session_start();
    // if(isset($_SESSION["user_id"]) == false) {
    //     header('Location:../account/login.php');
    // }
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
    body{
        background-color: #DDDDDD;
    }
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

    <?php 
        for($i = 0; $i < $spot_limit; $i++) {
        echo '<div class="spot-container" style="display: ' . ($i === 0 ? 'block' : 'none') . ';">
        ------------------------------------------------------------<br>
        画像を選択 <br>
        <div id="imagePreview'.$i.'" class="image-preview-container"></div>
        <input type="file" name="post_image'.$i.'" accept="image/*"><br><br>
        <textarea class="maro" name="sentence'.$i.'" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" rows=8 cols=50 style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br>
        </div>';

        echo '<script>
        $("input[name=\'post_image'.$i.'\']").change(function () {
            showImagePreview(this, \'imagePreview'.$i.'\');
        });
        </script>';
        }
    ?>
    <br>
    <input class="subu" type="submit" value="投稿">
    <?php  require_once '../!Mng/footer_hometown.php' ?>
</form>
<script>
    $(document).ready(function () {
        $('#addSpot').click(function () {
            $('.spot-container:hidden:first').show();
        });
    });

    function showImagePreview(input, containerId) {
        var container = document.getElementById(containerId);
    

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                container.appendChild(img);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // ファイルが選択されたときに関数を呼び出す
    $('input[type="file"]').change(function () {
        showImagePreview(this, 'imagePreview');
    });
</script>