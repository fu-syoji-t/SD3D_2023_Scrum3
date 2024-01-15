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

    .btn {
        display: inline-block;
        vertical-align: middle;
        margin: 0 10px;
        padding: 6px 25px;
        color: gray;
        font-weight: bold;
        letter-spacing: 0.5pt;
        text-decoration: none;
        background-color: #ffffff;
        border: 1px solid gray;
        cursor: pointer;
        transition-duration: 0.3s;
        -webkit-transition-duration: 0.3s;
        -moz-transition-duration: 0.3s;
        -o-transition-duration: 0.3s;
        -ms-transition-duration: 0.3s;
    } 
    .btn:hover {
        color: #ffffff;
        background-color: gray;
    }
    

</style>

</html>
<?php
    require_once "../!Mng/header.php";
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $regions = $get->get_regions();

    $spot_limit = $get->spot_limit;
?>

<br>
<div class="macro">
    <form action="hometown_post(b).php" method="post" enctype="multipart/form-data">
        title <br>
        <input type="text" name="title" maxlength="30" style="background-color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;"><br>
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
        <input type="text" name="place" style="background-color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;"><br>
        youtube <br>
        <textarea name="link" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br>
        freespace <br>
        <textarea name="text" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br><br>

        <div>

            <div class="spot-container">
                <button type="button" class="addSpot" onclick="insertNewElement(this.parentNode)">+</button>
            </div> 

            <div class="spot-container">

                <hr>
                
                <div class="image-preview-container">
                </div>

                <input type="file" name="post_image[]" accept="image/*" onchange="showImagePreview(this)">
                <button type="button" class="input-img" onclick="selectImg(this)">画像を選択</button>
                <br>
                
                <textarea class="maro" name="sentence[]" rows=8 cols=50 placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea>
                <br>

                <button type="button" class="deleteSpot" onclick="removeElement(this.parentNode)">✕ 削除</button>

                <hr>

                <button type="button" class="addSpot" onclick="insertNewElement(this.parentNode)">+</button>

            </div>

        </div>

        <br>
        <input class="btn" type="submit" value="投稿">
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
        newElement.insertAdjacentHTML('beforeend', '<hr><div class="image-preview-container"></div><input type="file" name="post_image[]" accept="image/*" onchange="showImagePreview(this)"><button type="button" class="input-img" onclick="selectImg(this)">画像を選択</button><br><textarea class="maro" name="sentence[]" rows=8 cols=50 placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" style="background-color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;"></textarea><br><button type="button" class="deleteSpot" onclick="removeElement(this.parentNode)">✕ 削除</button><hr><button type="button" class="addSpot" onclick="insertNewElement(this.parentNode)">+</button>');

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