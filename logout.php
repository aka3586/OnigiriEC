<?php
    session_start();
    $_SESSION['user_login'] = false;
    unset($_SESSION['user_id']);

    header('location:./index.php');