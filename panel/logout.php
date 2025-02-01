<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php';

    if(isset($_SESSION['user'])) {
        session_destroy();
        header('Location: http://'.$_SERVER['HTTP_HOST']);
        exit();
    } else {
        header('Location: http://'.$_SERVER['HTTP_HOST']);
        exit();
    }

?>