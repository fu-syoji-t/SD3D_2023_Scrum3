<?php
    require_once "../!Mng/DBManager.php";
    $create = new DBManager();

    $create->create_post(1,$_POST["title"],$_POST["region"],$_POST["place"],$_POST["link"],$_POST["text"]);
    $spot_limit = $create->spot_limit; // 投稿内のスポット数の上限をDBManagerから呼び出し
    $order = 0;
    $target = array('\'', '"');
    for($i = 0; $i < $spot_limit; $i++) {
        if($_POST["sentence".$i] != "" || is_uploaded_file($_FILES['post_image'.$i]['tmp_name'])) {
            if($_POST["sentence".$i] != ""){
                $create->create_post_sentence($order,$_POST["sentence".$i]);
            }

            if(is_uploaded_file($_FILES['post_image'.$i]['tmp_name'])){
                if(!file_exists('../image')){
                    mkdir('../image');
                    // ファイルのパーミッションを変更して書き込み権限を与える
                    //chmod($file_path . $_name, 0666);
                }

                $file = '../image/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['post_image'.$i]['name']));//ファイルの名前だけの保存
                if(move_uploaded_file($_FILES['post_image'.$i]['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
                    $create->create_post_images($order,$file);
                }
            }
            $order++;
        }
    }

    header('Location:hometown.php?branch=all');
?>
