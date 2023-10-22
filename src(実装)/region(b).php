<?php
    // require_once "DBManager.php";
    // $get = new DBManager();
    
    // require_once "tmp_test.php";
    
    // $posts = $get->get_all_post();
    
    // $region_id = $_GET["post"];
    //     $post = $get->get_post($region_id);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["1"])) {
            $url = '../AnotherSky/categoryhkd.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["2"])) {
            $url = '../AnotherSky/categorythk.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["3"])) {
            $url = '../AnotherSky/categoryknt.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["4"])) {
            $url = '../AnotherSky/categorychb.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["5"])) {
            $url = '../AnotherSky/categoryknk.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["6"])) {
            $url = '../AnotherSky/categorychg.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["7"])) {
            $url = '../AnotherSky/categoryskk.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["8"])) {
            $url = '../AnotherSky/categorykys.php';
            header('Location: ' . $url, true, 301);
            exit;
        } elseif (isset($_POST["9"])) {
            $url = '../AnotherSky/categoryabr.php';
            header('Location: ' . $url, true, 301);
            exit;
        } else {
            ;
        }
    }else{
        ;
    }
?>