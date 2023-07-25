<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['psw'];

    require_once './admin/root/connect.php';
    $sql = "
        SELECT COUNT(*) FROM customers
        WHERE email = '$email'
    ";
    $result = mysqli_query($connect, $sql);
    $number_of_rows = mysqli_fetch_array($result)['COUNT(*)'];

    if ($number_of_rows > 0) {
        echo "Email đã được đăng ký tài khoản";
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
        
        header('Location: index.php');
    }
?>