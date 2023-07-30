<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['phone']);
    unset($_SESSION['fullname']);
    unset($_SESSION['toast-index']);
    setcookie('remember', null, time() - 60*60*24*2);

    header('Location: index.php');
?>