<?php
    session_start();
    require_once "../!Mng/DBManager.php";
    $create = new DBManager();

    $create->create_post($_SESSION["user_id"],$_POST["title"],$_POST["region"],$_POST["place"],$_POST["link"],$_POST["text"]);
    $spot_limit = count($_POST["sentence"]);
    $order = 0;
    $target = array('\'', '"');
    for($i = 0; $i < $spot_limit; $i++) {
        if($_POST["sentence"][$i] != "" || is_uploaded_file($_FILES['post_image']['tmp_name'][$i])) {
            if($_POST["sentence"][$i] != ""){
                $create->create_post_sentence($order,$_POST["sentence"][$i]);
            }

            if(is_uploaded_file($_FILES['post_image']['tmp_name'][$i])){
                if(!file_exists('../image')){
                    mkdir('../image');
                    // ファイルのパーミッションを変更して書き込み権限を与える
                    //chmod($file_path . $_name, 0666);
                }

                $file = '../image/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['post_image']['name'][$i]));//ファイルの名前だけの保存
                if(move_uploaded_file($_FILES['post_image']['tmp_name'][$i],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
                    $create->create_post_images($order,$file);
                }
            }
            $order++;
        }
    }

    header('Location:hometown.php?branch=all');
?>
