<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    setcookie('remember', null, time() - 60*60*24*2);

    header('Location: index.php');
?>