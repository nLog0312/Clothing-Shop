<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['psw'];

    require_once './admin/root/connect.php';
    $sql = "
        SELECT COUNT(*) FROM customers
        WHERE username = '$username'
    ";
    $result = mysqli_query($connect, $sql);
    $number_of_rows = mysqli_fetch_array($result)['COUNT(*)'];

    if ($number_of_rows > 0) {
        session_start();
        $_SESSION['error'] = 'Tài khoản đã được sử dụng';
        header('Location: index.php');
        exit();
    } else {
        $sql = "
            INSERT INTO customers (username, email, password)
            VALUES ('$username', '$email', '$password')
        ";

        $sqlGetId = "
            SELECT id FROM customers
            WHERE email = '$email'
        ";
        mysqli_query($connect, $sql);
        $id = mysqli_fetch_array(mysqli_query($connect, $sqlGetId))['id'];
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $token = uniqid('user_', true);
        $sql = "
            UPDATE `customers`
            SET `token` = '$token'
            WHERE `customers`.`id` = " . $id . "
        ";
        mysqli_query($connect, $sql);
        setcookie('remember', $token, time() + 60*60*24*2);
        
        header('Location: index.php');
    }
?>