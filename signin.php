<?php
    session_start();
    $phoneoremail = $_POST['phoneoremail'];
    $password = $_POST['psw'];
    if(isset($_POST['remember'])) {
        $remember = true;
    } else {
        $remember = false;
    }

    require_once './admin/root/connect.php';
    $sql = "
        SELECT * FROM `customers`
        WHERE (`customers`.`phone` = '$phoneoremail' OR `customers`.`email` = '$phoneoremail') AND `customers`.`password` = '$password'
    ";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);
    
    if ($number_rows == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['fullname'] = $row['fullname'];
        if ($remember && $_SESSION['phone'] != 'admin') {
            $token = uniqid('user_', true);
            $sql = "
                UPDATE `customers`
                SET `token` = '$token'
                WHERE `customers`.`id` = " . $row['id'] . "
            ";
            mysqli_query($connect, $sql);
            setcookie('remember', $token, time() + 60*60*24*2);
            header('location: ./index.php');
        } elseif ($_SESSION['phone'] == 'admin') {
            header('location: ./admin/root/index.php');
        } else {
            header('location: ./index.php');
        }
        $_SESSION['toast-index'] = 'Chào mừng ' . $_SESSION['fullname'] . ' đến với Clothing Shop';
    } else {
        $_SESSION['error'] = 'Tài khoản hoặc mật khẩu không đúng';
        header('location: ./index.php');
    }
?>