<?php
    session_start();
    session_destroy();
    $_session[]=array();   
    header('Location: index.php');
?>
2017-06-22-12-15