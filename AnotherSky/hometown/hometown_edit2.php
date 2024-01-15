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

    hr{
        margin: 0 auto;
        max-width: 600px;
        width: 100%;
    }

    .macro{
        text-align: center;
        font-size: 14px;
    }

    .image-preview-container img {
        margin-top: 1rem;
        max-width: 100%;
        max-height: 300px;
    }
    
    select[name="region"] {
        background-color: #fff;
        border-radius: 5px;
    }

    input[type="file"] {
        display: none;
    }

    .input-img, .addSpot, .deleteSpot {
        margin: 1rem 0;
        padding: 3px 15px;
    }
    .input-img, .deleteSpot, .addSpot:hover{
        border-radius: 5px;
        box-shadow: inset 0px 0px 0px 0.5px black;
    }
    

</style>

<?php
    require_once "../!Mng/header.php";

    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();

    $post_id = $_GET["post"];
    $post = $get->get_post($post_id);

?>

<br>
<div class="macro">
    <form action="hometown_post(b).php" method="post" enctype="multipart/form-data">
        <?php echo $post["date"] ?>
        <br><br>
        title <br>
        <input type="text" name="title" maxlength="30" value="<?php echo $post['title'] ?>" style="background-color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;"><br>
        region <br>
        <select name="region" required>
            <option value="" selected style="color: #888">未選択</option>
            <?php
                foreach($regions as $region) {
                    echo 
            '<option value='.$region["region_id"].(($region["region_id"] == $post["region_id"]) ? " selected" : "").'>'.$region["name"].'</option>';
                }
            ?>
        </select><br>
        place <br>
        <input type="text" name="place" value="<?php echo $post['place'] ?>" style="background-color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;"><br>
        youtube <br>
        <textarea name="link" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"><?php echo $post['link_path'] ?></textarea><br>
        freespace <br>
        <textarea name="text" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"><?php echo $post['text'] ?></textarea><br><br>

        <div>
            
            <div class="spot-container">
                <button type="button" class="addSpot" onclick="insertNewElement(this.parentNode)">+</button>
            </div>

            <?php
                // 以下、投稿内のスポット数を計算している（2度手間だが）
                $spot_order = array();
                // それぞれのオーダーを取得、配列に格納
                for($i = 0; $i < count($post["images"]); $i++) {
                    $spot_order[] = $post["images"][$i]["image_order"];
                }
                for($i = 0; $i < count($post["sentences"]); $i++) {
                    $spot_order[] = $post["sentences"][$i]["sentence_order"];
                }
                // 画像の数とテキストの数の合計
                $spot_n = count($spot_order); // spot_n = スポット数
                // 画像とテキストのオーダーが一致しているときはspot_nを引く
                for($i = 0; $i < count($spot_order); $i++) {
                    for($j = $i+1; $j < count($spot_order); $j++) {
                        if($spot_order[$i] == $spot_order[$j]) {
                        $spot_n--;
                        }
                    }
                }


                //spotの表示
                $c_image = 0;
                $c_sentence = 0;
                for($i = 0; $i < $spot_n; $i++) {
                    
                    echo
            '<div class="spot-container">

                <hr>
                
                <div class="image-preview-container">';
                    if(isset($post["images"][$c_image]) && $post["images"][$c_image]["image_order"] == $i) {
                        echo '<img src="'.$post["images"][$c_image]["path"].'">';
                        if($c_image < count($post["images"])-1){
                            $c_image++;
                        }
                    }

                    echo
                '</div>

                <input type="file" name="post_image[]" accept="image/*" onchange="showImagePreview(this)">
                <button type="button" class="input-img" onclick="selectImg(this)">画像を選択</button>
                <br>
                
                <textarea class="maro" name="sentence[]" rows=8 cols=50 placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">';
                if(isset($post["sentences"][$c_sentence]) && $post["sentences"][$c_sentence]["sentence_order"] == $i) {
                    echo $post["sentences"][$c_sentence]["sentence"];
                    if($c_sentence < count($post["sentences"])-1){
                        $c_sentence++;
                    }
                }
                echo
                '</textarea>
                <br>

                <button type="button" class="deleteSpot" onclick="removeElement(this.parentNode)">✕ 削除</button>

                <hr>

                <button type="button" class="addSpot" onclick="insertNewElement(this.parentNode)">+</button>

            </div>';

                }
            ?>
        </div>

        <br>
        <input class="subu" type="submit" value="投稿">
        <?php  require_once '../!Mng/footer.php' ?>
    </form>
</div>


<script>

    /* 画面読み込み時「+」ボタンを１回押したことにする
    document.addEventListener("DOMContentLoaded", function() {
        var element = document.getElementsByClassName('addSpot');
        element[0].click();
    });
    */

    // ボタンクリックでinput-fileをクッリク
    function selectImg(button) {
        var imgElement = button.parentNode.querySelector('input[name="post_image[]"]');
        imgElement.click();
    }

    function showImagePreview(element) {
        var containers = element.parentNode.getElementsByClassName('image-preview-container');
        var container = containers[0];
        
        container.innerHTML = '';

        if(element.files.length > 0){
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

    // 要素を挿入
    function insertNewElement(element) {
        // 親要素を作成
        var newElement = document.createElement('div');
        newElement.className = 'spot-container';
        // htmlを記述
        newElement.insertAdjacentHTML('beforeend', '<div class="spot-container"><hr><div class="image-preview-container"></div><input type="file" name="post_image[]" accept="image/*" onchange="showImagePreview(this)"><button type="button" class="input-img" onclick="selectImg(this)">画像を選択</button><br><textarea class="maro" name="sentence[]" rows=8 cols=50 placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br><button type="button" class="deleteSpot" onclick="removeElement(this.parentNode)">✕ 削除</button><hr><button type="button" class="addSpot" onclick="insertNewElement(this.parentNode)">+</button></div>');

        // 親要素を挿入する位置の要素を取得
        var position = getPosition(element);
        var container = element.parentNode;
        var existingElement = container.children[position];

        // 特定の位置に新しい要素を挿入
        container.insertBefore(newElement, existingElement.nextSibling);
    }

    // 特定の要素の位置を取得
    function getPosition(element) {
        var parent = element.parentNode;
        var children = Array.from(parent.children);

        var index = children.indexOf(element);
        return index;
    }

    // 要素を削除
    function removeElement(element) {
        element.parentNode.removeChild(element);
    }

</script>