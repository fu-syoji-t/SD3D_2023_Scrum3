<?php
    session_start();
    session_destroy();
    header('Location:../top/menu.php');
?>