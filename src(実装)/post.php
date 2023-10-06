<?php 
    require_once "DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();
?>

<input type="button" onclick="location.href='home.php'" value="home">
<input type="button" onclick="location.href='hometown.php'" value="hometown">
<input type="button" onclick="location.href='another.php'" value="another">
<input type="button" onclick="location.href='category.php'" value="category">

<h3>post</h3>

<input type="button" onclick="history.back()" value="戻る"><br><br>

<form action="post(b).php" method="post" enctype="multipart/form-data">
    title : 
    <input type="text" name="title" maxlength="30"><br>
    region : 
    <select name="region">
        <?php
            foreach($regions as $region){
                echo 
        '<option value='.$region["region_id"].'>'.$region["name"].'</option>';
            }
        ?>
    </select><br>
    place : 
    <input type="text" name="place"><br>
    youtube : 
    <textarea name="link" rows="8" cols="50"></textarea><br>
    freespace : 
    <textarea name="text"></textarea><br><br>

    画像を選択 : 
    <input type="file" name="post_image1" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence1_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence1_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence1_3"></textarea><br><br>

    画像を選択 : 
    <input type="file" name="post_image2" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence2_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence2_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence2_3"></textarea><br><br>
    
    画像を選択 : 
    <input type="file" name="post_image3" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence3_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence3_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence3_3"></textarea><br><br>
    
    画像を選択 : 
    <input type="file" name="post_image4" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence4_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence4_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence4_3"></textarea><br><br>
 
    <input type="submit" value="投稿">
</form>

<div style="color:blueviolet; font-size:5rem">
<?php 
    require_once "index.php";
    $template = new template();

    $template->text_template_display("text1!!!","text2!!","text3!");
?>
</div>