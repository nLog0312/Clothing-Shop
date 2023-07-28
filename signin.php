<?php
    session_start();
    $unameoremail = $_POST['unameoremail'];
    $password = $_POST['psw'];
    if(isset($_POST['remember'])) {
        $remember = true;
    } else {
        $remember = false;
    }

    require_once './admin/root/connect.php';
    $sql = "
        SELECT * FROM `customers`
        WHERE (`customers`.`username` = '$unameoremail' OR `customers`.`email` = '$unameoremail') AND `customers`.`password` = '$password'
    ";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);
    
    if ($number_rows == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        if ($remember && $unameoremail != 'admin') {
            $token = uniqid('user_', true);
            $sql = "
                UPDATE `customers`
                SET `token` = '$token'
                WHERE `customers`.`id` = " . $row['id'] . "
            ";
            mysqli_query($connect, $sql);
            setcookie('remember', $token, time() + 60*60*24*2);
        }

        header('location: ./index.php');
        exit();
    } else {
        $_SESSION['error'] = 'Tài khoản hoặc mật khẩu không đúng';
        header('location: ./index.php');
    }
?>