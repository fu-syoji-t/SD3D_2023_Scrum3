<?php
    require_once "DBManager.php";
    $create = new DBManager();

    $create->create_post(1,$_POST["title"],$_POST["region"],$_POST["place"],$_POST["link"],$_POST["text"]);
    $spot_limit = 5; // 投稿内のスポット数の上限
    $spot_index = 3; // １スポットの入力欄の数
    /*$spot_limit = $create->spot_limit; // 投稿内のスポット数の上限をDBManagerから呼び出し*/
    for($i = 1; $i <= $spot_limit; $i++) {
        $sentences = "";
        for($j = 1; $j <= $spot_index; $j++) {
            if(isset($_POST["sentence".$i."_".$j])) {
                $sentences .= $_POST["sentence".$i."_".$j];
            }
        }
        if($sentences != ""){
            $create->create_post_sentence($i,$sentences);
        }

        $target = array('\'', '"');
        if(is_uploaded_file($_FILES['post_image'.$i]['tmp_name'])){

            if(!file_exists('image')){
                mkdir('image');
            }

            $file = 'image/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['post_image'.$i]['name']));//ファイルの名前だけの保存
            if(move_uploaded_file($_FILES['post_image'.$i]['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
                $create->create_post_images($i,$file);
            }

        }
    }

    header('Location:hometown.php');
?>