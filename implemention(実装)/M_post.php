<input type="button" onclick="location.href='home.php'" value="home">
<input type="button" onclick="location.href='hometown.php'" value="hometown">
<input type="button" onclick="location.href='another.php'" value="another">
<input type="button" onclick="location.href='category.php'" value="category">

<h3>post</h3>

<input type="button" onclick="history.back()" value="戻る"><br><br>

<form action="A_G1-5(b).php" method="post" enctype="multipart/form-data">
    title : 
    <input type="text" name="title" maxlength="30"><br>
    region : 
    <select name="grade">
        <option value=1>北海道</option>
        <option value=2>東北</option>
        <option value=3>関東</option>
        <option value=4>中部</option>
        <option value=5>近畿</option>
        <option value=6>中国</option>
        <option value=7>四国</option>
        <option value=8>九州</option>
        <option value=9>海外</option>
    </select><br>
    place : 
    <input type="text" name="place"><br>
    youtube : 
    <textarea name="link"></textarea><br>
    freespace : 
    <textarea name="freespace"></textarea><br><br>

    画像を選択 : 
    <input type="file" name="post_image" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence1_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence1_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence1_3"></textarea><br><br>

    画像を選択 : 
    <input type="file" name="post_image" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence2_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence2_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence2_3"></textarea><br><br>
    
    画像を選択 : 
    <input type="file" name="post_image" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence3_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence3_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence3_3"></textarea><br><br>
    
    画像を選択 : 
    <input type="file" name="post_image" accept="image/*"><br>
    具体的なスポット　　　　　　　 : 
    <textarea name="sentence4_1"></textarea><br>
    そこに行くようになったきっかけ : 
    <textarea name="sentence4_2"></textarea><br>
    どんな思い出があるのか　　　　 : 
    <textarea name="sentence4_3"></textarea><br><br>
 
    <input type="submit" value="投稿">
</form>