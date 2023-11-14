<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();

    $spot_limit = $get->spot_limit;

    require_once "tmp_test.php";
    $template = new Template();
    $template->header();
?>

<h1>post</h1>
<form action="post(b).php" method="post" enctype="multipart/form-data">
    title <br>
    <input type="text" name="title" maxlength="30"><br>
    region <br>
    <select name="region" required>
        <option value="" selected style="color: #888">未選択</option>
        <?php
            foreach($regions as $region) {
                echo 
        '<option value='.$region["region_id"].'>'.$region["name"].'</option>';
            }
        ?>
    </select><br>
    place <br>
    <input type="text" name="place"><br>
    youtube <br>
    <textarea name="link"></textarea><br>
    freespace <br>
    <textarea name="text"></textarea><br><br>

    <?php 
        for($i = 0; $i < $spot_limit; $i++) {
            echo
    '------------------------------------------------------------<br>
        画像を選択 <br>
        <input type="file" name="post_image'.$i.'" accept="image/*"><br>
        <textarea class="maro" name="sentence'.$i.'" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" rows=8 cols=50></textarea><br>';
        }
    ?>
    <br>
    <input class="subu" type="submit" value="投稿">
</form>