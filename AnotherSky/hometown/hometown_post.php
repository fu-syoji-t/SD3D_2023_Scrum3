<head>
    <link rel="stylesheet" type="text/css" href="../css/.css">
</head>
<style>
    body{
        background-color: #DDDDDD;
    }
    .macro{
        text-align: center;
        font-size: 14px;
        }
</style>
</html>
<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();

    $spot_limit = $get->spot_limit;
?>

<h1>post</h1>
<div class="macro">
<form action="hometown_post(b).php" method="post" enctype="multipart/form-data">
    title <br>
    <input type="text" name="title" maxlength="30"><br>
    region <br><br>
    <select name="region" required>
        <option value="" selected style="color: #888">未選択</option>
</div>
        <?php
            foreach($regions as $region) {
                echo 
        '<option value='.$region["region_id"].'>'.$region["name"].'</option>';
            }
        ?>
    </select><br><br>
    place <br>
    <input type="text" name="place"><br>
    youtube <br>
    <textarea name="link"></textarea><br>
    freespace <br>
    <textarea name="text"></textarea><br><br>

    <button type="button" id="addSpot">+</button><br>

    <?php 
        for($i = 0; $i < $spot_limit; $i++) {
        echo '<div class="spot-container" style="display: ' . ($i === 0 ? 'block' : 'none') . ';">
        ------------------------------------------------------------<br>
        画像を選択 <br>
        <input type="file" name="post_image'.$i.'" accept="image/*"><br>
        <textarea class="maro" name="sentence'.$i.'" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" rows=8 cols=50></textarea><br>
        </div>';
        }
    ?>
    <br>
    <input class="subu" type="submit" value="投稿">
</form>
<script>
    $(document).ready(function () {
        $('#addSpot').click(function () {
            $('.spot-container:hidden:first').show();
        });
    });
</script>