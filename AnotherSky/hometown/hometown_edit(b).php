<?php
    session_start();
    require_once "../!Mng/DBManager.php";
    $update = new DBManager();
    
    $post_id = $_GET["post_id"];

    $update->update_post($post_id,$_POST["title"],$_POST["region"],$_POST["place"],$_POST["link"],$_POST["text"]);
    $update->reset_post_images($post_id);
    $update->reset_post_sentences($post_id);
    $spot_limit = count($_POST["sentence"]);
    $order = 0;
    $target = array('\'', '"');
    for($i = 0; $i < $spot_limit; $i++) {
        if(!empty($_POST["sentence"][$i]) || is_uploaded_file($_FILES['post_image']['tmp_name'][$i]) || !empty($_POST['image_path'][$i])) {
            if(!empty($_POST["sentence"][$i])){
                $update->update_post_sentence($post_id,$order,$_POST["sentence"][$i]);
            }

            if(is_uploaded_file($_FILES['post_image']['tmp_name'][$i])){
                if(!file_exists('../image')){
                    mkdir('../image');
                    // ファイルのパーミッションを変更して書き込み権限を与える
                    //chmod($file_path . $_name, 0666);
                }

                $file = '../image/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['post_image']['name'][$i]));//ファイルの名前だけの保存
                if(move_uploaded_file($_FILES['post_image']['tmp_name'][$i],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
                    $update->update_post_images($post_id,$order,$file);
                }
            }else if(!empty($_POST['image_path'][$i])){
                $update->update_post_images($post_id,$order,$_POST['image_path'][$i]);
            }

            $order++;
        }
    }

    header('Location:hometown.php?branch=history');
?>
