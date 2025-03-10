<?php
    session_start();

    if(isset($_SESSION['user'])) {
        session_destroy();
        header('Location: http://'.$_SERVER['HTTP_HOST']);
        exit();
    } else {
        header('Location: http://'.$_SERVER['HTTP_HOST']);
        exit();
    }

?>